<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta property="og:title" content="{{$item->titulo}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="enbreve.info" />
    <meta property="og:url" content="http://enbreve.info/{{$tipoItem}}/{{$item->titulo}}" />
    <meta property="og:description" content="{{$item->resumen}}" />
    <meta property="og:image" content="{{$imagen}}" />
    <title>EnBreve</title>
</head>
<body>
    <div id="app">
        <interior id="{{$item->id}}" tipo-item="{{$tipoItem}}"/>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>