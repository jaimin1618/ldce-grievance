{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enrollment" class="col-md-4 col-form-label text-md-right">{{ __('enrollment') }}</label>

                            <div class="col-md-6">
                                <input id="enrollment" type="enrollment" class="form-control @error('enrollment') is-invalid @enderror" name="enrollment" required autocomplete="new-enrollment">

                                @error('enrollment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="contact" class="form-control @error('contact') is-invalid @enderror" name="contact" required autocomplete="new-contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
@section('title','Sign Up')

@section('styles')

    <link rel="stylesheet" href=".././css/signup.css" />
    <style>
        body{
            overflow-y:scroll ;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1
        }
    </style>
@endsection

@section('body')
   <div class="signup-div">
       <div class="top-img">
            <img class="l-first" src="{{'./images/signup/path 1.svg'}}" />
       </div>
    <div class="l-div l-small">
        <img class="l-first" src="{{'./images/signup/signup-left.svg'}}" />
        <img class="l-sec" src="{{'./images/signup/register.svg'}}" />
    </div>

    <div class="r-div">
        <img class="r-img" src="{{'./images/signup/signup-right.svg'}}" />
        <div class="form-column">

            <div class="top-img">
                <img id="page_img" class="l-sec" src="{{'./images/signup/register.svg'}}" />
            </div>

            <div class="form-title">
                <b>
                    Sign Up
                </b>
            </div>
            <form class="form-fields"  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input">
                    <img src="{{'./images/signup/user.svg'}}" />
                    <input type="text" placeholder="Name" value="{{ old('name') }}" name="name" required autocomplete="name" autofocus  />
                </div>
                @error('name')                
                    <span class="err">{{ $message }}</span>
                @enderror


                <div class="input">
                    <img src="{{'./images/signup/email.svg'}}" />
                    <input type="text" placeholder="Email-id"  name="email" value="{{ old('email') }}" required autocomplete="email" />
                </div>
                @error('email')
                <span class="err">{{$message}}</span>
                @enderror
                



                <div class="input">
                    <img src="{{'./images/signup/pen.svg'}}" />
                    <input type="number" placeholder="Enrollment No." name="enrollment" required autocomplete="new-enrollment"/>
                </div>
               @error('enrollment')                
                    <span class="err">{{ $message }}</span>
                @enderror


                
                
                <div class="input">
                    <img src="{{'./images/signup/phone-call.svg'}}" />
                    <input type="tel" placeholder="Mobile-no"  name="contact" required autocomplete="new-contact" />
                </div>
               @error('contact')                
                    <span class="err">{{ $message }}</span>
                @enderror


                <div class="input">
                    <img src="{{'./images/signup/padlock.svg'}}" />
                    <input type="password" placeholder="Password" name="password" required autocomplete="new-password" />
                </div>
               @error('password')                
                    <span class="err">{{ $message }}</span>
                @enderror


                <div class="input">
                    <img src="{{'./images/signup/confirm.svg'}}" />
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                              

                <button type="submit" class="primary-color">
                    Sign Up
                </button>
                <div>
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </div>
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




