@extends('index')
@section('title','Sign Up')
    
@section('styles')
    <link rel="stylesheet" href=".././css/signup.css" />
@endsection

@section('body')
   <div class="signup-div">
    <div class="l-div l-small">
        <img class="l-first" src="assets{{'signup/signup-left.svg'}}" />
        <img class="l-sec" src="./images/register.svg" />
    </div>
    <div class="top-img">
        <img src="./images/Path 2.svg" />
    </div>
    <div class="r-div">
        <img class="r-img" src=" assets{{'signup/path 2.svg'}}" />
        <div class="form-column">

            <div class="form-title">
                <b>
                    Sign Up
                </b>
            </div>
            <div class="form-fields">
                <div class="input">
                    <img src="assets{{'signup/user.svg'}}" />
                    <input type="text" placeholder="Username" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="assets{{'signup/pen.svg'}}" />
                    <input type="text" placeholder="Enrollment No." />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="assets{{'signup/email.svg'}}email.svg" />
                    <input type="text" placeholder="Email-id" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="assets{{'signup/phone-call.svg'}}" />
                    <input type="number" placeholder="Mobile-no" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="assets{{'signup/padlock.svg'}}padlock.svg" />
                    <input type="password" placeholder="Password" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="assets{{'signup/confirm.svg'}}" />
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
