<?php

defined('DS') or exit('No direct script access.');

Route::get('(:package)', [
    'as' => 'admin.dashboard',
    'uses' => 'admin::wedding@index',
    'before' => 'admin_auth',
]);

Route::get('(:package)/settings', [
    'as' => 'admin.settings',
    'uses' => 'admin::wedding@settings',
    'before' => 'admin_auth',
]);

Route::get('(:package)/users', ['as' => 'admin.users', 'uses' => 'admin::users@index', 'before' => 'admin_auth']);
Route::get('(:package)/users/create', ['as' => 'admin.users.create', 'uses' => 'admin::users@create', 'before' => 'admin_auth']);
Route::post('(:package)/users', ['as' => 'admin.users.store', 'uses' => 'admin::users@store', 'before' => 'admin_auth']);
Route::get('(:package)/users/(:num)/edit', ['as' => 'admin.users.edit', 'uses' => 'admin::users@edit', 'before' => 'admin_auth']);
Route::post('(:package)/users/(:num)', ['as' => 'admin.users.update', 'uses' => 'admin::users@update', 'before' => 'admin_auth']);
Route::get('(:package)/users/(:num)/delete', ['as' => 'admin.users.delete', 'uses' => 'admin::users@delete', 'before' => 'admin_auth']);

Route::post('(:package)/settings', [
    'as' => 'admin.settings.save',
    'uses' => 'admin::wedding@settings',
    'before' => 'admin_auth',
]);

Route::get('(:package)/login', [
    'as' => 'admin.login',
    'uses' => 'admin::wedding@login',
]);

Route::post('(:package)/login', [
    'as' => 'admin.login.submit',
    'uses' => 'admin::wedding@login',
]);

Route::get('(:package)/logout', [
    'as' => 'admin.logout',
    'uses' => 'admin::wedding@logout',
    'before' => 'admin_auth',
]);
