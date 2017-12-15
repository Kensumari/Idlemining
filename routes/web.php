<?php

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

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
$router->get('more', ['as' => 'more', 'uses' => 'MoreController@index']);

$router->post('login', ['as' => 'auth.login', 'uses' => 'LoginController@login']);