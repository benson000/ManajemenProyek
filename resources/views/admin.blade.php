<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Dashboard</h1>
@stop

@section('content')

    <p>Welcome admin!.</p>

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script> console.log('Hi!'); </script>
@stop
</body>
</html>