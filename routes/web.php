<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/notready', function () {
        return view('notready');
    })->name('notready');

    // Route::group(['middleware' => ['isNotDeveloper']], function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');

        Route::get('/secretLinkDoNotShareOrYouWillBeFired', function () {
            return view('welcome');
        })->name('welcome');

        

        // Route::get('/redirect', 'FacebookAuthController@redirect');
        // Route::get('/callback', 'FacebookAuthController@callback');

        Auth::routes();

        Route::post('/verify', 'EmailVerificationController@confirm')->name('verify');
        Route::get('/confirmEmail', 'EmailVerificationController@verify')->name('confirmEmail');
        
        Route::get('/loaderio-bf208093abba8bb5e05b2f9ab78a3701/', function () {
            return 'loaderio-bf208093abba8bb5e05b2f9ab78a3701';
        });

        Route::group(['middleware' => ['auth', 'hasNotVoted']], function () {
            Route::get('/choices', 'VoteController@choices')->name('choices');
            Route::get('/choicesColours', 'VoteController@choicesColours')->name('choicesColours');
            Route::get('/confirm', 'VoteController@confirm')->name('confirm');
            Route::get('/submit', 'VoteController@submit')->name('submit');
        });
        
        Route::get('/alreadyVoted', 'VoteController@alreadyVoted')->name('alreadyVoted');
    // });
});
