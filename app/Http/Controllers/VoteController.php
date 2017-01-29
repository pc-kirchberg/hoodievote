<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    private $designs = [
        'https://hoodievote-static.pupilscom-esl1.eu/1.png',
        'https://hoodievote-static.pupilscom-esl1.eu/2.png',
        'https://hoodievote-static.pupilscom-esl1.eu/3.png',
        'https://hoodievote-static.pupilscom-esl1.eu/4.png',
        'https://hoodievote-static.pupilscom-esl1.eu/5.png',
        'https://hoodievote-static.pupilscom-esl1.eu/6.png',
        'https://hoodievote-static.pupilscom-esl1.eu/7.png',
        'https://hoodievote-static.pupilscom-esl1.eu/8.png',
        'https://hoodievote-static.pupilscom-esl1.eu/9.png',
        'https://hoodievote-static.pupilscom-esl1.eu/10.png',
        'https://hoodievote-static.pupilscom-esl1.eu/11.png',
        'https://hoodievote-static.pupilscom-esl1.eu/12.png',
        'https://hoodievote-static.pupilscom-esl1.eu/13.png',
        'https://hoodievote-static.pupilscom-esl1.eu/14.png',
        'https://hoodievote-static.pupilscom-esl1.eu/15.png',
        'https://hoodievote-static.pupilscom-esl1.eu/16.png',
        'https://hoodievote-static.pupilscom-esl1.eu/17.png',
        'https://hoodievote-static.pupilscom-esl1.eu/18.png',
        'https://hoodievote-static.pupilscom-esl1.eu/19.png',
        'https://hoodievote-static.pupilscom-esl1.eu/20.png',
        'https://hoodievote-static.pupilscom-esl1.eu/21.png',
        'https://hoodievote-static.pupilscom-esl1.eu/22.png',
        'https://hoodievote-static.pupilscom-esl1.eu/23.png',
        'https://hoodievote-static.pupilscom-esl1.eu/24.png',
        'https://hoodievote-static.pupilscom-esl1.eu/25.png',
        'https://hoodievote-static.pupilscom-esl1.eu/26.png',
        'https://hoodievote-static.pupilscom-esl1.eu/27.png',
        'https://hoodievote-static.pupilscom-esl1.eu/28.png',
    ];

    private $colours = [
        '#F7F7F7',
        '#DBDBDB',
        '#0DA340',
        '#2CADD7',
        '#F86697',
        '#45515D',
        '#951C2D',
        '#122661',
        '#000000'
    ];

    public function index()
    {
        return view('vote');
    }

    public function choices()
    {
        return view('choices')->with('designs', str_replace('"', "'", json_encode($this->designs)));
    }

    public function choicesColours(Request $request)
    {
        $selectedDesigns = json_decode($request->input('selected'));
        $request->session()->put('selectedDesigns', $selectedDesigns);

        return view('choicesColours')->with('colours', str_replace('"', "'", json_encode($this->colours)));
    }

    public function alreadyVoted()
    {
        return view('alreadyVoted');
    }

    public function confirm(Request $request)
    {
        $selectedDesigns = $request->session()->get('selectedDesigns');
        $designs = array_map(function ($id) {
            return $this->designs[$id];
        }, $selectedDesigns);

        $selectedColours = json_decode($request->input('selected'));
        $request->session()->put('selectedColours', $selectedColours);
        $colours = array_map(function ($id) {
            return $this->colours[$id];
        }, $selectedColours);

        return view('confirm')->with('selectedDesigns', $designs)->with('selectedColours', $colours);
    }

    public function submit(Request $request)
    {
        $selectedDesigns = $request->session()->get('selectedDesigns');
        $selectedDesigns = implode(',', array_map(function ($s) {
            return str_pad($s, 2, '0', STR_PAD_LEFT);
        }, $selectedDesigns));

        $selectedColours = $request->session()->get('selectedColours');
        $selectedColours = implode(',', array_map(function ($s) {
            return str_pad($s, 2, '0', STR_PAD_LEFT);
        }, $selectedColours));

        $user = Auth::user();
        $vote = new App\Vote();
        $vote->designPreferences = $selectedDesigns;
        $vote->colourPreferences = $selectedColours;
        $vote->user()->associate($user);
        $vote->ip = $request->ip();
        $vote->save();

        $mp = \Mixpanel::getInstance("83e3c315733f7f831c82f1ef932120ab");
        $mp->identify($user->email);
        $mp->track('vote completed');

        return view('thankyou');
    }
}
