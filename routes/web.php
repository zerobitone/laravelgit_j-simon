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

// Im Browser als URL: http://localhost/
Route::get('/', function () {
    echo "hihi docker ;-)";
    //return view('welcome');
});

// Klassen werden mit grossem Buchstaben eingeleitet - Pascal Case
// get - was ist das? eine Methode, die GET-Protokoll Anfragen,
// die an den Webserver gestellt werden, empfangen kann, wenn denn die url exakt erkannt wurde

// Im Browser als URL: http://localhost/articles/wir_machen_jetzt_pause
// Route::get($url:String, ....)
Route::get("articles/wir_machen_jetzt_pause", function () {
    return "ok";
});

//Route::post("")

Route::get("seite1.html", function () {
    return "dynamische routing aus der web.php - ok";
});

use Illuminate\Http\Request;

class TestObject
{
    public $text;
    public $zahl;

    public function __construct($text, $zahl)
    {
        $this->text = $text;
        $this->zahl = $zahl;
    }

    public function getText()
    {
        return $this->text;
    }
}
Route::get("/test_formular", function (Request $request) {
    // var_dump( $request); // geht das
    /*$a=100;

    $to=new TestObject("ein Text",42);
    echo $to->getText();
    dump($to);*/
    dump($request);
    //dd(); // dump and die
    //ddd(); // debug dump and die

    return "get - Formular<br>aufgerufen aus dem Formular";
});


Route::post("/test_formular", function (Request $request) {

    return "post - Formular";
});

/*
https://www.ebay.de/     itm/353622660386         ?_trkparms=amclksrc%3DITM%26aid%3D777008%26algo%3DPERSONAL.TOPIC%26ao%3D1%26asc%3D20230811123857%26meid%3Dbaa97df7d68b421f8c2befc4678dfa3f%26pid%3D101770%26rk%3D1%26rkt%3D1%26itm%3D353622660386%26pmt%3D1%26noa%3D1%26pg%3D4375194%26algv%3DRecentlyViewedItemsV2%26brand%3DNakamichi&_trksid=p4375194.c101770.m4236&_trkparms=parentrq%3Acc345d4718a0aab023678977ffffc968%7Cpageci%3Ad1154f96-5b9a-11ee-b914-d26b4342ebe5%7Ciid%3A1%7Cvlpname%3Avlp_homepage
https://www.ebay.de/     itm/295943684450    ?_trkparms=amclksrc%3DITM%26aid%3D1110013%26algo%3DHOMESPLICE.SIMRXI%26ao%3D1%26asc%3D254927%26meid%3Ded19302c98b34942ad3155bdcae42121%26pid%3D101773%26rk%3D2%26rkt%3D24%26itm%3D295943684450%26pmt%3D1%26noa%3D0%26pg%3D4375194%26algv%3DSimplAMLv5PairwiseWebNoToraCoCoViewsNoHighIdfOrSortByFinalScoreBlender%26brand%3DApple&_trksid=p4375194.c101773.m3021&amdata=cksum%3A295943684450ed19302c98b34942ad3155bdcae42121%7Cenc%3AAQAIAAABIHuU2NWr2iCtJh0k4sTXQGMbASZuGJ1XF3G14rh566Zg4M4WE4Y%252B7EzcE2hqFXf7LL8Gts8CJWDFb71BUAL9tLGB8YRX4TgVrGg%252FC11Myb5kYOs8hoppVQPNsgH1nsfV7f8NiLis2DVOiNqRzOHZU18Tuo%252BOD1FV3nHEbxErdu2DS8ecghPJDLg2TGQGYlkYyR27NeaUZff6Q3%252F0Cf8rjrCQGxnsaZZGjWedzF7noD35VPUR%252BQwA2A84CnZKmMsXp3Hg5Oy%252BALlaIzeqJualjAsY%252F94qXGgWFJz6v2J3zbJTriFu7Pb9%252BjumTAHro111e%252BHNXbwjRAfLh9sgQ0yKBvNm6mrKbClQjNUbSyMSqMzWtQscw0fCoGo0mXR6nbhjVQ%253D%253D%7Campid%3APL_CLK%7Cclp%3A4375194&epid=4037378071&_trkparms=parentrq%3Acc345d4718a0aab023678977ffffc968%7Cpageci%3Ad1154f96-5b9a-11ee-b914-d26b4342ebe5%7Ciid%3A1%7Cvlpname%3Avlp_homepage

    */


// besser in einem Controller    


// Variante 1
/*use App\Http\Controllers\EbayController;
Route::get("/itm/{zahlen}",[EbayController::class,"zeigeEbaySeiteAn"])->name("ebay_rout");

// Variante 2
Route::get("/itm/{zahlen}",[App\Http\Controllers\EbayController::class,"zeigeEbaySeiteAn"])->name("ebay_rout");
*/
// Variante 3
Route::get("/itm/{zahlen}","EbayController@zeigeEbaySeiteAn");

// Closure-Variante
/*Route::get("/itm/{zahlen}", function ($zahlen) {
    echo EbayController::class; // "EbayController"
    // assoziatives array
    $ebayProductSeiten      = array();
    $ebayProductSeiten['1'] = "Buch";
    $ebayProductSeiten['2'] = "Apfel";

    dump($zahlen);
    return $ebayProductSeiten[$zahlen];
});*/

// Query-Parameter
Route::get("/itm", function (Request $request) {
    $queryArray = $request->query(); // ['zahlen'];
    $zahl = $queryArray["zahlen"];
    dump($zahl);

    //dump($_GET);
      
      // assoziatives array
      $ebayProductSeiten = array();
      $ebayProductSeiten['1']="Buch";
      $ebayProductSeiten['2']="Apfel";

  //    dump($zahlen);
      return $ebayProductSeiten[$zahl];
     
});
/*
// https://www.google.de/maps/@{koord}

?
entry=ttu

*/

Route::get("page1/",function(){

})->name("seite1"); // nick name
//Route::get("page2/");
//Route::get("page3/");

/* website */
/*
<a href="route("seite1") ">Seite1</a>
<a href="seite2">Seite2</a>
*/