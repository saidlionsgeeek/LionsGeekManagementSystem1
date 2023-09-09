<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <h1>{{ $mailData1['email'] }}</h1>
    <h1>{{ $mailData1['password'] }}</h1>
    <p>hello world</p>
</body>

</html>

