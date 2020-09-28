<?php

use Illuminate\Support\Facades\Route;

use app\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/userLogin', function () {
//     return view('dashboard');
// });


$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1',['namespace' => 'App\Http\Controllers'], function ($api) {

    $api->get('/userLogin', 'UserController@userLogin');
    $api->get('/test', function(){
        return view("dashboard");
    });
    // $api->get('/test', function(){
    //     return view("dashboard");
    // });
    
});
