<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InterestController extends Controller
{
    // uebung_17
    public function index()
    {
        echo "index";


        $interests = DB::select('select * from interests ');
        dump($interests);
        foreach ($interests as $interest)
            var_dump($interest);
        echo "<br><br>Ausgabe der kompletten Tabelle<br>"; // Ausgabe aller Felder
        foreach ($interests as $interest)
            echo $interest->id . ", " . $interest->text . ", " . ($interest->created_at ?: "null") . ", " . ($interest->updated_at ?: "null") . "<br>";
        /*
        dump(DB::table('interests')->dump());
        //dump(DB::table('interests')->dd());
        //dump(DB::table('interests')->toSql());
        $interests = DB::table('interests');
        dump($interests);
        */
        /*$interests->insert(
            ['text' => 'test']
        );
        $interests->get();
        dump($interests->get());*/
    }

    public function create($id, $text)
    {
        DB::listen(function ($sql) {
            dump($sql); // alle SQL Befehle mitprotokollieren
        });

        try {
            DB::insert('insert into interests (id, text) values (:id, :text)', ['id' => $id, 'text' => $text]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return "Ein Fehler ist aufgetreten: ".$ex->getMessage();
            
        }
        return "Ein Interesse wurde eingefügt, bitte die Übersicht aufrufen zur Kontrolle";
    }

    public function delete($id)
    {
        DB::listen(function ($sql) {
            dump($sql); // alle SQL Befehle mitprotokollieren
        });

        $removed = DB::delete('DELETE FROM interests where id = ?', [$id]);
        echo "removed: ".($removed?"ja":"nein");
        return "<br>Der Datensatz wurde versucht zu löschen!";
    }
}