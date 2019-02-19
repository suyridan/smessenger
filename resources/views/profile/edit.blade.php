@extends('layouts.app')

@section('content')

    <profile-edit-comp 
        :user="{{ auth()->user() }}"
        csrf-token="{{ csrf_token() }}"
    /> 

@endsection
