<?php

use Illuminate\Support\Facades\Route;

Route::get('/test/{className}->{funcName}', 'TestController@index');
