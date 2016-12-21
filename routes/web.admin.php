<?php

Route::get('/', ['as' => 'admin.home', 'uses' => 'SiteController@getIndex']);
