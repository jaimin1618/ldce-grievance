@extends('common.main')

@section('title',"Contact Messages")
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/contactmsg.css') }}">
</head>
<body>


<!-- Secondary Navbar -->
<nav id="subNavBar">
    <div class="topnav" id="myTopnav">
        <a href="{{ route('department') }}" class="active">Manage Department</a>
        <a href="{{ route('manageUsers') }}">Manage Users</a>
        <a href="{{ route('messages.index') }}">Contact Messages</a>
        <a href="javascript:void(0);" class="icon" onclick="responsiveNavBar();">
        <i class="fa fa-bars">Sub Menu;</i>
        </a>
    </div>
</nav>


{{-- TABLE USING FRONTEND - JAVASCRIPT --}}
<table id="messageTable">
    <div class="alert info">
        Total <strong id="row_count"></strong> Messages Found
    </div>
	<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Message</th>
	</tr>
	</thead>
	<tbody id="messagesBody">
        
        
	</tbody>
</table>







@endsection
@section('scripts')
    
    <script src="{{ asset('js/contactmsg.js') }}"></script>
    
@endsection
