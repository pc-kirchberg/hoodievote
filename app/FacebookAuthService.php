<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class FacebookAuthService {
    public function createOrGet(ProviderUser $user) {
        $account = User::whereFbid($user->getId())->first();
        if($account) {
            return $account;
        } else {
            $account = new User([
                'fbid' => $user->getId()
            ]);
            $account->save();
            return $account;
        }
    }
}
