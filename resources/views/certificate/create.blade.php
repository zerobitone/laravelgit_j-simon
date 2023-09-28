<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zertikat erzeugen</title>
</head>

<body>
    <nav>
        <a href="<?php echo route('index'); ?>">zurück zur Übersicht der Zertifkate</a>
        <a href="{{ route('index') }}">zurück zur Übersicht der Zertifkate</a>
    </nav>

    <h1>Zertifikat erstellen</h1>

    <?php $number = 10; ?>

    @if ($number === 1)
        Die Nummer ist eins.
    @elseif($number > 1)
        Die Nummer ist größer als eins.
    @else
        Die Nummer ist kleiner eins.
    @endif
    <br>
    <?php
    if ($number === 1) {
        echo 'Die Nummer ist eins.';
    } elseif ($number > 1) {
        echo 'Die Nummer ist größer als eins.';
    } else {
        echo 'Die Nummer ist kleiner eins.';
    }
    
    ?>
    <br>
    <?php if ($number === 1) { ?>
    Die Nummer ist eins.
    <?php   } elseif ($number > 1) { ?>
    Die Nummer ist größer als eins.
    <?php  } else { ?>
    Die Nummer ist kleiner eins.
    <?php  } ?>

    <br>

    @php
        $users = ['Jens', 'Tim'];
    @endphp
    @foreach ($users as $user)
        Insgesamt gibt es {{ $loop->count }} User<br>
        {{ $user }}<br>
    @endforeach
<!-- ein Quelltext - Kommentar -->
{{-- ein zweiter Quelltext - Kommentar --}}

</body>

</html>
