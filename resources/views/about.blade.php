<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OurMainApp - About</title>
</head>
<body>
    <h1>THis is About page.</h1>
    <a href="/">Go to Home</a>
    <h3>List of Animals</h3>
    <ul>
        @foreach ($animals as $animal)
            <li>{{$animal}}</li>
        @endforeach
    </ul>
</body>
</html>