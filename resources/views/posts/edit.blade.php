@extends('posts.layout')

@section('content')
    <h2>Post bearbeiten</h2>
    
    <a href="{{ route('posts.index') }}"> Zurück zur Übersicht</a>

    <form action="{{ route('posts.update',$posts[0]->id) }}" method="POST">
        @csrf
        @method('PUT')

        <strong>Titel:</strong>
        <input type="text" value="{{ $posts[0]->title }}" name="title" placeholder="Titel">

        <strong>Text:</strong>
        <textarea style="height:150px" name="text" placeholder="Text">{{ $posts[0]->text }}</textarea>
        
        <button type="submit">Speichern</button>
        </div>
        </div>

    </form>
@endsection
