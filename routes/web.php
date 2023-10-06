<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use \App\Models\Post;

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


// für das Testen der PUT-Methode ohne Blade-Views
Route::put('/meetings_formular/{id}', [MeetingController::class,"updateFormular"]);



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
	DB::update("UPDATE interests SET text='updated' WHERE id = ?", [$id]);
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
		try {
			DB::table('interests')->insert(
				['text' => $interest->text, 'id' => $interest->id]
			);
		} catch (\Illuminate\Database\QueryException $ex) {
			echo "<br>Ein Fehler ist aufgetreten: " . $ex->getMessage();
		}

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

		try {
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
		} catch (\Illuminate\Database\QueryException $ex) {
			echo "<br>Ein Fehler ist aufgetreten: " . $ex->getMessage();
		}

	}

	$interests = DB::select('select * from interests ');
	echo "<br><br>Ausgabe der kompletten interests Tabelle<br>"; // Ausgabe aller Felder
	foreach ($interests as $interest) echo $interest->id . ", " . $interest->text . ", " . ($interest->created_at ?: "null") . ", " . ($interest->updated_at ?: "null") . "<br>";

	$posts = DB::select('select * from posts');
	echo "<br><br>Ausgabe der kompletten posts Tabelle<br>"; // Ausgabe aller Felder
	foreach ($posts as $post) echo $post->id . ", " . $post->text . ", " . ($post->created_at ?: "null") . ", " . ($post->updated_at ?: "null") . "<br>";


	return "<br><h2>Wenn keine Fehler aufgetaucht sind, sind die Tabellen jetzt gefüllt oder waren es bereits!</h2>";
});








