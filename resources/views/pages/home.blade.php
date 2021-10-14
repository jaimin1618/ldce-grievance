@extends('common.main')

@section('title',"Home")
@section('styles')
<link rel="stylesheet" href="{{asset('css/home.css')}}" />
@endsection

@section('content')

<img id="headerImage" src="{{asset('images/home/header.svg')}}" />


<div id="CollegeTitleForSmall">
    <H1>L. D. College Of Engineering</H1>
    <p>Ahmedabad, Gujrat, India</p>
</div>


<div class="homeDiv">
    <h1 class="homeTitle">Welcome To Ldce</h1>
    <hr>
    <br>
    <p>
        <b>L. D. College of Engineering (LDCE)</b>, Ahmedabad is a premier government engineering institute in Gujarat State set with the objectives of imparting higher education, research and training in various fields of engineering & technology. The institute is affiliated to Gujarat Technological University, Ahmedabad and administrated by Department of Technical education, Government of Gujarat.
    </p>
    <p><br>
        The institute was established in June 1948 with a generous donation of Rs. 25 lacs and 31.2 Hectres of land by the textile magnate Sheth Shri Kasturbhai Lalbhai. Hence College is named as Lalbhai Dalpatbhai College of Engineering(LDCE). It is situated adjacent to Gujarat University campus and is located at the nucleus of various national level institutes such as PRL, ATIRA, IIM etc. The campus is having buildings for various departments, offices, hostels, residences for Principal, rector and wardens.
    </p>
</div>



<h1 style="text-align: center; margin: 5px;">How to use our Grievance website?</h1>
<br>

<!-- <div class="youtubeDiv">

</div> -->

<iframe class="videoDiv" src="https://www.youtube.com/embed/lTxn2BuqyzU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<br>


@endsection