<?php
// diese Datei wurden mit:
// php artisan make:Controller TestController erstellt

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // uebung_04

    // diese Methode muss von Hand gecodet werden, Teil der eigentlichen Aufgabe
    public function printMessage()
    {
        return "Hallo Welt, wie geht es Dir? Diesmal aus dem TestController ;-)";
    }

     // uebung_05
  
  public function showName($name,$nachname) {
    return "Der übergebene Name lautet: ".$name." ".$nachname;
}

public function showUserName($username="na schaun mar mal") {
    return "Der username lautet: ".$username;
}
}