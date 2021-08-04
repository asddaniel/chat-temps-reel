<?php

use Illuminate\Support\Facades\Route;
//namespace App\Http\Controllers;
use App\Http\Controllers\Appcontrollers as controller;
session_start();
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
$controller = new  controller();
Route::get('/', function(){
    $controller = new  controller();
    return $controller->vue();
});
Route::get('/connexion', function(){
    $controller = new  controller();
    return $controller->view_connection(); })->name("connexion");

Route::get('/traitement', function(){
    $controller = new  controller();
    return $controller->traitement(); });

Route::get('/inscription', function(){
    $controller = new  controller();
    return $controller->inscription(); });
Route::get('/users', function(){
    $controller = new  controller();
    return $controller->liste_users(); });