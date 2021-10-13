{{-- @extends('index')
@section('title',"Login")
@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
@section('title','Log In')

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
        .form-column{
            margin-top: 150px;
        }
        .l-div img.l-sec{
            bottom: -120px !important
        }
        @media (max-width:870px){
            .form-column{
                margin-top: 50px
            }
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
        <img class="l-sec" src="{{'./images/signup/login_man.svg'}}" />
    </div>

    <div class="r-div">
        <img class="r-img" src="{{'./images/signup/signup-right.svg'}}" />
        <div class="form-column">

            <div class="top-img">
                <img id="page_img" class="l-sec" src="{{'./images/signup/register.svg'}}" />
            </div>

            <div class="form-title">
                <b>
                    Log In
                </b>
            </div>
            <form class="form-fields"  method="POST" action="{{ route('login') }}">
                @csrf            


                <div class="input">
                    <img src="{{'./images/signup/email.svg'}}" />
                    <input type="text" placeholder="Email-id"  name="email" value="{{ old('email') }}" required autocomplete="email" />
                </div>
                @error('email')
                <span class="err">{{$message}}</span>
                @enderror
                
                <div class="input">
                    <img src="{{'./images/signup/padlock.svg'}}" />
                    <input type="password" placeholder="Password" name="password" required autocomplete="new-password" />
                </div>
               @error('password')                
                    <span class="err">{{ $message }}</span>
                @enderror
                    

                <button type="submit" class="primary-color">
                    Log In
                </button>
                <div style="margin: 5px 0px 10px 0px">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div> 
                <div>                    
                    You don't have an account?
                    <a href="{{ route('register') }}">Register</a>
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




