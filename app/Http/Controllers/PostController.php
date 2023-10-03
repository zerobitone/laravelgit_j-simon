<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ooh ein neuer Controller ;-)

use \Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // RAW - SQL
        $posts = DB::select("SELECT * FROM posts");
    
        return response()->view('posts.index',compact('posts'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       /* $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/
    
        DB::insert("insert into posts (title,text,created_At,updated_at) VALUES (?,?,?,?)",[$request->title,$request->text,now(),now()]);
     
        return redirect()->route('posts.index');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $posts = DB::select("SELECT * FROM posts WHERE id=:id",['id' => $id]);
    
        return response()->view('posts.show',compact('posts'));
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
        $posts = DB::select("SELECT * FROM posts WHERE id=?",[$id]);
       
        return view('posts.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo $request->title, $request->text, $id;
        
        DB::update("UPDATE posts SET title=?, text=?, updated_at=NOW() WHERE id = ?",
        [$request->title,$request->text,$id]);

        return redirect()->route('posts.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removed=DB::delete("DELETE FROM posts WHERE id = ?", [$id]);
        echo "removed: ".($removed?"ja":"nein");
        return "<br>Der Datensatz wurde versucht zu löschen!<br><a href='/posts'>Zurück zur Übersicht</a>";
    }
}
