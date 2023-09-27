<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

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

//Route::redirect("/","/download_pdf");

Class Daten {
	public $x;
	public $y;
	
}
Route::get("/jsonOutput",function (){
 $data =new Daten();
 $data->x=1;
 $data->y=2;

	return response()->json($data);
});

Route::get("/zurInternerRoutePerNickname",function(){

	return redirect()->route("hello"); // named route per nickname umleitung
});

Route::get("/zurControllerAction",function(){

	return redirect()->action("TestController@printMessage"); // interner Controller zu einer action, also einer Methode des Controllers
});

Route::get("/zurExternenUmleitungGfn",function(){

	return redirect()->away("https://gfn.de"); // externe Seite
});



Route::get("/file_pdf",function(){

	return response()->file("bild.pdf");
});

Route::get("/file_bild",function(){

	return response()->file("bild.jpg");
});



Route::get("/download_pdf",function(){

	return response()->download("bild.pdf","2023_09_27_ihr_bild.pdf");//->deleteFileAfterSend();
});

Route::get("/download_bild",function(){

	return response()->download("bild.jpg","2023_09_27_ihr_bild.jpg");//->deleteFileAfterSend();
});



Route::get('/status_aenderung', function ( Request $request                 ) {

	$str= "<html><head></head><body>";
	$str.="Wir sind in Wartung! Status sollte 503 sein!";
	$str.=  "</body></html>" ;
    
	return response($str, 503   ); // Service not available
	// oder über vordefinierte Konstante
	//return response($str, \Symfony\Component\HttpFoundation\Response::HTTP_SERVICE_UNAVAILABLE   ); // Service not available
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

  /* 
	// uebung_04
	
	zuerst muss der Controller erstellt werden, erst dann kann die route diesen benutzen!

	eine GET-Route 
	URL: http://routinglaravel.test/helloworld2
	
	Der Output kommt nun nicht mehr aus einer Closure von dieser Datei (function(){ return 'output';}
	
	Sondern ueber eine Umleitung zur Methode des Controllers!

	
	php artisan route:list

	
	*/ 
// bis L7
//Route::get('/helloworld2','TestController@printMessage');

// ab L8
use  App\Http\Controllers\TestController;
Route::get('/helloworld2',[TestController::class,"printMessage"])->name("hello");

/* 
	uebung_05
	
	zuerst muessen die beiden Methoden im Controller erstellt werden, erst dann koennen die routes diese benutzen!
	
	php artisan route:list
	
	URL: http://routinglaravel.test/name/jens/nachname/simon
		 http://routinglaravel.test/name/kim/nachname/schmitz
		 http://routinglaravel.test/name/nachname/
		 http://routinglaravel.test/name/jens/nachname/
		 http://routinglaravel.test/name/jens/nachname
		 	 
		 
	URL: http://routinglaravel.test/user/jens
		 http://routinglaravel.test/user/
		 http://routinglaravel.test/user
*/ 

// bis L7
// Route::get('/name/{name}/nachname/{nachname}','TestController@showName');	
// Route::get('/user/{name?}','TestController@showUsername');

// ab L8

Route::get('/name/{name}/nachname/{nachname}',[TestController::class,'showName']);	
Route::get('/user/{name?}',[TestController::class,'showUsername']);

/* 
	uebung_06
	
	zuerst den Controller mit:

	php artisan make:controller CertificateController --resource
	
	erstellen!
	
	dann muessen die beiden Methoden im Controller nach Wunsch auscodiert werden!
	
	dann die routen setzen, alle auf einen Schlag, mit Ausnahmen und mit alias fuer 'create'
	
	php artisan route:list
	
	URL:
			http://routinglaravel.test/certificates/create 
			http://routinglaravel.test/certificates/123      show mit einer id kann auch text sein!?  
			http://routinglaravel.test/certificates/abc
	*/ 

// bis L7	
Route::resource('certificates','CertificateController')
->except(['index','edit','update']) // ausser - blacklisting
//->only('store','create','show','destroy') // nur - whitelisting 
->names(['create' => 'certifikates.certify']);

// ab L8
/*use  App\Http\Controllers\CertificateController;
Route::resource('certificates',CertificateController::class)
->except(['index','edit','update'])
//->only('store','create','show','destroy') // nur - whitelisting 
->names(['create' => 'certifikates.certify']);*/

