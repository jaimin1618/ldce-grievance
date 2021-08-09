@extends('common.main')

@section('title',"Profile")

@push('styles')
    <link rel="stylesheet" href=".././css/profile.css" />
@endpush

@section('content')
    <div class="signup-div">
        <div class="top-img">
            <img class="l-first" src="{{'./images/signup/path 1.svg'}}" />
        </div>
        <div class="l-div l-small">
            <img class="l-first" src="{{'./images/profile/Path189.svg'}}" />
            <div class="avatar-parent">
                <img class="avatar" src="{{'./images/profile/avatar.svg'}}" />
                <img class="small-avatar" src="{{'./images/profile/avatar.svg'}}" />
            </div>
        </div>

        <div class="r-div">
            <div class="form-column">
                <div class="top-img">
                    <img class="l-sec" src="{{'./images/profile/avatar.svg'}}" />
                </div>

                <div class="form-fields">
                    <div class="input">
                        <input type="text" placeholder="Name" />
                    </div>

                    <div class="input">
                        <input type="text" placeholder="Email-id" />
                        <img src="{{'./images/signup/pen.svg'}}" />
                    </div>
                    <span class="err">Please fill this field!</span>
                    <div class="input">
                        <input type="tel" placeholder="Mobile-no" />
                        <img src="{{'./images/signup/pen.svg'}}" />
                    </div>
                    <span class="err">Please fill this field!</span>
                    <div class="input">
                        <input type="text" placeholder="Enrollment No." />
                    </div>


                    <div class="input">
                        <input type="text" placeholder="Department" />
                    </div>

                    <div class="input">

                        <input type="text" placeholder="Institute" />
                    </div>

                    <button>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