Route::get("kap15_teste_posts_interests_query_builder_methoden", function () {

	echo "Übungen bis 18 muessen vorher gemacht worden sein, post und interest Tabelle müssen vorhanden und befüllt sein!";

	// 15.1 globaler Listener für SQL-Queries mit Dump-Ouput bei Bedarf aktivieren
	DB::listen(function ($sql) {
		//dump($sql);
	});

	// 15.3 Insert
	echo "<br>15.3 insert() - Methode mit und ohne Query-Chaining<br>";

	DB::table('interests')->insert(
		['text' => 'test1 ohne chaining']
	);

	$interests = DB::table('interests');
	$interests->insert(
		['text' => 'test2 mit chaining']
	);
	echo "<br>Ergebnis in der interest Tabelle<br>";
	dump(DB::table('interests')->get());

	// 15.4 Daten abrufen
	echo "<br>15.4 get() - Methode<br>";
	dump(DB::table('interests')->get());

	echo "<br>15.4 first() - Methode<br>";
	dump(DB::table('interests')->first());

	echo "<br>15.4 find(1) - Methode , Datensatz mit id 1 suchen<br>";
	dump(DB::table('interests')->find(1)); // sucht Datensatz mmit der id = 1

	echo "<br>15.4 value() - Methode für Spalte 'text' <br>";
	dump(DB::table('interests')->value("text")); // ohne where wird der 1.Datensatz gewählt, und nur dessen Feld 'text'

	echo "<br>15.4 pluck() - Methode für Spalte 'text'<br>";
	dump(DB::table('interests')->pluck("text")); // alle Datensätze gewählt, und nur dessen Feld 'text', also eine Spalte

	// 15.5 Select — Daten auswählen
	echo "<br>15.5 Select — Daten auswählen text und created_at mit select() und die id noch mit addSelect()<br>";
	$query     = DB::table('interests')->select('text', 'created_at');
	$interests = $query->addSelect('id')->get();
	dump($interests);

	// 15.6 where-Abfragen — Bedingungen festlegen
	echo "<br>15.6 where-Abfragen — Bedingungen festlegen, hier whereId(1) <br>";
	$interests = DB::table('interests')->whereId(1)->get();
	dump($interests);
	//erhalte alle Interessen, wo die ID gleich 1 ist.     

	echo "<br>15.6 where-Abfragen — Bedingungen festlegen, hier id=1 <br>";
	$interests = DB::table('interests')->where('id', 1)->get();
	dump($interests);
	//erhalte alle Interessen, wo die ID gleich 1 ist.  

	echo "<br>15.6 where-Abfragen — Bedingungen festlegen, hier id<3 <br>";
	$interests = DB::table('interests')->where('id', "<", 3)->get();
	dump($interests);

	echo "<br>15.6 where-Abfragen — Bedingungen festlegen, hier between 2 and 5<br>";
	$interests = DB::table('interests')->whereBetween('id', [2, 5])->get();
	dump($interests);


	echo "<br>15.6 where-Abfragen — Bedingungen festlegen, hier whereIn('id',[1,2,4,7])<br>";
	$interests = DB::table('interests')->whereIn('id', [1, 2, 4, 7])->get();
	dump($interests);

	echo "<br>15.6 where-Abfragen — Bedingungen festlegen, hier whereNotNull('text')<br>";
	$interests = DB::table('interests')->whereNotNull('text')->get();
	dump($interests);

	echo "<br>15.6.2 where-Closures<br>";
	$id   = 6;
	$date = \Carbon\Carbon::now();

	$interests = DB::table('interests')
		->where('text', '=', 'test2 mit chaining')
		->where(function ($query) use ($id, $date) {
			$query->where('id', '=', $id);
			$query->whereNULL('created_at'); //, '=', $date); // besser ;-)
		})
		->get();
	dump($interests);

	echo "<br>15.7 when - Abfragen, when z.B. kein Sortierparameter gegeben ist, wird dieses erkannt und dann unsortiert ausgegeben<br>";
	$sortBy = null;

	$interests = DB::table('interests')
		->when($sortBy, function ($query, $sortBy) {
			return $query->select($sortBy);
		}, function ($query) {
		return $query->select('text');
	})
		->get();
	dump($interests);

	echo "<br>15.8 Inhalte aktualisieren — Update<br>";
	$interests = DB::table('interests')
		->where('id', 1)
		->update(['text' => "neues Hobby"]);
	dump(DB::table('interests')->get());


	echo "<br>15.8 Inhalte aktualisieren — updateOrInsert<br>";
	$interests = DB::table('interests')
		->where('id', 99)
		->updateOrInsert(['text' => "insert99"]); // wird angelegt, mit autoid
	dump(DB::table('interests')->get());

	echo "<br>15.9 Inhalte löschen - Delete<br>";
	DB::table('interests')->where('id', 1)->delete();
	dump(DB::table('interests')->get());

	echo "<br>15.10 Datenbankwerte sortiert ausgeben mit orderBy() <br>";
	$interests = DB::table('interests')
		->orderBy('id', 'desc') // von hoch nach tief
		->get();
	dump($interests);

	echo "<br>15.11 Chuncking - Stückelung hier 5 Stück<br>";
	$posts = DB::table('posts')->orderBy('id')->chunk(5, function ($posts) {
		foreach ($posts as $post) {
			//tu irgendwas mit den posts z.B. löschen oder bearbeiten
			dump($post);
			//aktion bis zur id 13 durchführen und dann das chunking abbrechen
			if ($post->id === 13) {
				return false;
			}
		}
	});
	dump($posts);

	echo "<br>15.12 Aggregatfunktionen<br>";
	$post_count = DB::table('posts')->count();
	dump($post_count);

	$highest_id = DB::table('posts')->max('id');
	dump($highest_id);

	$average_id = DB::table('posts')->avg('id');
	dump($average_id);

	echo "<br>15.13 Joins<br>";
	$alles = DB::table('posts')

		->join('interests', 'interests.id', '=', 'posts.interest_id')
		->get();

	dump($alles);

	echo "<br>15.14 Unions<br>";
	$first = DB::table('interests')->where('id', '<=', 4);

	$second = DB::table('interests')
		->where('id', '>', 4)
		->union($first);

	dump($first->get());
	dump($second->get());

	echo "<br>15.15 Raww Expressions<br>";
	$interests = DB::table('interests')
		->select(DB::raw('count(*) as interest_count'))
		->get();
	dump($interests); // Anzahl der Datensätze in interests-Tabelle

	echo "<br>ENDE<br>";
	return "";

});

Route::resource("/posts", App\Http\Controllers\PostController::class);

