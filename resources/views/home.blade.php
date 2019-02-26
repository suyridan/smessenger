@extends('layouts.app')

@section('content')

    <messenger-comp 
    :user="{{ auth()->user() }}">

@endsection
