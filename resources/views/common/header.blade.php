<header>
    <div class="header">
        <nav id="left-nav">
            <ul>
                @if(!Auth::user())
                    <li>
                        <a href="{{ route('H') }}" class="{{Route::currentRouteName()=='home' || Route::currentRouteName()=='H'?'active':''}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="icons8-home" width="20" height="20" viewBox="0 0 30.691 26.506">
                                    <defs>
                                      <style>
                                        .cls-1 {
                                          fill: #fff;
                                        }
                                      </style>
                                    </defs>
                                    <path id="icons8-home-2" data-name="icons8-home" class="cls-1" d="M16.346,2a1.4,1.4,0,0,0-.992.414L1.283,14.692A.7.7,0,0,0,1.7,15.951H5.185V27.111a1.4,1.4,0,0,0,1.4,1.4h5.58a1.4,1.4,0,0,0,1.4-1.4v-8.37h5.58v8.37a1.4,1.4,0,0,0,1.4,1.4h5.58a1.4,1.4,0,0,0,1.4-1.4V15.951h3.488a.7.7,0,0,0,.414-1.259L17.346,2.422l-.008-.008A1.4,1.4,0,0,0,16.346,2Z" transform="translate(-1 -2)"/>
                                </svg>
                            </span>
                            <span>Home</span>
                        </a>
                    </li>            
                @else
                    <li>
                        <a href="{{ route('dashboard') }}" class="{{Route::currentRouteName()=='dashboard'?'active':''}}">
                            <span>
                                
                                <svg  width="20" height="20" viewBox="0 0 512 512"  >
                                    <path d="M176,448H80V256h96V448z M304,160h-96v288h96V160z M432,64h-96v384h96V64z M512,0v512H0V0H512z M480,32H32v56h288v16H32v48  h160v16H32v48h160v16H32v48h32v16H32v48h32v16H32v48h32v16H32v56h448v-56h-32v-16h32v-48h-32v-16h32v-48h-32v-16h32v-48h-32v-16h32  v-48h-32v-16h32v-48h-32V88h32V32z" fill="white"/>
                                </svg>
                            </span>
                            <span >Dashboard</span>
                        </a>
                    </li>
                @endif
                
                @if(Auth::user() && Auth::user()->role == config("constants.STUDENT_ROLE"))                
                    <li>
                        <a href="{{ route('addGrivanceView') }}" class="{{Route::currentRouteName()=='addGrivanceView'?'active':''}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24.758 24.761">
                                    <g id="pen" transform="translate(-1 511.853)">
                                      <path id="Path_16" data-name="Path 16" d="M363.075-511.782a2.954,2.954,0,0,0-1.531,1.008l-.644.635,2.815,2.81,2.81,2.81.562-.557c.9-.882,1.134-1.342,1.134-2.175a2.44,2.44,0,0,0-.305-1.24,21.338,21.338,0,0,0-3.067-3.067A2.545,2.545,0,0,0,363.075-511.782Z" transform="translate(-342.463)" fill="#fff"/>
                                      <path id="Path_17" data-name="Path 17" d="M71.307-454.193,64.5-447.386l2.81,2.81,2.81,2.81,6.807-6.807,6.807-6.807-2.81-2.81L78.114-461Z" transform="translate(-60.423 -48.389)" fill="#fff"/>
                                      <path id="Path_18" data-name="Path 18" d="M2.269-155.182c-.7,2.1-1.269,3.828-1.269,3.847s1.735-.548,3.857-1.255l3.857-1.284-2.558-2.563C4.745-157.847,3.582-159,3.568-159S2.972-157.285,2.269-155.182Z" transform="translate(0 -335.757)" fill="#fff"/>
                                    </g>
                                  </svg>
                            </span>
                            <span>Add grievance</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('aboutus') }}" class="{{Route::currentRouteName()=='aboutus'?'active':''}}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 38.299 28.924">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #fff;
                                    }
                                  </style>
                                </defs>
                                <g id="surface1" transform="translate(-2.573 -5.135)">
                                  <path id="Path_20" data-name="Path 20" class="cls-1" d="M12.4,5.257A3.667,3.667,0,0,0,9.489,8.449a13.717,13.717,0,0,0,.136,3.743,13.339,13.339,0,0,0,1.7,4.251,1.142,1.142,0,0,1,.057,1.4c-.186.4-.522.573-2.483,1.231-4.28,1.453-5.382,2.3-6.012,4.581A10.894,10.894,0,0,0,2.6,26.3c.014.014,1.116.036,2.426.036h2.39l.215-.236A11.845,11.845,0,0,1,10,24.595a37.417,37.417,0,0,1,4.609-1.789,18.086,18.086,0,0,0,2.025-.752l.308-.193-.172-.3a15.89,15.89,0,0,1-1.832-3.972c-1.2-3.686-1.281-7.229-.229-9.562a6.865,6.865,0,0,1,1.489-2.1l.372-.322L16.03,5.4A9.1,9.1,0,0,0,12.4,5.257Zm0,0" transform="translate(0 0.003)"/>
                                  <path id="Path_21" data-name="Path 21" class="cls-1" d="M16.98,5.224a7.041,7.041,0,0,0-.759.236l-.4.15.551.544c1.381,1.388,2.011,3.185,2,5.8a18.718,18.718,0,0,1-2.555,9.268c-.294.487-.2.766.308.966.222.1,1.167.429,2.118.744a35.4,35.4,0,0,1,4.3,1.689,14.632,14.632,0,0,1,2.433,1.517c.172.186.265.193,2.6.193h2.419l-.057-1A5.581,5.581,0,0,0,28.3,21.291a14.866,14.866,0,0,0-4.416-2.118c-2.541-.866-2.734-1-2.906-2.018-.043-.336-.014-.458.279-.938a12.877,12.877,0,0,0,1.739-6.391c0-2.684-.909-4.072-3.006-4.566A10.858,10.858,0,0,0,16.98,5.224Zm0,0" transform="translate(10.881 0)"/>
                                  <path id="Path_22" data-name="Path 22" class="cls-1" d="M18.37,5.512a5.285,5.285,0,0,0-3.092,1.5c-1.489,1.553-1.882,4.237-1.159,7.851a17.7,17.7,0,0,0,2.219,5.64c.437.665.444.68.358,1.145-.215,1.152-.544,1.4-3.092,2.254-5.2,1.732-6.821,2.684-7.844,4.659A10.823,10.823,0,0,0,4.671,33.03l-.05.766h30.8l-.043-.773a11.6,11.6,0,0,0-.988-4.273c-1.023-2.025-2.462-2.92-7.529-4.666-1.217-.429-2.412-.888-2.641-1.023a2.019,2.019,0,0,1-.916-1.553c-.093-.544-.093-.551.279-1.138,2.1-3.328,3.056-8.431,2.118-11.394a4.752,4.752,0,0,0-3.536-3.321A15.564,15.564,0,0,0,18.37,5.512Zm0,0" transform="translate(1.704 0.263)"/>
                                </g>
                            </svg>
                        </span>
                        <span>About Us</span>
                    </a>
                </li>                           
    
            </ul>
            
            <ul>
                @if(Auth::user())
                <li>
                    <a href="{{ route('profile') }}" class="{{Route::currentRouteName()=='profile'?'active':''}}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" id="surface1" width="23" height="23" viewBox="0 0 27.05 26.52">
                                <defs>
                                  <style>
                                    .cls-1 {
                                      fill: #fff;
                                    }
                                  </style>
                                </defs>
                                <path id="Path_4" data-name="Path 4" class="cls-1" d="M1.085,25.262H25.964a1.145,1.145,0,0,0,.849-.355.854.854,0,0,0,.228-.707,13.171,13.171,0,0,0-7.205-9.949,9.174,9.174,0,0,1-12.622,0A13.171,13.171,0,0,0,.008,24.2a.853.853,0,0,0,.228.707A1.145,1.145,0,0,0,1.085,25.262Zm0,0" transform="translate(0 1.258)"/>
                                <path id="Path_5" data-name="Path 5" class="cls-1" d="M7.754,13.3c.151.148.305.285.468.422a8.34,8.34,0,0,0,10.6,0c.163-.137.318-.273.468-.422s.293-.3.427-.453a7.1,7.1,0,0,0,1.773-4.668A7.73,7.73,0,0,0,13.524.738a7.73,7.73,0,0,0-7.97,7.445,7.117,7.117,0,0,0,1.769,4.668C7.461,13.008,7.608,13.16,7.754,13.3Zm0,0" transform="translate(0 -0.738)"/>
                            </svg>
                        </span>
                        <span>Profile</span>
                    </a>
                </li>
                @endif
                @if(Auth::user() && (Auth::user()->role==config("constants.PRINCIPAL_ROLE") || Auth::user()->role==config("constants.SUPER_ADMIN_ROLE")))
                    <li>
                        <a href="{{ route('department') }}" class="{{Route::currentRouteName()=='department' || Route::currentRouteName()=='manage-users'?'active':''}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" id="surface1" width="23" height="23" viewBox="0 0 27.05 26.52">
                                    <defs>
                                    <style>
                                        .cls-1 {
                                        fill: #fff;
                                        }
                                    </style>
                                    </defs>
                                    <path id="Path_4" data-name="Path 4" class="cls-1" d="M1.085,25.262H25.964a1.145,1.145,0,0,0,.849-.355.854.854,0,0,0,.228-.707,13.171,13.171,0,0,0-7.205-9.949,9.174,9.174,0,0,1-12.622,0A13.171,13.171,0,0,0,.008,24.2a.853.853,0,0,0,.228.707A1.145,1.145,0,0,0,1.085,25.262Zm0,0" transform="translate(0 1.258)"/>
                                    <path id="Path_5" data-name="Path 5" class="cls-1" d="M7.754,13.3c.151.148.305.285.468.422a8.34,8.34,0,0,0,10.6,0c.163-.137.318-.273.468-.422s.293-.3.427-.453a7.1,7.1,0,0,0,1.773-4.668A7.73,7.73,0,0,0,13.524.738a7.73,7.73,0,0,0-7.97,7.445,7.117,7.117,0,0,0,1.769,4.668C7.461,13.008,7.608,13.16,7.754,13.3Zm0,0" transform="translate(0 -0.738)"/>
                                </svg>
                            </span>
                            <span>Others</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user())
                    <li>
                                                
                        <form action="{{ route('logout') }}"  style="width: 100%" method="POST">
                            @csrf
                            <a>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 32 26.14">
                                    <defs>
                                      <style>
                                        .cls-1 {
                                          fill: #fff;
                                        }
                                      </style>
                                    </defs>
                                    <g id="surface1" transform="translate(0 -2.93)">
                                      <path id="Path_6" data-name="Path 6" class="cls-1" d="M13.824,21.188a2.554,2.554,0,0,0,0,2.5.87.87,0,0,0,1.59,0l4.09-6.444a2,2,0,0,0,.242-.579,2.653,2.653,0,0,0,0-1.354,2.075,2.075,0,0,0-.242-.572L15.414,8.306a.87.87,0,0,0-1.59,0,2.555,2.555,0,0,0,0,2.505l2.168,3.416H1.125C.5,14.227,0,15.021,0,16s.5,1.773,1.125,1.773H15.992Zm0,0" transform="translate(0 0)"/>
                                      <path id="Path_7" data-name="Path 7" class="cls-1" d="M27.138,2.93H10.727A4.875,4.875,0,0,0,5.859,7.8l.005,5.156h.289A1.454,1.454,0,0,0,8.5,12.948l.279-.005V7.8A1.947,1.947,0,0,1,10.727,5.85H27.138A1.946,1.946,0,0,1,29.08,7.8V24.2a1.946,1.946,0,0,1-1.942,1.947H10.727A1.947,1.947,0,0,1,8.78,24.2V19.042H8.486a1.448,1.448,0,0,0-2.337.01l-.289.005V24.2a4.875,4.875,0,0,0,4.867,4.867H27.138A4.871,4.871,0,0,0,32,24.2V7.8A4.871,4.871,0,0,0,27.138,2.93Zm0,0" transform="translate(0 0)"/>
                                    </g>
                                </svg>
                            </span>
                            <span><button type="submit" style="background: transparent;border:none;cursor:pointer"> <span>Log Out</span> </button ></span>
                            </a>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" target="_blank" class="{{Route::currentRouteName()=='login'?'active':''}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 32 26.14">
                                    <defs>
                                      <style>
                                        .cls-1 {
                                          fill: #fff;
                                        }
                                      </style>
                                    </defs>
                                    <g id="surface1" transform="translate(0 -2.93)">
                                      <path id="Path_6" data-name="Path 6" class="cls-1" d="M13.824,21.188a2.554,2.554,0,0,0,0,2.5.87.87,0,0,0,1.59,0l4.09-6.444a2,2,0,0,0,.242-.579,2.653,2.653,0,0,0,0-1.354,2.075,2.075,0,0,0-.242-.572L15.414,8.306a.87.87,0,0,0-1.59,0,2.555,2.555,0,0,0,0,2.505l2.168,3.416H1.125C.5,14.227,0,15.021,0,16s.5,1.773,1.125,1.773H15.992Zm0,0" transform="translate(0 0)"/>
                                      <path id="Path_7" data-name="Path 7" class="cls-1" d="M27.138,2.93H10.727A4.875,4.875,0,0,0,5.859,7.8l.005,5.156h.289A1.454,1.454,0,0,0,8.5,12.948l.279-.005V7.8A1.947,1.947,0,0,1,10.727,5.85H27.138A1.946,1.946,0,0,1,29.08,7.8V24.2a1.946,1.946,0,0,1-1.942,1.947H10.727A1.947,1.947,0,0,1,8.78,24.2V19.042H8.486a1.448,1.448,0,0,0-2.337.01l-.289.005V24.2a4.875,4.875,0,0,0,4.867,4.867H27.138A4.871,4.871,0,0,0,32,24.2V7.8A4.871,4.871,0,0,0,27.138,2.93Zm0,0" transform="translate(0 0)"/>
                                    </g>
                                </svg>
                            </span>
                            <span>Log In</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" target="_blank" class="{{Route::currentRouteName()=='register'?'active':''}}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 26.184 27.484">
                                    <g id="surface1" transform="translate(-2.445 -1.008)">
                                      <path id="Path_8" data-name="Path 8" d="M24.77,13.106H20.8V9.832c0-.027-.137-.055-.168-.055H17.707c-.035,0-.027.027-.027.055v3.273H13.57c-.035,0-.051.008-.051.035v2.34c0,.027.016.121.051.121H17.68v3.191c0,.027-.008.137.027.137h2.926a.389.389,0,0,0,.168-.137V15.6H24.77c.035,0,.191-.094.191-.121v-2.34C24.961,13.113,24.8,13.106,24.77,13.106Zm0,0" transform="translate(3.668 7.441)" fill="#fff"/>
                                      <path id="Path_9" data-name="Path 9" d="M15.584,23.868a.785.785,0,0,1-.674-.815V19.489a.672.672,0,0,1,.674-.69h4.24V15.711a9.82,9.82,0,0,0-4.655-3.166,6.17,6.17,0,0,0,3.1-5.385,6.082,6.082,0,0,0-6.011-6.152A6.081,6.081,0,0,0,6.256,7.16a6.17,6.17,0,0,0,3.1,5.385,9.933,9.933,0,0,0-6.915,9.508c0,5.492,4.4,6.438,9.817,6.438,3.04,0,5.758-.3,7.561-1.529V23.868Zm0,0" transform="translate(0)" fill="#fff"/>
                                    </g>
                                </svg>
                            </span>
                            <span>Sign Up</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <div class="logo">
            <img src="{{asset('images/header/logo.svg')}}" alt="">
        </div>
        <div class="btn-toggle" onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" id="hamburger-menu" width="20" height="20" viewBox="0 0 29.412 22.764">
                <path id="Path_10" data-name="Path 10" d="M2.482,0H26.931a2.393,2.393,0,0,1,2.481,2.278h0a2.393,2.393,0,0,1-2.481,2.278H2.482A2.393,2.393,0,0,1,0,2.278H0A2.393,2.393,0,0,1,2.482,0Zm0,18.208H26.931a2.393,2.393,0,0,1,2.481,2.278h0a2.393,2.393,0,0,1-2.481,2.278H2.482A2.393,2.393,0,0,1,0,20.486H0a2.393,2.393,0,0,1,2.482-2.278Zm0-9.1H26.931a2.393,2.393,0,0,1,2.481,2.278h0a2.393,2.393,0,0,1-2.481,2.278H2.482A2.394,2.394,0,0,1,0,11.382H0A2.393,2.393,0,0,1,2.482,9.1Z" fill="#fff" fill-rule="evenodd"/>
            </svg>
        </div>
    </div>
    
</header>

<div class="alert-box fail-bg" id="alert_box">
    <span class="message">
        OOPS!! Something Went wrong!
    </span>
    <span onclick="closeAlert()">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="20" xml:space="preserve"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z" fill="white"/></svg>
    </span>
</div>

<div class="loader-container" id="page_loader">
    <div class="loader-box">
        <img src="{{ asset('images/common/loader.gif') }}" alt="">
    </div>
</div>
<script>
    $(document).ready(()=>{
        hideLoader();
    })
     function openNav(){           
        if($("#left-nav").css('transform')=="matrix(1, 0, 0, 1, -250.4, 0)"){
            $("#left-nav").css("transform","translateX(0%)");
            
        }else{
            $("#left-nav").css("transform","translateX(-100%)");
        }       
    }
    function closeAlert(){
        $('#alert_box').animate({right:'-500px'},300,'linear',()=>{$('#alert_box').css('display','none');$('#alert_box').css('right','15px')});
    }
    function showAlert(message,type){        
        var alert_box =$("#alert_box");
        var alert_box_message =$("#alert_box .message");
        $("#alert_box").css('display','flex');
        $("#alert_box .message").html(message);
        $("#alert_box").removeClass();
        $("#alert_box").addClass('alert-box');
        (type == "success") ? alert_box.addClass('success-bg') : alert_box.addClass('fail-bg');
        setTimeout(()=>{
            closeAlert();
        },5000)        
        
    }
    function showLoader(){
        $("#page_loader").show();
        $("body").css('overflow','hidden');
    }
    function hideLoader(){
        $("#page_loader").hide();
        $("body").css('overflow','auto');
    }
    
</script>
