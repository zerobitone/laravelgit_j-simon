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





Route::get("/datenview2", function () {
	$daten = [
		'vornamen' => [
			'<div style="color:red">jens</div>',
			'tim',
			'anne'
		]
	];


	return view("datenview2", $daten); // resourced/views/datenview.blade.php

});


// blade

// 1.
Route::get("/bladeview1a", function () {
	// Datenübergabe  1. a) assoziatives Array mit einem einfachen Wert
	$daten = ['user' => '<h5>Jens</h5>'];
	return view('blade_unterricht.variablen_uebergabe.bladeview1a', $daten);
});

Route::get("/bladeview1b", function () {
	// Datenübergabe  1. b) assoziatives Array mit mehren Werten
	$daten = ['user' => 'Jens', 'password' => 'pssst_geheim'];
	return view('blade_unterricht.variablen_uebergabe.bladeview1b', $daten);
});

Route::get("/bladeview1c", function () {
	// Datenübergabe  1. c) assoziatives Array mit einem mehrfach Wert
	$daten = ['users' => ['Jens', 'Tim', 'Tom']];
	return view('blade_unterricht.variablen_uebergabe.bladeview1c', $daten);
});

// 2.
Route::get("/bladeview2", function () {
	// Datenübergabe  2. wie  1. a)
	$vorname = "Jens";
	$daten   = ['user' => $vorname];
	return view('blade_unterricht.variablen_uebergabe.bladeview1a', $daten);
});

// 3.
Route::get("/bladeview3a", function () {
	// Datenübergabe  3. a) with()-Methode mit 2 Parametern
	$user = '<h5>Jens</h5>';
	return view('blade_unterricht.variablen_uebergabe.bladeview1a')->with('user', $user);
});

Route::get("/bladeview3b", function () {
	// Datenübergabe  3. b) with()-Methode mit assoziativem Array
	$daten = ['user' => 'Jens', 'password' => 'pssst_geheim'];
	return view('blade_unterricht.variablen_uebergabe.bladeview1b')->with($daten);
});

Route::get("/bladeview3c", function () {
	// Datenübergabe  3. c) witUser()-Methode mit einem Argument
	$user = '<h5>Jens</h5>';
	return view('blade_unterricht.variablen_uebergabe.bladeview1a')->withUser($user);
});

// 4.
Route::get("/bladeview4a", function () {
	// Datenübergabe  4. a) einfacher Wert
	$user = 'Jens';
	return view('blade_unterricht.variablen_uebergabe.bladeview1a', compact('user'));
});

Route::get("/bladeview4b", function () {
	// Datenübergabe  4. b) mehrer einfache Werte
	$user     = 'Jens';
	$password = "pssst_geheim";
	return view('blade_unterricht.variablen_uebergabe.bladeview1b', compact('user', 'password'));
});

Route::get("/bladeview4c", function () {
	// Datenübergabe  4. c)  Array 
	$users = ['Jens', 'Tim', 'Tom'];
	return view('blade_unterricht.variablen_uebergabe.bladeview1c', compact('users'));
});

Route::get("/bladeview5", function () {
	// Datenübergabe  5. c)  Array mit Array 
	$users = [
		[
			'name' => 'Jens Simon',
			'email' => 'jens.simon@gmx.net',
			'phone' => '01xx-12345678',
			'age' => '42',
		],
		[
			'name' => 'Tim Schmitz',
			'email' => 'tim@schmitz.com',
			'phone' => '0123-12406086',
			'age' => '23',
		],
	];
	dump($users);
	return view('blade_unterricht.variablen_uebergabe.bladeview5', compact('users'));
	/*$inhalt = view('blade_unterricht.variablen_uebergabe.bladeview5', compact('users'));
				dump($inhalt);
				dd($inhalt->render());*/
});

Route::get("/", fn() => view("welcome", []));

class Daten
{
	public $x;
	public $y;

}
Route::get("/jsonOutput", function () {
	$data    = new Daten();
	$data->x = 1;
	$data->y = 2;

	return response()->json($data);
});

Route::get("/zurInternerRoutePerNickname", function () {

	return redirect()->route("hello"); // named route per nickname umleitung
});

Route::get("/zurControllerAction", function () {

	return redirect()->action("TestController@printMessage"); // interner Controller zu einer action, also einer Methode des Controllers
});

