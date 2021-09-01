@extends('common.main')

@section('title',"Home")
@section('styles')
    <link rel="stylesheet" href="" />
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{Auth::user()->name}}
    <h1>home page</h1>
    <h1>{{Auth::user()->role}}</h1>
    {{-- <img src="{{ asset(Auth::user()->profile_pic) }}" alt=""> --}}
    {{-- <img src="{{ asset('public/images/grievanceimages/Web 1920 – 11626616031.png') }}" alt="ss"> --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>
    <form action="{{ route('updateStatus') }}" method="POST">
        @csrf
        <input type="number" placeholder="id" name="complain_id">
        <input name="message" placeholder="message" />
        @error('message')
            {{$message}}
        @enderror
        <input type="number" name="status" placeholder="status" id="">
        {{-- <input type="file" name="grievanceimg" id=""> --}}
        <button>submit</button>
    </form>
    <button id="req">send </button>
    <script>
        $("#req").click(()=>{
            $.ajax({
                url:"{{ route('getData') }}",
                method:"post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    'sort_by':'desc'
                },
                success:()=>{
                    alert("aosnjsd");
                }
            })
        })
    </script>
    
@endsection
@section('scripts')
    <script src="">
        
    </script>
@endsection