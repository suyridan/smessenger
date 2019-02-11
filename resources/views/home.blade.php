@extends('layouts.app')

@section('content')

<b-container fluid style="height: calc(100vh - 56px)">
    <b-row>
        <b-col cols="4">
            <contact-list-comp></contact-list-comp>

        </b-col>
        <b-col cols="8">
            
            <active-conversation-comp></active-conversation-comp>
            
        <b-col>
    </b-row>
</b-container>

@endsection
