{{-- child --}}
@extends('app')

@section('navi')
    Navigation2
@endsection

@section('content')
    <h2>impressum</h2>
    <p>Unsere Firma GmbH</p>
    <p>12345 Augsburg</p>
    @component("components.meldung")
      Wir sind umgezogen!
      @slot("farbe")
      red
      @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        alert('impressum')
    </script>
@endpush
