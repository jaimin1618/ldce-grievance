@extends('index')

@section('body')
    @include('common.header')
    @yield('content')
    @include('common.footer')
@endsection
