<?php

Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'SiteController@getIndex']);

Route::get('login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
Route::post('login', ['as' => 'admin.login.submit', 'uses' => 'AuthController@postLogin']);

Route::get('change-password', ['as' => 'admin.change-password', 'uses' => 'AuthController@getChangePassword']);
Route::post('change-password', ['as' => 'admin.change-password.submit', 'uses' => 'AuthController@postChangePassword']);

Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);
