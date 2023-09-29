{{-- child --}}
@extends('app')

@section('navi')
    @parent
    Navigation1
@endsection

@section('content')
    @parent
    <h2>home</h2>
    @component("components.meldung")
      Guten Tag, herzlich Willkommen
      @slot("farbe")
      green
      @endslot
    @endcomponent
@endsection

@push('scripts')
        <script>alert('home')</script>
@endpush

@push('scripts')
        <script>alert('home2')</script>
@endpush

@prepend('scripts')
        <script>alert('master')</script>
@endprepend