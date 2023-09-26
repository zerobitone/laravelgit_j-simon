<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EbayController extends Controller
{
    //
public function zeigeEbaySeiteAn($zahlen){
    //return "EbayController - zeigeEbaySeiteAn -OK!";
   
  
    // assoziatives array
    $ebayProductSeiten      = array();
    $ebayProductSeiten['1'] = "Buch";
    $ebayProductSeiten['2'] = "Apfel";

    dump($zahlen);
    return $ebayProductSeiten[$zahlen];
}
    
}
