@extends('common.main')

@section('title', 'Developers')

@section('styles')
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
/>
    <link rel="stylesheet" href="{{asset('css/teamstyle.css')}}">
@endsection

@section('content')
    <div class="heading" style="margin-top: -20px">
        <h1>Developer Team</h1>
        <div class="underline">
            <svg xmlns="http://www.w3.org/2000/svg" id="underline" width="335.07" height="23.452" viewBox="0 0 335.07 23.452">
                <path id="Path_1" data-name="Path 1" d="M420.126-143.73a57.268,57.268,0,0,0-5.557,4.717c-2.021,1.99-3.978,3.611-4.294,3.611a11.227,11.227,0,0,1-3.031-1.474c-3.6-2.137-6.946-2.58-9.535-1.253l-2.21,1.106,3.473.074c3.41.074,8.84,2.285,8.84,3.611,0,1.4-5.3,3.464-8.9,3.464-3.283,0-3.536.074-2.273.884,2.336,1.548,7.2,1.179,10.608-.884l3.094-1.769,3.852,3.685c7.135,7,9.977,7.591,13.955,2.948l2.463-2.948,2.021,1.4c2.526,1.843,4.609,1.843,7.577.074l2.336-1.4,2.778,3.243c3.915,4.643,6.567,4.275,13.008-1.843,1.579-1.474,3.283-3.1,3.852-3.611.884-.737,1.642-.59,4.42.958a14.463,14.463,0,0,0,6.567,1.843c4.546,0,5.683-1.179,1.452-1.621-3.473-.295-8.4-2.58-8.4-3.906,0-1.253,4.736-3.538,8.082-3.906,3.852-.442,2.715-1.621-1.642-1.621a12.87,12.87,0,0,0-6.188,1.843c-3.094,1.843-3.22,1.843-4.609.59-8.272-7.518-8.651-7.812-11.429-8.181-2.715-.295-3.031-.147-5.367,2.727-1.894,2.285-2.652,2.8-2.9,1.99a6.137,6.137,0,0,0-2.526-2.285,6.685,6.685,0,0,0-7.7,1.032c-1.452,1.253-1.515,1.179-3.915-1.548C425.367-145.278,423.283-145.72,420.126-143.73Zm6.819,6.265c2.273,3.169,2.147,5.38-.442,8.4-1.579,1.843-2.715,2.506-4.294,2.506-2.21,0-6.82-2.948-8.84-5.675-1.073-1.327-1.01-1.474,2.021-4.2C420.694-141.151,423.914-141.446,426.945-137.466Zm27.215-1.327a19.543,19.543,0,0,1,4.42,3.39l2.336,2.432-1.7,2.064c-2.589,3.1-6.756,5.307-9.029,4.717-1.831-.442-5.746-4.791-5.746-6.338,0-1.474,1.894-5.012,3.284-6.117C449.487-140.119,451.445-140.119,454.16-138.792Zm-15.154,1.253c3.031,2.8,1.389,8.771-2.463,8.771-1.957,0-4.736-3.022-4.736-5.159,0-1.916,2.715-5.159,4.294-5.159A5.47,5.47,0,0,1,439.006-137.539Z" transform="translate(-268.84 144.937)" fill="#283891"/>
                <path id="Path_2" data-name="Path 2" d="M649.674-135.132l-1.287,2.847H590.528c-57.39,0-57.9,0-58.561-1.627-1.522-3.741-4.448,0-3.472,4.473.585,2.6,2.224,3.5,3.16,1.708.624-1.22,5.813-1.3,58.912-1.3h58.249L649.6-127c1.092,2.928,3.472,2.847,4.565-.081,1.365-3.66.936-7.808-1.014-9.922C651.781-138.547,651.04-138.141,649.674-135.132Z" transform="translate(-319.886 143.089)" fill="#283891"/>
                <path id="Path_3" data-name="Path 3" d="M70.613-135.321c-1.687,3.61-.863,10.075,1.412,11.25,1.1.588,3.1-1.259,3.412-3.274.235-1.091,6.471-1.259,58.518-1.259,51.3,0,58.361.168,58.871,1.259,1.569,3.358,4.275-.756,3.373-5.037-.628-2.938-2.236-3.61-3.373-1.343l-.863,1.763H133.837c-38.476,0-58.125-.252-58.125-.84,0-1.931-1.608-4.2-2.942-4.2A2.584,2.584,0,0,0,70.613-135.321Z" transform="translate(-69.718 142.206)" fill="#283891"/>
            </svg>
        </div>
    </div>
    <div class="team-container">
        <div class="team-container-inner">
            <div class="card-box">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="{{asset('images/dev-team/soham.jpg')}}" alt="" />
                        </div>
                        <div class="contentBx">
                            <h4>Soham Patel</h4>
                            <h5>Web Developer</h5>
        
                            <a class="mailid" href="mailto:sohampatel9403@gmail.com">
                                <h5>sohampatel9403@gmail.com</h5>
                            </a>
        
                            <!-- <h5>Director General</h5> -->
                        </div>
                        <div class="sci">
                            <a href="https://github.com/soham9403" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/soham-patel-b4b6761b9/" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/soham_patel9403/" target="blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="{{asset('images/dev-team/janvi.jpg')}}" alt="" />
                        </div>
                        <div class="contentBx">
                            <h4>Janvi Thakkar</h4>
                            <h5>Web Developer</h5>
        
                            <a class="mailid" href="mailto:janvithakkar.583@gmail.com">
                                <h5>janvithakkar.583@gmail.com</h5>
                            </a>
                        </div>
                        <div class="sci">
                            <a href="https://github.com/Janvi-Thakkar" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/janvi-thakkar-496514194/" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/januthakkar_1103/" target="blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="{{asset('images/dev-team/shalin.jpg')}}" alt="" />
                        </div>
                        <div class="contentBx">
                            <h4>Shalin Shah</h4>
                            <h5>Web Developer</h5>
                            <a class="mailid" href="mailto:shalinshh723@gmail.com">
                                <h5>shalinshh723@gmail.com</h5>
                            </a>
                        </div>
                        <div class="sci">
                            <a href="https://github.com/SH4LIN" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/shalin-shah-838530190/" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/s_h_4_l_i_n/" target="blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                            <!-- <a href="#" target="blank"
                        ><i class="fa fa-envelope" aria-hidden="true"></i
                      ></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="{{asset('images/dev-team/rp.jpg')}}" alt="" />
                        </div>
                        <div class="contentBx">
                            <h4>Rishi Patel</h4>
                            <h5>Web Developer</h5>
                            <a class="mailid" href="mailto:patelrishi382@gmail.com">
                                <h5>patelrishi382@gmail.com</h5>
                            </a>
                        </div>
                        <div class="sci">
                            <a href="https://github.com/programmingwithrp" target="blank"><i class="fa fa-github"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/rishipatel382" target="blank"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/r.p_rockstar/" target="blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                            <!-- <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="{{asset('images/dev-team/siddhi.jpeg')}}" alt="" />
                        </div>
                        <div class="contentBx">
                            <h4>Siddhi Doshi</h4>
                            <h5>Web Developer</h5>
                            <a class="mailid" href="mailto:siddhikdoshi@gmail.com">
                                <h5>siddhikdoshi@gmail.com</h5>
                            </a>
                        </div>
                        <div class="sci">
                            <a href="https://github.com/Siddhi132p" target="blank"><i class="fa fa-github"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/siddhikdoshi" target="blank"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/siddhi__2418/" target="blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                            <!-- <a href="#" target="blank"
                        ><i class="fa fa-envelope" aria-hidden="true"></i
                      ></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="{{asset('images/dev-team/jaimin.jpeg')}}" alt="" />
                        </div>
                        <div class="contentBx">
                            <h4>Jaimin Chokhawala</h4>
                            <h5>Web Developer</h5>
        
                            <a class="mailid" href="mailto:jaimin.chokhawala@gmail.com">
                                <h5>jaimin.chokhawala@gmail.com</h5>
                            </a>
                        </div>
                        <div class="sci">
                            <a href="https://github.com/JAIMIN-CHOKHAWALA" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/jaimin-chokhawala-1111921b2" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/jaimin_chokhawala" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <!-- 
                      <a href="#" target="blank"
                        ><i class="fa fa-envelope" aria-hidden="true"></i
                      ></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="{{asset('images/dev-team/soham.jpg')}}" alt="" />
                </div>
                <div class="contentBx">
                    <h4>Soham Patel</h4>
                    <h5>Web Developer</h5>

                    <a class="mailid" href="mailto:sohampatel9403@gmail.com">
                        <h5>sohampatel9403@gmail.com</h5>
                    </a>

                    <!-- <h5>Director General</h5> -->
                </div>
                <div class="sci">
                    <a href="#" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="#" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/soham_patel9403/" target="blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                    
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="{{asset('images/dev-team/janvi.jpg')}}" alt="" />
                </div>
                <div class="contentBx">
                    <h4>Janvi Thakkar</h4>
                    <h5>Web Developer</h5>

                    <a class="mailid" href="mailto:janvithakkar.583@gmail.com">
                        <h5>janvithakkar.583@gmail.com</h5>
                    </a>
                </div>
                <div class="sci">
                    <a href="#" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="#" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/januthakkar_1103/" target="blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                    <!-- <a href="#" target="blank"
                ><i class="fa fa-envelope" aria-hidden="true"></i
              ></a> -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="{{asset('images/dev-team/shalin.jpg')}}" alt="" />
                </div>
                <div class="contentBx">
                    <h4>Shalin Shah</h4>
                    <h5>Web Developer</h5>
                    <a class="mailid" href="mailto:shalinshh723@gmail.com">
                        <h5>shalinshh723@gmail.com</h5>
                    </a>
                </div>
                <div class="sci">
                    <a href="#" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="#" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/s_h_4_l_i_n/" target="blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                    <!-- <a href="#" target="blank"
                ><i class="fa fa-envelope" aria-hidden="true"></i
              ></a> -->
                </div>
            </div>
        </div>

        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="{{asset('images/dev-team/rp.jpg')}}" alt="" />
                </div>
                <div class="contentBx">
                    <h4>Rishi Patel</h4>
                    <h5>Web Developer</h5>
                    <a class="mailid" href="mailto:patelrishi382@gmail.com">
                        <h5>patelrishi382@gmail.com</h5>
                    </a>
                </div>
                <div class="sci">
                    <a href="https://github.com/programmingwithrp" target="blank"><i class="fa fa-github"
                            aria-hidden="true"></i></a>
                    <a href="https://www.linkedin.com/in/rishipatel382" target="blank"><i class="fa fa-linkedin"
                            aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/r.p_rockstar/" target="blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                    <!-- <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a> -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="{{asset('images/dev-team/siddhi.jpeg')}}" alt="" />
                </div>
                <div class="contentBx">
                    <h4>Siddhi Doshi</h4>
                    <h5>Web Developer</h5>
                    <a class="mailid" href="mailto:siddhikdoshi@gmail.com">
                        <h5>siddhikdoshi@gmail.com</h5>
                    </a>
                </div>
                <div class="sci">
                    <a href="https://github.com/Siddhi132p" target="blank"><i class="fa fa-github"
                            aria-hidden="true"></i></a>
                    <a href="https://www.linkedin.com/in/siddhikdoshi" target="blank"><i class="fa fa-linkedin"
                            aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/siddhi__2418/" target="blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                    <!-- <a href="#" target="blank"
                ><i class="fa fa-envelope" aria-hidden="true"></i
              ></a> -->
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="{{asset('images/dev-team/jaimin.jpeg')}}" alt="" />
                </div>
                <div class="contentBx">
                    <h4>Jaimin Chokhawala</h4>
                    <h5>Web Developer</h5>

                    <a class="mailid" href="mailto:jaimin.chokhawala@gmail.com">
                        <h5>jaimin.chokhawala@gmail.com</h5>
                    </a>
                </div>
                <div class="sci">
                    <a href="#" target="blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="#" target="blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="#" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <!-- 
              <a href="#" target="blank"
                ><i class="fa fa-envelope" aria-hidden="true"></i
              ></a> -->
                </div>
            </div>
        </div>
    </div> --}}
@endsection
