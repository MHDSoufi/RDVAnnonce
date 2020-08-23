@extends('home')
@section('message')
@include('message.users', ['users' => $users])

@stop