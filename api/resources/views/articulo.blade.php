<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <meta property="og:title" content="EnBreve" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="enbreve.info" />
    <meta property="og:url" content="http://enbreve.info" />
    <meta property="og:description" content="Medio de comunicación en línea con información social y cultural de Xalapa, artículos de interés general y cartelera de eventos." />
    <meta property="og:image" content="http://enbreve.info/img/logo.png" />
    <title>EnBreve</title>
</head>
<body>
    <div id="app">
        <interior id="{{$id}}" tipo-item="{{$tipoItem}}"/>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>