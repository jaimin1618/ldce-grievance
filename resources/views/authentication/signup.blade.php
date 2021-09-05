@extends('index')
@section('title','Sign Up')

@section('styles')

    <link rel="stylesheet" href=".././css/signup.css" />
    <style>
        body{
            overflow-y:scroll 
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
            <form class="form-fields">
                <div class="input">
                    <img src="{{'./images/signup/user.svg'}}" />
                    <input type="text" placeholder="Username" />
                </div>
                <span class="err">Please fill this field!</span>
                <div class="input">
                    <img src="{{'./images/signup/pen.svg'}}" />
                    <input type="number" placeholder="Enrollment No." />
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

                <button class="primary-color">
                    Sign Up
                </button>
                <div>
                    Already have an account?
                    <a href="">Login</a>
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
