@extends('meetings.app')

@section('content')
    <h2>Ein neues Meeting eintragen</h2>
    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf
        title<input type="text" name="title"><br>
        description<input type="text" name="description"><br>
        <input type="submit" value="speichern">

    </form>
@endsection
