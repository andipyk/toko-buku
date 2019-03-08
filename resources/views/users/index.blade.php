@extends('layouts.global')

@section('title')
    User List
@endsection

@section('content')
    Daftar user di sini 
    <br>
    
    @foreach ($users as $user)
        - {{ $user->email }} <br>
    @endforeach
@endsection