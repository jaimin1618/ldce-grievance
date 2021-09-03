
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            font-size: 16px;
            color: #777777;
            display: block;
            box-sizing: border-box;
        }
        .container,body{
            width: 100%;
            border: 2px solid #283891;
            padding: 10px;
            /* display: flex; */
            flex-direction: column;
            border-radius: 5px;
        }
        .container h1{
            width: 100%;
            display: flex;
            font-size: 24px;
            color: #000;
        }
        .container p{
            width: 100%;
            /* display: flex; */
            font-size: 16px;
            margin: 5px 0px;
            color: #777777;
        }         
        .row{
            width: 100%;
            /* display: flex; */
            /* flex-direction: row; */
            margin: 5px 0px;
        }
        .row .title{
            width: 100%;
            font-size: 16px;
            color: #000;        
        }
        .row p{
            width: 100%;
            /* display: flex;
            flex: 1; */
            font-size: 16px;
            color: #777777;
        }
        .badge-btn{
            border-radius: 5px;
            width: auto !important;
            max-width: 300px !important;
            text-align: center;
            font-size: 16px;
            height: 30px;;
            padding: 1px 8px;

        }
        .success{
            background-color: green;
            color: white !important;
        }
        .danger{
            background-color: red;
            color: white !important;
        }
    </style>
</head>
<body>
    {{-- approved,rejected,In-progress,completed --}}
    <div class="container">
        <h1>
            Hello {{$name}},
        </h1>
        @if($status=='approved')
        <p>
           dear {{$name}}, your Grivance is Approved to next step, An action will be taken soon on you grivance.  
        </p>
        @elseif($status=='rejected')
        <p>
           dear {{$name}}, your Grivance is Rejected ,It seems your grivance is not valid.<br>if your grivance is really genuine then contact your HOD or princiapl. 
        </p>
        @elseif($status=='In-progress')
        <p>
           dear {{$name}}, your Grivance is seen by Your HOD and put has taken action on your grivance.
        </p>
        @else        
        <p>
           dear {{$name}}, your Grivance is actioned and resloved. thank you for you grivance.
        </p>
        @endif
        
        <div class="row">
            <div class="title">
                message By responder:
            </div>
            <p>
                {!! $given_message !!}
            </p>
        </div>

        <div class="row">
            <div class="title">
                status :
            </div>
            
            @if($status=='approved')
            <span class="badge-btn success">
                {{$status}}
            </span>
            @elseif($status=='rejected')
            <span class="badge-btn danger">
                {{$status}}
            </span>
            @elseif($status=='In-progress')
            <span class="badge-btn success">
                {{$status}}
            </span>
            @else        
            <span class="badge-btn success">
                {{$status}}
            </span>
            @endif                            
        </div>
        <div class="row">
            <div class="title">
                From L.D. College of Engineering.
            </div>
        </div>
        
    </div>
       
</body>
</html>