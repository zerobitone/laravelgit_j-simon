@extends('posts.layout')
 
@section('content')
   <h2>Posts - index</h2>
   <a href="{{ route('posts.create') }}">Neuen Post erstellen</a><br>

   
   <table>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Text</th>
            <th>erstellt_am</th>
            <th>geändert_am</th>
            <th>Interesse_ID</th>
            <th>Interesse_Text</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->text }}</td>
            <td>{{ $post->created_at ?: "nicht angegeben" }}</td>
            <td>{{ $post->updated_at ?: "nicht angegeben"}}</td>
            <td>{{ $post->interest_id }}</td>
            <td>{{ $post->interest_text }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
   
                    <a href="{{ route('posts.show',$post->id) }}">Anzeigen</a>
    
                    <a href="{{ route('posts.edit',$post->id) }}">Editieren</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection