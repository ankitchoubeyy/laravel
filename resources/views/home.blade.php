<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Main App</title>
</head>
<body>
    <h1>Home page</h1>
    <h2>Your name: {{$name}}</h2>
    <p>The current year is: {{date('Y')}}</p>
    <a href="/about">Go to About</a>
</body>
</html>