/* 
	uebung_19
	
	Verschiedenen Unteraufgaben durchführen:


	nicht im InterestController das ist unschön ;-)
*/
Route::get('uebung_19', function () {
	echo '<br>Die Aufgaben müssen eigentlich jeweils nacheinander, wie im Video, auskommentiert werden, sonst beinflussen sie sich gegenseitig, hier wird aber die Variable $interest gar nicht benutzt, also funktioniert alles!<br><br>';
	//Aufgabe 1
	$posts = DB::table('posts');
	dump($posts->get());

	//Aufgabe 2
	$countPosts = $posts->count();
	dump($countPosts);

	//Aufgabe 3
	DB::insert('insert into posts (title, text) value (?,?)', ['uebungsaufgabe', 'das ist schoen']);
	DB::insert('insert into posts (title, text) value (:titel,:text)', ['titel' => 'uebungsaufgabe', 'text' => 'das ist schoen']);
	$posts = DB::table('posts');
	dump($posts->get());

	//Aufgabe 4
	$update = $posts->whereBetween('id', [6, 10])->whereNull('interest_id')->update(['text' => 'interest_id war null, neuer Text']);
	dump($update); // 0

	//Aufgabe 5
	$created = DB::table('posts')->whereId(2)->value('created_at');
	dump($created); // NULL

	//Aufgabe 6
	$order_posts = DB::table('posts')->whereNotNull(['text', 'interest_id'])->orderBy('id', 'desc')->get();
	dump($order_posts);

	//Aufgabe 7
	$deleted = DB::table('posts')->whereNull('text')->orWhereNull('interest_id')->delete();
	dump($deleted);
});



// Eloquent ORM nach Active Record mit QueryBuilder Methoden
//use App\Models\Post;

Route::get("/eloquent", function () {
	// CRUD

	// CREATE 
	// Neues OBjekt->Datensatz erzeugen
	$post        = new Post; // neues leeres Objekt
	$post->title = "Ein neuer Post aus Eloquent erstellt";
	$post->text  = "Der Text dazu";

	dump($post); // nur im Speicher
	$post->save();
	dump($post); // jetzt in der Datenbank

	// Alle DAtensätze werden auf Objekte abgebildet und einglesen
	$posts = Post::all();
	dump($posts);

	// UPDATE
	//DB::table('posts')->get();
	$post = Post::find(3);
	if ($post) {
		dump($post);
		$post->title = "Neuer Titel für die 1";
		$post->text  = "eine weiterer Text";
		$post->save();
		dump($post);
	}

	// DELETE
	$post = Post::find(4);
	if ($post)
		$post->delete();

	// SELECT
	dump(Post::all()); // Eloquent Methode aus Kapitel 15
	dump(Post::where("id", ">", "3")); // QUeryBuilder Kapitel 16


	// SubQuery
	echo "SubQuery";
	$posts = Post::addSelect(['interest' => \App\Models\Interest::select('text')->whereColumn('id', 'interest_id')->limit(1)])->get();
	dump($posts);

	// Mass Assignment & Mass Update
	// QueryBuilder Methoden am Model eingesetzt die Datensätze erstellen oder öndern benötigen ein
	// Schutzkonzept


	// QueryBuilder Methoden die Daten verändern
	// diese funtionieren nur, wenn in der Model-Datei hier Post.php eine Variable eingesetzt wird !!
	echo "Mass Assignment + Update";
	Post::create(['title' => 'uebungsaufgabe', 'text' => 'das ist schoen']);
	Post::updateOrInsert(['title' => 'uebungsaufgabe', 'text' => 'das ist schoen']);
	Post::where('id', 1)->update(['text' => "neues Hobby"]);

	// Scope als Methode im Model anlegen scopeNurFuenf() und als nurFuenf() benutzen
	echo "scope";
	dump(Post::nurFuenf()->get());
	dump(Post::offset(0)->limit(5)->get());

	// softdelete
	// hierfür muss eine Tabellen Änderung des Modells durchgeführt werden,
	// die Spalte deleted_at wid hinzugefügt in der Migration mit 
	// $table->softDeletes(); 
	// in der Modell Klasse Post.php muss dieses aktiviert werden
	// use Illuminate\Database\Eloquent\SoftDeletes;
	// use SoftDeletes;   
	echo "soft delete";

	// DELETE
	$post = Post::find(2);
	if ($post)
		$post->delete();

	echo "Datensatz soft deleted löschen, richtiges löschen funktioniert nicht mehr!!<br>";

	echo "mit get() werden nur die vorhandenen ohne soft delete angezeigt";
	$posts = Post::get(); // alle ohne soft deletet, die werden nicht mehr selektiert
	dump($posts);

	echo "mit withTrashed()->get() werden alle Datensaetze angezeigt";
	$posts = Post::withTrashed()->get(); // alle ,auch die  soft deletet wurden
	dump($posts);

	echo "mit onlyTrashed()->get() werden nur die soft deleted Datensaetze angezeigt";
	$posts = Post::onlyTrashed()->get(); // nur die soft deletet wurden
	dump($posts);

	echo "den soft deleted Datensatz wieder als nicht geloescht kennzeichnen";
	$post = Post::withTrashed()->find(2);
	if ($post)
		$post->restore(); // wieder herstellen
	$posts = Post::get();
	dump($posts);

	echo "den Datensatz richtig loeschen mit forceDelete()<br>";
	$post = Post::find(2);
	if ($post)
		$post->forceDelete(); // dauerhaft loeschen

	$posts = Post::get();
	dump($posts);

	echo "Im Modell Spalten als Carbon Instanz definieren, danach kann man das Attribut als Object behandeln, wenn man das nicht macht, ist der Zeitstempel ein einfacher String/Text";
	$post = Post::find(5);
	if ($post) {
		dump($post->created_at); // Carbon date
		dump($post->datum_feld); // String , das Feld muss als TimeStamp in der Migration angelegt werden
	}


});

