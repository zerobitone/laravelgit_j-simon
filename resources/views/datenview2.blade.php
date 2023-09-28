<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
     <title>Datenview</title>
</head>
<body>
    <?php 
    
   
dump($vornamen);
    print_r($vornamen);
    
    ?>
<br>
<?php               ?>
@php dump($vornamen) @endphp

<?php
    for($i=0; $i < count($vornamen); $i++)
      echo $vornamen[$i].", ";
?>
<br>
<?php
    foreach( $vornamen as $vorname )    
    echo htmlspecialchars($vorname.", "); // Entity Konvertierung zum Schutz
?>
<br>
@for ($i=0; $i < count($vornamen); $i++)
    {!! $vornamen[$i] !!}, {{-- ohne Schutz --}}
    {{ $vornamen[$i] }}, {{-- mit Entity Konvertierung zum Schutz --}}
@endfor

<br>

@foreach( $vornamen as $vorname )    
    {{$vorname}},
@endforeach 

</body>
</html>