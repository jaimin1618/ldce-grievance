<div class="loader-container" id="page_loader" >
    <div class="loader-box">
        <img src="{{ asset('images/common/loader.gif') }}" alt="">
    </div>
</div>
@if(Route::currentRouteName()!="profile")

<footer class="primary-color">
    <div class="row">
        <div class="footer-box">
            <h1>
                Send Query
            </h1>
            <span class="footer_small_text"> If you find any type of mistake or bug or glitch in the site, feel free to share that with us. Thank You..</span>
            <form action="" onsubmit="return false">                 
                <div class="form_group">    
                    
                    <input type="text" name="name" placeholder="Name" id="contact_us_name">
                </div>
                <div class="form_group">                    
                    <input type="email" name="email" placeholder="Email" id="contact_us_email">
                </div>
                <div class="form_group">                    
                    <input type="text" name="message" placeholder="Message" id="contact_us_message">
                </div>
                <div class="form_group">
                    <button id="send_contact">
                        Send
                    </button>
                </div>
            </form>
        </div>
        <div class="footer-box">
            <h1>
                Contact Us
            </h1>
            <ul>
                <li>
                    <a href="https://www.google.co.in/maps/place/Lalbhai+Dalpatbhai+College+of+Engineering/@23.0338,72.5443953,17z/data=!3m1!4b1!4m5!3m4!1s0x395e84eaf57ac615:0x5c7498bb96b34c97!8m2!3d23.0338!4d72.546584" target="_blank">
                        <img src="{{asset('images/footer/browser.svg')}}" alt="">
                        LD college of engineering
                    </a>
                    <p>
                        Opp. Gujarat University,
                        Navrangpura, Ahmedabad - 380015.
                        GUJARAT INDIA
                    </p>
                </li>
                <li>
                    <a href="tel:079 2630 2887">
                        <img src="{{asset('images/footer/phone-call.svg')}}" alt="">
                        Phone No: 079 2630 2887
                    </a>
                </li>
                <li><a href="mailto:Ldce-Abad-Dte@Gujarat.Gov.In">
                    <img src="{{asset('images/footer/email.svg')}}" alt=""> Email: Ldce-Abad-Dte@Gujarat.Gov.In
                </a></li>
            </ul>
        </div>
    </div>
    <div class="social d-f-c">
        <a href="https://www.facebook.com/ldce.ac.in"  target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16 31.1703C24.3783 31.1703 31.1703 24.3783 31.1703 16C31.1703 7.6216 24.3783 0.82959 16 0.82959C7.6216 0.82959 0.82959 7.6216 0.82959 16C0.82959 24.3783 7.6216 31.1703 16 31.1703Z"/>
                <path d="M19.3637 9.19628H21.2742V5.96013C20.349 5.86389 19.4193 5.81642 18.489 5.8179C15.7228 5.8179 13.8319 7.50739 13.8319 10.6013V13.2603H10.7261V16.868H13.8313V26.1829H17.5753V16.868H20.6763L21.1421 13.2603H17.5753V10.9545C17.5753 9.88724 17.8603 9.19628 19.3637 9.19628Z" fill="blue"/>
            </svg>
        </a>
        <a href="https://www.youtube.com/c/LDCollegeofEngineering/videos"  target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16 31.1703C24.3783 31.1703 31.1703 24.3783 31.1703 16C31.1703 7.6216 24.3783 0.82959 16 0.82959C7.6216 0.82959 0.82959 7.6216 0.82959 16C0.82959 24.3783 7.6216 31.1703 16 31.1703Z"/>
                <path d="M16.4091 9.54932C18.2752 9.62221 20.1424 9.68917 22.0085 9.77332C22.4482 9.79602 22.8858 9.84908 23.3181 9.93213C24.367 10.1283 25.0289 10.8305 25.2269 11.9327C25.5 13.4533 25.5552 14.9905 25.5042 16.5277C25.468 17.6027 25.3649 18.6764 25.2612 19.7478C25.1848 20.5401 24.8642 21.2127 24.1649 21.6596C23.7424 21.9298 23.266 22.0056 22.783 22.0566C20.9098 22.2539 19.0283 22.2984 17.1474 22.2889C15.2666 22.2794 13.3744 22.2225 11.4882 22.1633C10.879 22.1349 10.2719 22.073 9.66952 21.9778C8.63545 21.829 7.89886 21.1227 7.7193 20.0507C7.58419 19.2453 7.50893 18.4275 7.45145 17.6121C7.36323 16.2781 7.37671 14.9394 7.49175 13.6074C7.53597 12.9859 7.6191 12.3678 7.74063 11.7567C7.96878 10.6711 8.73026 10.0187 9.83071 9.88058C11.5949 9.66013 13.3691 9.64354 15.1427 9.61095C15.564 9.60383 15.9854 9.61095 16.4073 9.61095L16.4091 9.54932ZM14.6651 13.2329V18.6628L19.3709 15.9481L14.6651 13.2329Z" fill="red"/>
            </svg>
        </a>
    </div>
    <div class="copy right d-f-c">
        <span class="footer_small_text">
            2021 © LDCE. All rights Reserved | Design by <a href="{{ route('developers') }}" style="color: white">LDCE Team</a> 
        </span>
        
    </div>
    <script>
        $("#send_contact").on('click',()=>{
            var name = $("#contact_us_name").val();
            var email = $("#contact_us_email").val();
            var message = $("#contact_us_message").val(); 
            if(name.trim()==""){
                showAlert("Name is required field","fail");
                return false;
            }
            if(email.trim()==""){
                showAlert("Email is required field","fail");
                return false;
            }else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
                showAlert("Email is Not valid type","fail");
                return false;
            }
            if(message.trim()==""){
                showAlert("Message is required field","fail");
                return false;
            }
            $.ajax(
                {
                    url:"{{ route('saveContactUs') }}",
                    method:'POST',
                    data:{
                        name:name,
                        email:email,
                        message:message,
                        _token:"{{csrf_token()}}"
                    },
                    success:function(res){
                        res = JSON.parse(res);
                        if(res.status==true){
                            
                            showAlert(res.message,"success");
                             $("#contact_us_name").val("");
                             $("#contact_us_email").val("");
                             $("#contact_us_message").val(""); 
                        }else{
                            showAlert(res.message,"fail")
                        }
                    }
                }
            )
            
        })
    </script>
</footer>
@endif