<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class EmailVerificationController extends Controller
{
    private function findUniqueVerToken() {
        while(true) {
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $users = User::where('verificationToken', $token)->count();
            if ($users === 0) {
                return $token;
            }
        }
    }

    public function confirm(Request $request) {
        $this->validate($request, [
           'email' => 'required|unique:users|email|regex:/[a-zA-Z0-9.]+\@euroschool\.lu/'
        ]);
        $email = $request->input('email');

        $token = $this->findUniqueVerToken();

        $user = new User();
        $user->email = $email;
        $user->verificationToken = $token;
        $user->save();

        \Mail::to($email)->send(new EmailVerification($token));

        $mp = \Mixpanel::getInstance("83e3c315733f7f831c82f1ef932120ab");
        $mp->identify($user->email);
        $mp->track('email verification sent');

        return view('emailSent')->with('email', $user->email);
    }

    public function verify(Request $request) {

        $token = $request->input('token');
        $users = User::where('verificationToken', $token)->get();
        if ($users->isEmpty()) {
            return abort(400);
        }

        $user = $users->first();
        $user->verified = true;
        $user->save();

        $mp = \Mixpanel::getInstance("83e3c315733f7f831c82f1ef932120ab");
        $mp->identify($user->email);
        $mp->track('email verified');

        auth()->login($user);

        return redirect()->to('/choices');
    }
}
