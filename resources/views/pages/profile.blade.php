@extends('common.main')

@section('title', 'Profile')

@section('styles')
    <link rel="stylesheet" href=".././css/profile.css" />
@endsection

@section('content')
    <div class="signup-div">
        <div class="top-img">
            <img class="l-first" src={{ asset('./images/signup/path 1.svg') }} />
        </div>
        <div class="l-div l-small">
            <img class="l-first" src={{ asset('./images/profile/Path189.svg') }} />
            <div class="avatar-parent">
                <img class="avatar" src={{ asset('./images/profile/avatar.svg') }} />
                <!--                <img class="small-avatar" src={{ asset('./images/profile/avatar.svg') }} />-->
            </div>
        </div>

        <div class="r-div">
            <div class="form-column">
                <div class="top-img">
                    <img class="l-sec" src={{ asset('./images/profile/avatar.svg') }} />
                </div>

                <form method="POST" action="{{ route('saveUser') }}">
                    @csrf
                    <div class="form-fields">

                        <div class="input">
                            <input type="text" placeholder="Name" name="name" value="{{ $name }}" />
                            <img src={{ asset('./images/signup/pen.svg') }} />
                        </div>
                        @error('name')
                            <span class="err">Please fill this field!</span>
                        @enderror

                        <div class="input">
                            <input type="text" placeholder="Email-id" name="email" value="{{ $email }}"
                                disabled />
                        </div>
                        <div class="input">
                            <input type="tel" placeholder="Mobile-no" name="contact" value="{{ $contact }}" />
                            <img src={{ asset('./images/signup/pen.svg') }} />
                        </div>
                        @error('contact')
                            <span class="err">Please fill this field!</span>
                        @enderror
                        @if (isset($enrollment) && $enrollment != '')
                            <div class="input">
                                <input type="text" placeholder="Enrollment No." name="enrollment"
                                    value="{{ $enrollment }}" disabled />
                            </div>
                        @endif

                        @if (isset($department) && $department != '')
                            <div class="input">
                                <input type="text" placeholder="Department" name="department"
                                    value="{{ $department }}" disabled />
                            </div>
                        @endif

                        <button type="submit" class="primary-color">
                            Save
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
