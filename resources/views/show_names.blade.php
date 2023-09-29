<html>

<head>

</head>

<body>

    <h1>Namen Übung_09</h1>

    <ul>
        <?php
        foreach ($names as $name) {
            echo '<li>' . $name . '</li>';
        }
        ?>
    </ul>

    <h1>Namen Übung 10</h1>

    <ul>
        @foreach ($names as $name)
            @if ($loop->iteration > 5)
            @break;
        @endif
        <li>{{ $name }}</li>
    @endforeach

</ul>

</body>

</html>
