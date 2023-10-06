@extends('meetings.app')

@section('content')

<h2>Ein Meeting - hier die Daten</h2>

<ul>
    <li>{{$meeting->id}}</li>
    <li>{{$meeting->title}}</li>
    <li>{{$meeting->description}}</li>
    <li>{{$meeting->created_at ?: "null"}}</li>
    <li>{{$meeting->updated_at ?: "null"}}</li>
</ul>
<a href="{{route("meetings.index")}}">Zurück zur Übersicht</a>
@endsection