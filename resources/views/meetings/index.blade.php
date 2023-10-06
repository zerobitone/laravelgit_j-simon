@extends('meetings.app')

@section('content')
    <a href="/meetings/create">Ein neues Meeting anlegen</a>
    <h2>Liste aller Meetings</h2>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Bearbeiten</th>
            <th>Anzeigen</th>
            <th>Löschen</th>
        </tr>

        @foreach ($meetings as $meeting)
            <tr>
                <td>{{ $meeting->id }}</td>
                <td>{{ $meeting->title }}</td>
                <td>{{ $meeting->description }}</td>
                <td>{{ $meeting->created_at }}</td>
                <td>{{ $meeting->updated_at }}</td>
                <td>
                    <form action="{{ route('meetings.edit', [$meeting->id]) }}" method="GET">
                        @csrf
                        <input type="submit" value="Bearbeiten">
                    </form>
                </td>

                <td>
                    <form action="{{ route('meetings.destroy', compact('meeting')) }}" method="GET">
                    {{-- <form action="{{ route('meetings.destroy',[$meeting->id]) }}" method="GET"> --}}
                        @csrf
                        <input type="submit" value="Anzeigen">
                    </form>

                </td>
                <td>
                    <form action="{{   route('meetings.destroy', [$meeting->id] )    }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Löschen">
                    </form>

                </td>
                
            </tr>
        @endforeach
    </table>
@endsection
