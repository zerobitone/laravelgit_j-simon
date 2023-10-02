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
        foreach($interests as $interest)
            var_dump($interest);

   
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
            dump($sql);
        });

        DB::insert('insert into interests (id, text) values (:id, :text)', ['id' => $id, 'text' => $text]);
    }

    public function delete($id)
    {
        DB::listen(function ($sql) {
            dump($sql);
        });
        $removed = DB::delete('DELETE FROM interests where id = ?', [$id]);
        return dd($removed);
    }
}