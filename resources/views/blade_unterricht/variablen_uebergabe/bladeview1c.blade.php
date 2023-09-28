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

    <?php
    for ($i = 0; $i < count($users); $i++) {
        echo $users[$i] . ', ';
    }
    ?>

    <br>

    <?php
    foreach ($users as $user) {
        echo $user . ', ';
    }
    ?>

    <br>

    @for ($i = 0; $i < count($users); $i++)
        {{ $users[$i] }},
    @endfor

    <br>

    @foreach ($users as $user)
        {{ $user }},
    @endforeach




</body>

</html>
