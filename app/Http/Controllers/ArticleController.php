<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ooh , ein simpler neuer Controller ;-)

class ArticleController extends Controller
{
    //
    public function create()
    {
        // uebung_25
        return view('article');
    }

    public function store(Request $request)
    {
        // uebung_25

        /* // simple Variante, hier deaktiviert
         $request->validate(
         [
            'title' => 'required',
            'text' => 'required'

        ]
        
        ); */

        // komplexere Variante, hier aktiv!
        $request->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strpos($value, 'Laravel') === false) {
                        $fail($attribute . ' enthält nicht den Text Laravel');
                    }
                }
            ],
            'text' => 'required'
        ]);

        \App\Models\Article::create($request->all());



        $articles = \App\Models\Article::get();
        dump($articles);
        foreach ($articles as $article)
            echo $article->id . " -- " . $article->title . " -- ". $article->text. "<br>";

        return "success - alles OK!";
    }




}