@extends('posts.layout')

@section('content')
    <h2>Post - Ansicht</h2>
    <a href="{{ route('posts.index') }}"> Zurück zur Übersicht</a>

    <ul>
        <li>
            {{ $posts[0]->id }}
        </li>

        <li>
            {{ $posts[0]->title }}
        </li>

        <li>
            {{ $posts[0]->text }}
        </li>

        <li>
            {{ $posts[0]->created_at }}
        </li>

        <li>
            {{ $posts[0]->updated_at }}
        </li>
    </ul>
@endsection