/*
	uebung_21
	
	Hinweis: In der interests - Route sind mehrere Beispiel auskommentiert, diese bei Bedarf wieder aktivieren!

	URLs zum Eintragen der Datensätze:

	http://routinglaravel.test/interest/create/Programmieren
	http://routinglaravel.test/interest/create/Lesen
	http://routinglaravel.test/interest/create/Politik
	http://routinglaravel.test/interest/create/Sport
	http://routinglaravel.test/interest/create/Gaming

	http://routinglaravel.test/article/create/LaravelCRUD/CreateReadUpdateDelete/1
	http://routinglaravel.test/article/create/Politik/Umwelt ist toll Wirtschaft aber auch/3
	http://routinglaravel.test/article/create/Formel1/Autorennen macht viel Spa? beim Zusehen/4

	URLs zum Ansehen der Datensätze:

	http://routinglaravel.test/articles
	http://routinglaravel.test/interests

	
	
*/
use App\Models\Interest;
use App\Models\Article;

// Artikel erstellen
Route::get('article/create/{title}/{text}/{interest_id}/', function ($title, $text, $interest_id) {

	$article = new Article;

	$article->title       = $title;
	$article->text        = $text;
	$article->interest_id = $interest_id;

	$article->save();
});

// Interessen erstellen
Route::get('interest/create/{text}', function ($text) {
	$interest = new Interest;

	$interest->text = $text;

	$interest->save();
});

// Artikel anzeigen
Route::get('articles', function () {
	$articles = Article::all();

	dump($articles);
});

// Interessen anzeigen
Route::get('interests', function () {


	$interests = Interest::all();
	dump($interests);
	echo "<b>Hinweis: In der interests - Route sind mehrere Beispiel auskommentiert, diese bei Bedarf wieder aktivieren!</b><br>";
	// Hinweis: In der interests - Route sind mehrere Beispiel auskommentiert, diese bei Bedarf wieder aktivieren!
	/*
					  // suchen nach ID
					  $interests = Interest::findOrFail(1); // wird gefunden!
					  //$interests = Interest::findOrFail(3443543); // wird nicht gefunden! 404
					  var_dump($interests);
					  */

	/*
				   // suchen nach exaktem Text 
				   $interests = Interest::whereText("Politik")->get(); // wird gefunden!
				   // oder nur erstes, wenn mehrere!
				   //$interests = Interest::whereText("Politik")->first();
				   var_dump($interests);
				   */

	/*
				   // suchen , finden und Text aendern
				   $interest = Interest::whereText("Politik")->first(); // geht nur einmal!! dann Fehler!
				   $interest->text="Chillen";
				   $interest->save();
				   var_dump($interest);
				   */

	/*
				   // suchen , finden und loeschen (dauerhaft!!!/ richtiges DELETE FROM ....)
				   $interest = Interest::whereId(3)->first();
				   $interest->delete();
				   var_dump($interest);
				   */
});

/*
	jetzt nochmal was loeschen und drauf achten, deleted NULL nicht NULL!
	
	http://routinglaravel.test/interest/delete/1 oder 2 oder ...
	
	
*/

Route::get('interest/delete/{id}', function ($id) {
	$interest = Interest::whereId($id)->first();
	$interest->delete();
	dump($interest);

});

// http://routinglaravel.test/interests/with_trashed

Route::get('interests/with_trashed', function () {
	$interests_trashed = Interest::withTrashed()->get();
	dump($interests_trashed);

});

// http://routinglaravel.test/interest/only_trashed
Route::get('interests/only_trashed', function () {
	$interest = Interest::onlyTrashed()->get();
	dump($interest);

});

Route::get('article/create_ma/{title}/{text}', function ($title, $text) {

	Article::create(['title' => $title, 'text' => $text]);

});

// Übung 21 Ende

