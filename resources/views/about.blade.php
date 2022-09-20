<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ url('contact') }}">Contact</a>
    <a href="{{ url('/') }}">Home</a>
    <h2>Hello World</h2>
    @foreach ($arr as $a)
        <p>{{ $idx[$loop->index] }}{{ ' '.$a }}</p>
    @endforeach
</body>
</html>