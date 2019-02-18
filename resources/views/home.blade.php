@extends('layouts.app')

@section('content')

    <messenger-comp 
    :user-id="{{ auth()->id() }}">

@endsection
