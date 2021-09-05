{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('index')
@section('title','Reset Password link')

@section('styles')

    <link rel="stylesheet" href={{asset("css/signup.css")}} />
    <style>
        body{
            overflow-y:scroll ;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1
        }
        .form-column{
            margin-top: 250px;
        }
        .l-div img.l-sec{
            bottom: 0px !important
        }
        @media (max-width:870px){
            .form-column{
                margin-top: 100px
            }
        }
    </style>
@endsection

@section('body')
   <div class="signup-div">
       <div class="top-img">
            <img class="l-first" src="{{asset('./images/signup/path 1.svg')}}" />
       </div>
    <div class="l-div l-small">
        <img class="l-first" src="{{asset('./images/signup/signup-left.svg')}}" />
        <img class="l-sec" src="{{asset('./images/signup/reset_password.svg')}}" />
    </div>

    <div class="r-div">
        <img class="r-img" src="{{asset('./images/signup/signup-right.svg')}}" />
        <div class="form-column">

            <div class="top-img">
                <img id="page_img" class="l-sec" src="{{asset('./images/signup/reset_password.svg')}}" />
            </div>

            <div class="form-title">
                <b>
                    {{ __('Reset Password') }}
                </b>
            </div>
            <form class="form-fields" method="POST" action="{{ route('password.email') }}">
                @csrf            


                <div class="input">
                    <img src="{{asset('./images/signup/email.svg')}}" />
                    <input type="text" placeholder="Email-id"  name="email" value="{{ old('email') }}" required autocomplete="email" />
                </div>
                @error('email')
                <span class="err">{{$message}}</span>
                @enderror
                
                
                    

                <button type="submit" class="primary-color">
                    {{ __('Send Password Reset Link') }}
                </button>   
                
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script >
        $(window).on('scroll',()=>{
            console.log
            if(window.scrollY>100){
                $("#page_img").css("opacity",0)
            }else if(window.scrollY>90){
                $("#page_img").css("opacity",0.1)
            }else if(window.scrollY>80){
                $("#page_img").css("opacity",0.2)
            }else if(window.scrollY>70){
                $("#page_img").css("opacity",0.3)
            }else if(window.scrollY>60){
                $("#page_img").css("opacity",0.4)
            }else if(window.scrollY>50){
                $("#page_img").css("opacity",0.5)
            }else if(window.scrollY>40){
                $("#page_img").css("opacity",0.6)
            }else if(window.scrollY>30){
                $("#page_img").css("opacity",0.7)
            }else if(window.scrollY>20){
                $("#page_img").css("opacity",0.8)
            }else if(window.scrollY>10){
                $("#page_img").css("opacity",0.9)
            }else{
                $("#page_img").css("opacity",1)
            }
        })
    </script>
@endsection





