<!-- child view-->
@extends('blade_unterricht.app') {{-- Erweitert die app.blade.php --}}

@section('title', 'Unser Titel der Seite')

@section('header')
    <div style="background-color: aquamarine">
        @parent
        <p>header</p>
    </div>
@endsection

@section('content')
    <div style="background-color: rgb(106, 157, 49)">
        <p>content</p>
    </div>
@endsection

@section('footer')
    <div style="background-color: rgb(174, 147, 244)">
        <p>footer</p>
    </div>
@endsection
