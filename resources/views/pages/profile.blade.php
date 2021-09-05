@extends('common.main')

@section('title',"Profile")

@section('styles')
    <link rel="stylesheet" href=".././css/profile.css" />
@endsection

@section('content')
    <div class="signup-div">
        <div class="top-img">
            <img class="l-first" src="{{'./images/signup/path 1.svg'}}" />
        </div>
        <div class="l-div l-small">
            <img class="l-first" src="{{'./images/profile/Path189.svg'}}" />
            <div class="avatar-parent">
                <img class="avatar" src="{{'./images/profile/avatar.svg'}}" />
<!--                <img class="small-avatar" src="{{'./images/profile/avatar.svg'}}" />-->
            </div>
        </div>

        <div class="r-div">
            <div class="form-column">
                <div class="top-img">
                    <img class="l-sec" src="{{'./images/profile/avatar.svg'}}" />
                </div>

                <form method="POST" action="{{ route('saveUser') }}">
                    @csrf
                <div class="form-fields">

                    <div class="input">
                        <input type="text" placeholder="Name" name="name" value="{{$name}}" />
                    </div>

                    <div class="input">
                        <input type="text" placeholder="Email-id" name="email" value="{{$email}}"/>
                        <img src="{{'./images/signup/pen.svg'}}" />
                    </div>
                    @error('email')
                        <span class="err">Please fill this field!</span>
                    @enderror
                    <div class="input">
                        <input type="tel" placeholder="Mobile-no" name="contact" value="{{$contact}}"/>
                        <img src="{{'./images/signup/pen.svg'}}" />
                    </div>
                    @error('contact')
                        <span class="err">Please fill this field!</span>
                    @enderror
                    <div class="input">
                        <input type="text" placeholder="Enrollment No." name="enrollment" value="{{$enrollment}}"/>
                    </div>


                    <div class="input">
                        <input type="text" placeholder="Department" name="department" value="{{$department}}"/>
                    </div>

                    <div class="input">

                        <input type="text" placeholder="Institute" name="institute" value="{{$institute}}"/>
                    </div>

                    <button type="submit" class="primary-color">
                        Save
                    </button>

                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

