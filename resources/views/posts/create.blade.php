@extends('posts.layout')

@section('content')
    <h2>Neuen Post erstellen</h2>
    <a href="{{ route('posts.index') }}"> Zurück zur Übersicht</a>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <strong>Titel:</strong>
        <input type="text" name="title" placeholder="Titel">

        <strong>Text:</strong>
        <textarea style="height:150px" name="text" placeholder="Text"></textarea>
        
        <button type="submit">Speichern</button>
        </div>
        </div>

    </form>
@endsection
