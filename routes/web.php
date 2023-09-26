<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


/* 
    uebung_01

    eine GET-Route 
    URL: http://routinglaravel.test/helloworld

*/
Route::get('/helloworld', function () {
    return "Hallo Welt, wie geht es Dir?";
});

/* 
	uebung_02
	
	eine GET-Route 
	URL: http://routinglaravel.test/name/jens/nachname/simon
	URL: http://routinglaravel.test/name/kim/nachname/schmitz
	
*/ 
Route::get('/name/{name}/nachname/{nachname}',function($name,$nachname){
    return "Der übergebene Name lautet: ".$name." ".$nachname;
});

/* 
	uebung_03
	
	eine GET-Route 
	URL: http://routinglaravel.test/user
	URL: http://routinglaravel.test/user/jens
	
	das Fragezeichen hinter dem name-Parameter erlaubt diese auch wegzulassen (optional) ohne Fehlermeldung!!
	
	username ist ein interner nickname, den man per URL nicht ansprechen kann
	
	anzeige aller routes ueber das Terminal mit:
	
	php artisan route:list
*/ 
Route::get('/user/{name?}',function($name=null){
    return "Name=".$name;
})->name('nickname');



use App\Http\Controllers\MeetingController;
Route::resource('/meetings',MeetingController::class)
//->except(['index']) // auschluss verschiedener route
//->names(['edit' => 'aendern']) // nachträgliches aendern der vorgegebenen nicknames
;

/*
  GET|HEAD        meetings ............................................. meetings.index › MeetingController@index
  POST            meetings ............................................. meetings.store › MeetingController@store
  GET|HEAD        meetings/create .................................... meetings.create › MeetingController@create
  GET|HEAD        meetings/{meeting} ..................................... meetings.show › MeetingController@show
  PUT|PATCH       meetings/{meeting} ................................. meetings.update › MeetingController@update
  DELETE          meetings/{meeting} ............................... meetings.destroy › MeetingController@destroy  
  GET|HEAD        meetings/{meeting}/edit ................................ meetings.edit › MeetingController@edit  
  */