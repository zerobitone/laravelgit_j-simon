<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( ):string
    {
        echo "hallo";
        // zeige alle Meetings an
        // select - sql => alle meetings abholen
        
        //return view("uebersicht_alle",$meetings);
        return "index - MeetingController";
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response("create - MeetingController");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // depedency injection - di
    // injiziert eine Abhängigkeit
    // wir wollen die im Browser in der ANfrage mitgebrachten Daten verarbeiten!
    public function store(Request $request)
    {
        //
        return "store - MeetingController";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        // zeige ein Meetings an
        // select .. where id=$id- sql => alle meetings abholen
        return "show ". $id. " - MeetingController";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return "edit ". $id. " - MeetingController";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //$request = new Request("allen Daten des qeuest")
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return "destroy ". $id. " - MeetingController";
    }
}
