<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>bladeview - Seite</title>
</head>

<body>
    {{-- ein Blade Kommentar, der nicht im HTML-Quelltext auftaucht --}}

    <h2>Willkommen auf der bladeview - Seite!</h2>

    <h5>Daten aus dem Aufruf dieser view:</h5>
    {{-- ein assoziatives Array mit einem Inhaltswert --}}
    {{ $user }} : nur so ist der Output richtig und sicher!
    <br>
    {!! $user !!}
    <br>
    <?= $user ?>
    <br>
    <?php echo $user ?>

</body>

</html>
