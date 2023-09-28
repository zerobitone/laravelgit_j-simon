<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>bladeview - Seite</title>
</head>

<body>

    <h2>Willkommen auf der bladeview - Seite!</h2>

    <h5>Daten aus dem Aufruf dieser view:</h5>
    {{-- ein assoziatives Array mit einem mehrfach Inhaltswert --}}

    {{-- $users-- ein Array funktioniert nicht => Schleife --}}
    <br>

    <!-- als Ersatz für die php-Tags möglich -->
    @php 
    for ($i = 0; $i < count($users); $i++) {
        echo $users[$i]['name'] . ', ';
        echo $users[$i]['email'] . ', '; 
        echo $users[$i]['phone'] . ', '; 
        echo $users[$i]['age'] . ', '; 
    }
   @endphp

    <br>

    <?php
    foreach ($users as $user) {
        echo $user['name'] . ', ';
        echo $user['email'] . ', '; 
        echo $user['phone'] . ', '; 
        echo $user['age'] . ', '; 
    }
    ?>

    <br>

    @for ($i = 0; $i < count($users); $i++)
        {{ $users[$i]['name'] }},
        {{ $users[$i]['email'] }},
        {{ $users[$i]['phone'] }}, 
        {{ $users[$i]['age'] }}, 
    @endfor

    <br>

    @foreach ($users as $user)
        <div style="color:red;">{{ $user['name'] }} </div>,
        {{ $user['email'] }},
        {{ $user['phone'] }}, 
        {{ $user['age'] }}, 
    @endforeach




</body>

</html>
