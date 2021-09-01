@extends('common.main')
@section('title',"About Us")
@section('styles')

<link rel="stylesheet" href=".././css/aboutus.css" />
@endsection

@section('content')
<div class="body">
    <div class="about-title">
        <div class="title">About Us</div>
        <img src="{{asset('images/aboutus/underline.svg')}}" />
    </div>
    <div class="common-title">
        <u>
            <b>Instructions</b>
        </u>

    </div>
    <ul>
        <li>
            Your valuable feedback on quality of grievance will help us to improve the service.
        </li>
        <li>
            Any Grievance sent by email will not be attended to / entertained.Please lodge your grievance at the website only.
        </li>
        <li>
            <span class="green">Request: </span>All grievances will be seen by committee members, stay patient after posting a grievance. You will get the Solution as soon as possible.
        </li>
        <li>
            <span class="green">Note: </span>If you have not got a satisfactory redress of your grievance within a reasonable period of time, contact the committee member, who have given the solution, via Email Only.
        </li>

    </ul>
    <span class="normal">The Student's Grievance Cell desires to promote and maintain a conducive and unprejudiced educational environment. </span>
    <br />
    <br />
    <span class="normal">
        The Cell enables a student to express feelings by initiating and pursuing the grievance procedure in accordance with the rules and regulations of the College. 'Grievance Cell' enquires and analyses the nature and pattern of the grievances in a
            strictly confidential manner. Emphasis on procedural fairness has been given with a view to "the right to be heard and right to be treated without bias".
    </span>
    <br />
    <br />
    <span class="green">Objectives of Grievance Cell</span>
    <ul>
        <li>To support, those students who have been deprived of the services offered by the college, for which he / she is entitled.</li>
        <li>
            To make officials of the college responsive, accountable and courteous in dealing with the students.
        </li>
        <li>
            To ensure effective solution to the students' grievances with an impartial and fair approach.
        </li>
    </ul>

    <span class="green">Functions</span>
    <ul>
        <li>Redressal of Students' Grievances to solve their academic and administrative problems.</li>
        <li>
            To co-ordinate between students and Departments / Sections to redress the grievances.
        </li>
        <li>
            To guide ways and means to the students to redress their problems.
        </li>
    </ul>
    <span class="normal">The grievance procedure is a machinery to sort out the issues between student and college. It is a means by which a student who believe that, he/she has been treated unfairly with respect to his / her academic / administrative affairs or is convinced to be discriminated is redressed. It is a device to settle a problem. It enables to express feelings by initiating and pursuing the grievance procedure in accordance with the rules and regulations of the college. It involves a process of investigation in which 'Grievance Cell' enquires and analyses the nature and pattern of the grievances in a strictly confidential manner. Matters are disclosed to only those, who have a legitimate role in resolving the matter. </span>

    <div class="dev-team">

        <div class="about-title">
            <div class="title">Developers Team</div>
            <img src="{{asset('images/aboutus/underline.svg')}}" />
        </div>
        <br />
        <div class="team-images">
            <div class="dev-img-div">
                <img src="{{asset('images/dev-team/dev-janvi.png')}}" /> Soham Patel
            </div>
            <div class="dev-img-div">
                <img src="{{asset('images/dev-team/dev-janvi.png')}}" />Siddhi Doshi
            </div>
            <div class="dev-img-div">
                <img src="{{asset('images/dev-team/dev-janvi.png')}}" />Janvi Thakkar
            </div>
            <div class="dev-img-div">
                <img src="{{asset('images/dev-team/dev-janvi.png')}}" />Rishi
            </div>
            <div class="dev-img-div">
                <img src="{{asset('images/dev-team/dev-janvi.png')}}" />Shalin Shah
            </div>

        </div>
    </div>
</div>
@endsection
