@extends('layout.layout')
@section('content')
<h4>Selamat datang {{ session('user')->nama }} anda login sebagai {{ session('user')->peran }}</h4>
@endsection
