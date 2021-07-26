@extends('index')
@section('title','Sign Up')

@section('styles')
    <link rel="stylesheet" href=".././css/signup.css" />
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
        <img class="r-img" src="{{'./images/signup/path 2.svg'}}" />
        <div class="form-column">

            <div class="top-img">
                <img class="l-sec" src="{{'./images/signup/register.svg'}}" />
            </div>

            <div class="form-title">
                <b>
                    Sign Up
                </b>
            </div>
            <div class="form-fields">
                <div class="input">
                    <img src="{{'./images/signup/user.svg'}}" />
                    <input type="text" placeholder="Username" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="{{'./images/signup/pen.svg'}}" />
                    <input type="text" placeholder="Enrollment No." />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="{{'./images/signup/email.svg'}}" />
                    <input type="text" placeholder="Email-id" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="{{'./images/signup/phone-call.svg'}}" />
                    <input type="tel" placeholder="Mobile-no" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="{{'./images/signup/padlock.svg'}}" />
                    <input type="password" placeholder="Password" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="{{'./images/signup/confirm.svg'}}" />
                    <input type="password" placeholder="Confirm Password" />
                </div>
                <span class="err">Please fill this field!</span>
                <span class="err">Password and confirm password should be same</span>

                <button>
                    Sign Up
                </button>
                <div>
                    Already have an account?
                    <a href="">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src=""></script>
@endsection
