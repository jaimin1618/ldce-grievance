@extends('common.main')

@section('title',"Home")
@section('styles')
    <link rel="stylesheet" href="" />
@endsection

@section('content')
{{Auth::user()->name}}
    <h1>home page</h1>
    <img src="{{ asset(Auth::user()->profile_pic) }}" alt="">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>
    
@endsection
@section('scripts')
    <script src=""></script>
@endsection