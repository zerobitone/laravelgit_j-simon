@if ($errors->any())

@foreach($errors->all() as $error)

{{$error}}

@endforeach

@endif

<form action="{{ route('article.store')}}" method="POST">
    @csrf 

    <input name="title" placeholder="Titel des Artikels" required >
    <input name="text" placeholder="Text für den Artikel" required >
    <input type="submit">

</form>