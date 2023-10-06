<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use app\Http\Requests\FormValidationRequest;
use Illuminate\Support\Collection;

class MeetingController extends Controller
{
    /**
     * Display a listing of the meeting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // alle Meetings aus der Database anzeigen
        // einmalige Vorarbeiten:
        // Migrations-Datei mit artisan erstellen, gewünschte Tabellenfelder einfügen und migrieren
        // ein Model Meeting erstellen

        //  jetzt mit Eloquent alle Meeting Models einlesen (alle Datensätze)
        $meetings = Meeting::all();

        // View mit paren-layout einmalig vorbereiten und die index-blade bekommt inhalt
        return response()->view('meetings.index',compact('meetings'));
    }

    /**
     * Show the form for creating a new meeting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('meetings.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // depedency injection - di
    // injiziert eine Abhängigkeit
    // wir wollen die im Browser in der Anfrage mitgebrachten Daten verarbeiten!
    public function store(FormValidationRequest $request) 
    {
        

        //dump($request->all());
        $formularDaten = $request->all();

        $meeting = new Meeting; // neue Meeting Instanz anlegen
        $meeting->title = $formularDaten['title']; 
        $meeting->description = $formularDaten['description']; 
        $meeting->save(); // in Datenbank speichern - insert into

        return redirect()->route("meetings.index"); // zurück zur index-Seite
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        // zeige ein Meetings an
        $meeting = Meeting::find($id); // Meeting Model (Instanz) aus der Datenbank lesen
        return response()->view('meetings.show',compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meeting = Meeting::find($id); // Model aus DB lesen
        
        return response()->view('meetings.edit',compact('meeting')); // zur edit-view mit den Daten des Meetings
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //$request = new Request("allen Daten aus dem request")
    public function update(FormValidationRequest $request,$id)
    {
        // alternative ist eine Klasse die artisan gebaut
        /*$request->validate([
            'title' => 'required|max:255',
            'description' => ['required', 'max:255'],
        ]);*/

        // alternative
        Meeting::find($id)->update($request->all()); // $fillable !

        // alternative
    //    $meeting = Meeting::find($id);
    //    $meeting->title=$request->title;
    //    $meeting->description=$request->description;
    //    $meeting->save(); // update - ändern in der Datenbank
       
       
        return redirect()->route("meetings.index"); // zurück zur index-Seite
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = Meeting::find($id);
        $meeting->delete();
        return redirect()->route("meetings.index");
    }



    // aus der alten Übung, damit diese noch funktioniert!
    public function updateFormular(Request $request, $id)
    {
        
        //
        dump($request->path());
        dump($request->url());
        dump($request->method()); // GET / POST / PUT

        // ab hier kann der Request des Client(Browser,Postman, Bot,..)
        // untersucht werden, in der Variable $request sind alle Formular get und post -daten drin
        dump($request);
       
        echo "input() alle get und post - felder";
        dump($request->input()); // alle get und post - felder

        echo "all() alle get und post - felder und files!";
        dump($request->all()); // alle get und post - felder
        
        echo "nur titel und zusatzinfo";
        dump($request->only("titel","zusatzinfo")); // nur titel und zusatzinfo

        echo "alle ausser _method";
        dump($request->except("_method")); // alle ausser _method

        echo "nur die post - felder";
        dump($request->post()); // nur die post - felder
        
        echo "nur die get - felder";
        dump($request->query()); // nur die get - felder

        //$alleFomularWerte=$_REQUEST; // klassich ueber die super globals
        
        // ist ist ein Feld vorhanden?
        echo "Gibt es das Feld vorname, mit der has()-Methode: ".$request->has("vorname")."<br>";
        echo "Gibt es das Feld titel, mit der has()-Methode: ".$request->has("titel")."<br>";
        
        // fehlt der Inhalt eines Feld?
        echo "filled zusatzinfo".($request->filled("zusatzinfo") ? " ja ": " nein ") ."<br>";
        echo "filled titel".$request->filled("titel")."<br>";
        
        // missing
        echo "Gibt es das Feld vorname nicht, mit der missing()-Methode: ".$request->missing("vorname")."<br>";
        echo "Gibt es das Feld titel nicht, mit der missing()-Methode: ".$request->missing("titel")."<br>";

        /*  
        $alleFomularWerte=$request->input();
        $titel=$alleFomularWerte['titel'];
        $uhrzeit=$alleFomularWerte['uhrzeit'];

        return "update ". $id. " - MeetingController Der Titel ist:".$titel;
        */

        // direkt , ohne Methode, als injizierte Attribute
        $titel=$request->titel;
        $uhrzeit=$request->uhrzeit;

        return "update ". $id. " - MeetingController Das Meeting heisst :".$titel." Die Uhrzeit ist:".$uhrzeit;
    }
}


