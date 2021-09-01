@extends('common.main')

@section('title',"Dashboard")
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />     --}}

    
@endsection

@section('content')
<h1>user works</h1>

@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
@endsection