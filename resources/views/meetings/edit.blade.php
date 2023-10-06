@extends('meetings.app')

@section('content')
    <h2>Meeting bearbeiten</h2>

    {{-- <form action="{{ route('meetings.update',compact('meeting')) }}" method="POST"> --}}
    <form action="{{ route('meetings.update', [$meeting->id]) }}" method="POST">
        @csrf
        @method('PUT')
        title<input type="text" name="title" value="{{ $meeting->title }}"><br>
        description<input type="text" name="description" value="{{ $meeting->description }}"><br>
        <input type="submit" value="updaten">

        @if ($errors->any())
            <div >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
