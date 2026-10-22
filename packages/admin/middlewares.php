<?php

defined('DS') or exit('No direct script access.');

Route::middleware('admin_auth', function () {
    if (Auth::guest() || ! Auth::user() || 'admin' !== Auth::user()->role) {
        Auth::logout();
        return Redirect::to('admin/login');
    }
});
