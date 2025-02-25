@extends('layouts.app')

@section('title')
    {{ __('messages.appointments') }}
@endsection

@section('content')
    @include('flash::message')

    
@endsection

@section('scripts')
    <!-- Add any custom scripts here -->
@endsection
