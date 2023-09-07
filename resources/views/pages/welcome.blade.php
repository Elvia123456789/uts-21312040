@extends('layout.master')
@section('judul')
Welcome
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>SELAMAT DATANG {{$firstName}} {{$lastName}}</h1>
    <h5>Terima kasih telah bergabung di Website kami. Media Belajar kita bersama !</h5>
</body>
</html>
@endsection