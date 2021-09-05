@extends('index')

@section('body')
    @include('common.header')
    <main>
        @yield('content')
    </main>
    @include('common.footer')
@endsection