Route::get("/zurExternenUmleitungGfn", function () {

	return redirect()->away("https://gfn.de"); // externe Seite
});



Route::get("/file_pdf", function () {

	return response()->file("bild.pdf");
});

Route::get("/file_bild", function () {

	return response()->file("bild.jpg");
});



Route::get("/download_pdf", function () {

	return response()->download("bild.pdf", "2023_09_27_ihr_bild.pdf"); //->deleteFileAfterSend();
});

Route::get("/download_bild", function () {

	return response()->download("bild.jpg", "2023_09_27_ihr_bild.jpg"); //->deleteFileAfterSend();
});



Route::get('/status_aenderung', function (Request $request) {

	$str = "<html><head></head><body>";
	$str .= "Wir sind in Wartung! Status sollte 503 sein!";
	$str .= "</body></html>";

	return response($str, 503); // Service not available
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
Route::get('/name/{name}/nachname/{nachname}', function ($name, $nachname) {
	return "Der übergebene Name lautet: " . $name . " " . $nachname;
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
Route::get('/user/{name?}', function ($name = null) {
	return "Name=" . $name;
})->name('nickname');




Route::resource('/meetings', MeetingController::class)
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
use App\Http\Controllers\TestController;

Route::get('/helloworld2', [TestController::class, "printMessage"])->name("hello");

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

Route::get('/name/{name}/nachname/{nachname}', [TestController::class, 'showName']);
Route::get('/user/{name?}', [TestController::class, 'showUsername']);

/* uebung_09
  sollte vor der resource-Route-Methode kommen!!!
*/
use App\Http\Controllers\CertificateController;

// bis L7
//Route::get('names','CertificateController@nameList');

// ab L8
Route::get('names', [CertificateController::class, "nameList"]);

Route::get("/datenview", function () {
	$daten = [
		'vorname' => 'jens',
		'nachname' => 'simon'
	];


	return view("datenview", $daten); // resourced/views/datenview.blade.php

});

// uebung_11
// /users
// sollte vor den resource-Route kommen!!!
// bis L7
//Route::get('users','CertificateController@showUser');
// ab L8
Route::get('users', [CertificateController::class, "showUser"]);

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
Route::resource('certificates', 'CertificateController')
	//	->except(['index', 'edit', 'update']) // ausser - blacklisting
//->only('store','create','show','destroy') // nur - whitelisting 
	->names(['index' => 'index']);

// ab L8
/*
Route::resource('certificates',CertificateController::class)
->except(['index','edit','update'])
//->only('store','create','show','destroy') // nur - whitelisting 
->names(['create' => 'certifikates.certify']);*/

/* 
uebung_07

Übung 7: Der Query-String entscheidet über den Ausgang der Anfrage

Erstelle eine Closure Route, die die URI routinglaravel.test/question handhabt.
Abhängig von Parametern im Query-String soll eine Ausgabe wiedergegeben werden. 

Die entsprechenden Anforderungen habe ich dir aufgelistet.

Packe das Bild Success.png in deinem Laravel-Projekt in den Pfad ./public/assets/image/Success.png


1. Wenn keine »id« vorhanden ist oder die »id« null ist, soll eine Fehlermeldung mit einem HTTP-Statuscode 404 zurückgegeben werden.

2. Wenn der Parameter »file« true ist, also nicht null oder false, soll das Bild Success.png heruntergeladen werden. Der Name der Datei soll der Wert des »id«-Parameters + die Endung .png sein. Die Parameter »question« und »id« dürfen ebenfalls nicht null sein.

3. Wenn die »question« nicht vorhanden ist, soll auf die Seite der Akademie "https://www.webmasters-fernakademie.de/" weitergeleitet werden. Die »id« soll aber vorhanden sein.

4. Wenn die »question« sowie die »id« vorhanden sind, soll ein kleiner individueller Text wiedergegeben werden. Dieser soll bestätigen, dass die Frage gespeichert wurde. Der Statuscode soll 200 sein.

Prüfe mit den nachfolgenden URLs, ob deine erwartete Ausgabe wiedergegeben wird.

http://routinglaravel.test/question?question=Warum%20ist%20die%20Erde%20rund?&id=3&file=false

http://routinglaravel.test/question?question=Warum%20ist%20die%20Erde%20rund?

http://routinglaravel.test/question?question=Warum%20ist%20die%20Erde%20rund?&id=3&file=true

http://routinglaravel.test/question?id=3&file=false

*/
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

Route::get('question', function (Request $request) {

	if (!$request->filled('id')) { // keine id oder id ist null
		echo "id=" . $request->id;

		return response('Ein Fehler ist aufgetreten, da keine id übergeben wurde', 404); //Response::HTTP_NOT_FOUND);

	} elseif ($request->filled(['id', 'question']) && $request->file === "true") { // id, question file=true 

		$id      = $request->id;
		$newname = $id . ".png";

		return response()->download('assets/image/Success.png', $newname);
		//return response()->download('assets/image/Success.png', $newname)->deleteFileAfterSend(true);

	} elseif ($request->has('id') && !$request->filled('question')) { // id, keine question 

		return redirect()->away('https://www.webmasters-fernakademie.de');

	} elseif ($request->filled(['id', 'question']) && $request->file !== "true") { // id,question, file=false 

		return "Ihre Frage wurde erfolgreich gespeichert.";
		/*return response()->json([
												'art' => "antwort",
												'inhalt' => 'Ihre Frage wurde erfolgreich gespeichert.'
											]);*/
	}

});




// Template inheritance
Route::get("/home", function () {
	return view("home");
});
Route::get("/impressum", function () {
	return view("impressum");
});

// uebung_12
// /users
// sollte vor den resource-Route kommen!!!
// bis L7
//Route::get('users','CertificateController@showUser');
// ab L8
Route::get('users_uebung12', [CertificateController::class, "showUserUebung12"]);

//

/*
Route::get('interests','InterestController@index');
Route::get('interests/create/{id}/{text}','InterestController@create');
Route::get('interests/delete/{id}','InterestController@delete');

*/

use Illuminate\Support\Facades\DB;

Route::get("/raw_test_delete/{id}", function ($id) {
	echo "start delete ";
	DB::enableQueryLog(); // Enable query log

	DB::delete("DELETE FROM interests WHERE id = ?", [$id]);

	dump(DB::getQueryLog()); // Show results of log
	echo "ende delete ";
});

Route::get("/raw_test_update/{id}", function ($id) {
	echo "start update ";
	DB::delete("UPDATE interests SET text='updated' WHERE id = ?", [$id]);
	echo "ende update ";
});

Route::get(
	"/raw_test_select",
	function () {
		echo "start select ";
		$daten = DB::select('SELECT * FROM interests;');
		dump($daten);
		foreach ($daten as $data) // $data - Objekt
			//print_r($data);
	
			echo $data->id . " - " . $data->text . " - " . ($data->created_at ?: "leer") . " - " . "<br>";

		echo "ende select ";
	}
);

Route::get("/raw_test_insert", function () {

	echo "start insert ";

	/*DB::insert('INSERT INTO interests (id, text) VALUES (:id,:text)',
		   [
			  'id' => '17', 
			  'text' => 'PHP'
		  ]);

		  DB::insert('INSERT INTO interests (id, text) VALUES (:id,:text)',
		   [
			  'id' => '18', 
			  'text' => 'Pause'
		  ]);
	  */
	DB::insert(
		'INSERT INTO interests (text, created_at) VALUES (:text, :created_at)',
		[

			'text' => 'Ohne PK ID',
			'created_at' => 'NOW()' //now() // Webserver
		]
	);

	/*$daten = [
			  ['8', "c"],
			  ['9', "d"]
		  ];
		  //DB::insert('INSERT INTO interests (id, text) VALUES (?,?,?)', ['1',"Coding"]);
		  foreach ($daten as $data) 
			  DB::insert('INSERT INTO interests (id, text) VALUES (?,?)', $data); 
		  
				   INSERT			 INTO interests (id,text) 			 VALUES			 (4,"SQL"),			 (5,"PHP");
		  echo "ende insert";
		  */

});
/* 
	uebung_17
	
	URL:
	http://routinglaravel.test/interests
	
	http://routinglaravel.test/interests/create/1/Programmieren
	http://routinglaravel.test/interests/create/2/Chillen
	
	http://routinglaravel.test/delete/2
*/

Route::get('interests', 'InterestController@index');
Route::get('interests/create/{id}/{text}', 'InterestController@create');
Route::get('interests/delete/{id}', 'InterestController@delete');


/*
	uebung_18
*/
Route::get('uebung_18_daten_installieren', function () {

	DB::listen(function ($sql) {
		dump($sql);
	});

	$interestdata = [
		[
			'id' => 1,
			'text' => 'Coding',
		],
		[
			'id' => 2,
			'text' => 'Kochen',
		],
		[
			'id' => 3,
			'text' => 'Singen',
		],
		[
			'id' => 4,
			'text' => 'Fußball',
		],
	];

	foreach ($interestdata as $interest) {
		$interest = (object) $interest;
		DB::table('interests')->insert(
			['text' => $interest->text, 'id' => $interest->id]
		);
	}

	$postdata = [
		[
			'id' => 1,
			'title' => 'Montag',
			'text' => 'Montag ist schön zum Fußball spielen',
			'interest_id' => 4,
		],
		[
			'id' => 2,
			'title' => 'jeder Tag',
			'text' => null,
			'interest_id' => 1,
		],
		[
			'id' => 3,
			'title' => 'Dienstag',
			'text' => 'Dienstag koche ich.',
			'interest_id' => 2,
		],
		[
			'id' => 4,
			'title' => 'Mittwoch',
			'text' => 'Mittwoch singe ich',
			'interest_id' => 3,
		],
		[
			'id' => 5,
			'title' => 'Mittwoch',
			'text' => 'Mittwoch ist schlechtes Wetter',
			'interest_id' => null,
		],
		[
			'id' => 6,
			'title' => 'Donnerstag',
			'text' => 'Donnerstag lerne ich den Query Builder',
			'interest_id' => 1,
		],
		[
			'id' => 7,
			'title' => 'Essen',
			'text' => 'Ich bin hungrig.',
			'interest_id' => null,
		],
		[
			'id' => 8,
			'title' => 'Freitag',
			'text' => null,
			'interest_id' => 1,
		],
		[
			'id' => 9,
			'title' => 'Samstag',
			'text' => 'Samstag koche ich.',
			'interest_id' => 2,
		],
		[
			'id' => 10,
			'title' => 'Fußball',
			'text' => null,
			'interest_id' => 4,
		],
		[
			'id' => 11,
			'title' => 'Coding',
			'text' => 'Laravel macht Spaß',
			'interest_id' => null,
		],
	];

	foreach ($postdata as $post) {
		$post = (object) $post;

		DB::table('posts')->insert(
			[
				'id' => $post->id,
				'title' => $post->title,
				'text' => $post->text,
				'interest_id' => $post->interest_id,
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now(),
			]
		);
	}
	return "Wenn keine Fehler aufgetaucht sind, sind die Tabellen jetzt gefüllt!";
});








Route::get("teste_posts_interests_query_builder_methoden", function () {

	
	// INSERT INTO
	/*$post = DB::table('posts');
	dd($post);

	$post->insert(
			[[
				//'id' => "42",
				'title' => "Interessante Zahl",
				'text' => "Woher kommt eigentlich die 42?",
			],
			[
				'title' => "noch was interessantes",
				'text' => "Wer weiss was!",
			]	
				
			]
		);

	dd($post);
	*/
	DB::listen(function ($sql) {
		dump($sql);
	});

	$posts=DB::table('posts'); //SELECT * ..
	//dd($posts);

	$posts = $posts->select("id" , "title", "text"); // SELECT  id,titel,text
	//dump($posts);
	$posts = $posts->orderBy('id', 'asc');
	$posts = $posts->where("id","<", 4); // SELECT  id,titel,text .. WHERE id < 4
	//dd($posts);
	$posts = $posts->orWhere("title","Essen");
	$post_temp=$posts;

	$posts = $posts->get(); // SELECT id,titel,text FROM posts;
	dump($posts);
	foreach($posts as $post){
      echo $post->title."<br>"; //Collection
	}

	$posts=$post_temp->first();
	dd($posts);
	
	echo"<br>".$posts->title; // +"title":"ein Title"
	dd($posts);

	DB::table('posts')
	->where('id',2)
	->update(['text'=>"dies ist ein test"]);

	DB::table('posts')
	->where('id',2)
	->delete();
});