// Eloquent-Beziehungen 
Route::get("/1_n_save_article_with_interest_eloquent", function () {

	// 2 Sql Statements
	$article=App\Models\Article::find(1); // 1. Sql Statement
	$interest_id=$article->interest_id; // 1
	$interest = App\Models\Interest::find($interest_id); // 2. Sql Statements
	//dump($interest->text);


	$article=App\Models\Article::find(1);// 1. Sql Statement

	//-> Attribut interest // Methode interest()
	dump($article->interest->text); //singen , erzeugt auch unsichtbar ein SQL-Statement



	$interest=App\Models\Interest::find(4); // 1. Sql Statement
	dump($interest->articles);
/*
	foreach ( $interest->articles  as $article) {
		echo $article->title."<br>"; 
	}*/
	dump($interest->articles->title);

	// neuer Artikel
	$article = new Article();

	$article->title = 'Speichern';
	$article->text  = 'Wir speichern einen neuen Artikel mit der save Methode, direkt mit Interesse zugeordnet, hier die 1';
	//$article->interest_id = 4; // Vorsicht nicht so arbeiten
	//$article->save();

	// gewuenchtes Interesse, das bereits besteht, auswaählen
	$interest = Interest::find(4);
	if ($interest) {
		// für den Artikel speichern
		$interest->articles()->save($article);

		// save many
		// und nochmal dieses Interesse auf mehrere Artikel speichern
		$article1 = new Article();

		$article1->title = '1 - Speichern';
		$article1->text  = '1 - Wir speichern mehrere neue Artikel mit der saveMany Methode, direkt mit Interesse zugeordnet, hier die 1';

		$article2 = new Article();

		$article2->title = '2 - Speichern';
		$article2->text  = '2 - Wir speichern mehrere neue Artikel mit der saveMany Methode, direkt mit Interesse zugeordnet, hier die 1';

		$articles = [$article1, $article2];
		$interest->articles()->saveMany($articles);
		echo "gespeichert!";
	} else
		echo "interest nicht in der Tabelle gefunden!";
		
});


Route::get("1_n_update_article_with_interest_eloquent", function () {

	$interest = Interest::find(1); //id = 1

	dump($interest); // int , string , float, boolean, array , object
	// object -> Klasse 

	if ($interest) {

		$article = Article::findOrFail(1);

		// Vorsicht, es muss richtig rum konstruiert werden
		$article->interest()->associate($interest);


		$article->save();
		echo "gespeichert!";

	} else
		echo "interest nicht in der TAbelle gefunden!";

	return "";
});

//Eager Load
//eine Anfrage um alle Artikel zu erhalten
//eine Anfrage um die entsprechenden Interessen zu erhalten
Route::get("eager_loading", function () {
	echo "in der debugbar sieht man das eager loading im vergleich zur Variante ohne<br>";

	$articles = Article::with('interest')->get(); // mit eager loading
	$articles = Article::get(); // ohne eager loading
	dump($articles);

	foreach ($articles as $article) {
		echo $article->title . " - ";
		echo $article->interest->text;
		echo "<br>";
	}

	return "";
});

use App\Models\Tag;
use App\Models\Product;

Route::get("m_m_relation", function () {
	Product::truncate();
	Tag::truncate();
	DB::table("product_tag")->truncate();

	$product              = new Product();
	$product->name        = 'Buch als Produkt 1';
	$product->description = 'ein schönes Buch';
	$product->price       = 19.99;
	$product->save();

	$product              = new Product();
	$product->name        = 'Auto als Produkt 2';
	$product->description = 'Ein schönes Auto';
	$product->price       = 19.99;
	$product->save();

	$tag       = new Tag();
	$tag->name = 'Freizeit';
	$tag->save();

	$tag       = new Tag();
	$tag->name = 'Bildung';
	$tag->save();

	// 1 - 1
	$product = Product::find(1);
	$tag     = Tag::find(1);
	// manyToMany 1 : 1
	$product->tags()->attach($tag->id);

	// 1 - 2
	$product = Product::find(1);
	$tag     = Tag::find(2);

	// 1 : 2 
	$product->tags()->attach($tag->id);


	// 2 - 1
	$product = Product::find(2);
	$tag     = Tag::find(1);

	// 2 - 1 
	$product->tags()->attach($tag->id);


	$products = Product::all();
	//dump($products);

	foreach ($products as $product) {
		echo $product->name ."   ".$product->description. "  <b>Tags:</b> ";
		//dump($product->tags);

		foreach ($product->tags as $tag  ) {
			echo $tag->name . ", ";
		}
		echo "<br>";
	}
});

