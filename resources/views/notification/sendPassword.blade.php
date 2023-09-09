<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    
    <h1>{{$mailData["email"]}}</h1>
<h1>{{$mailData["password"]}}</h1>
<button class="btn btn-info " style="background-color: rgb(0, 136, 255)"><a href="{{route("login")}}" style="text-decoration: none">log in</a></button >
<p>hello world</p>
</body>
</html>