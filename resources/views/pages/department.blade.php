@extends('common.main')

@section('title',"Manage")
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/department.css') }}">
</head>
<body>

<!-- Secondary Navbar -->
<nav id="subNavBar">
    <div class="topnav" id="myTopnav">
        <a href="{{ route('department') }}" class="{{Route::currentRouteName()=='department'?'active':''}}">Manage Department</a>
        <a href="{{ route('manageUsers') }}" class="{{Route::currentRouteName()=='manageUsers'?'active':''}}">Manage Users</a>
        <a href="{{ route('messages.index') }}" class="{{Route::currentRouteName()=='messages.index'?'active':''}}">Contact Messages</a>
        <a href="javascript:void(0);" class="icon" onclick="responsiveNavBar();">
        <i class="fa fa-bars">Sub Menu;</i>
        </a>
    </div>
</nav>

    {{-- INSERT DEPARTMENT MODAL BUTTON --}}
    <button id="insert-modal" class="button"><span>[+]</span> Insert Department </button>


    {{-- TABLE USING FRONTEND - JAVASCRIPT --}}
    <table id='dept_manager'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="tbody">

            {{-- LISTING OUT DATA FROM JAVASCRIPT FRONTEND --}}
            
        </tbody>
    </table>






{{-- NOTE: INSERT DEPARTMENT MODAL FORM --}}
    <div id="myModal" class="modal">
        <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Insert New Department</h2>
        </div>
        <div class="modal-body">

            {{-- INSERT FORM --}}
            <div id="insertDeptForm">
                <div class="alert success">
                    <span class="closebtn">&times;</span>
                    <strong>Success!</strong> New Department Has Been Added.
                </div>
                <div class="alert danger">
                    <span class="closebtn">&times;</span>
                    <strong>Danger!</strong> This Department Already Exists.
                </div>
                <div class="alert warning">
                    <span class="closebtn">&times;</span>
                    <strong>Warning!</strong> Please Fill <span id="msg"></span>
                </div>

                <form name="insertDept">
                    @csrf
                    <label for="fname">Department ID</label>
                    <input type="number" id="deptId" name="deptId" placeholder="0" required>

                    <label for="fname">Department Name</label>
                    <input type="text" id="deptName" name="deptName" placeholder="Enter Department Name" required>

                    <input type="submit" value="Insert" id="insertDept">
                </form>
            </div>

        </div>
        <div class="modal-footer">
        </div>
    </div>

    </div>


    {{-- NOTE: DELETE DEPARTMENT MODAL FORM --}}
    <div id="delModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Deleting Department</h2>
            </div>
            <div class="modal-body">
                <div class="alert success" id="delete_success">
                    <span class="closebtn">&times;</span>
                    <strong>Success!</strong> Selected Department With ID: <span id="deletedDeptId"></span> Has Been Deleted.
                </div>
                <div class="alert danger" id="delete_failure">
                    <span class="closebtn">&times;</span>
                    <strong>Danger!</strong> Try Again There Was An Problem With Server.
                </div>

                {{-- DELETE ALERT --}}
                <div class="deletecontainer">
                    <h1>Delete Department</h1>
                    <p>Are you sure you want to delete this Department ?</p>

                    <div class="clearfix">
                        <button type="button" class="cancelbtn" id="cancelBtn">Cancel</button>
                        <button type="button" class="deletebtn" id="deleteDeptBtn">Delete</button>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>



{{-- NOTE: EDIT DEPARTMENT MODAL FORM --}}
    <div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Edit Department</h2>
        </div>
        <div class="modal-body">

            {{-- INSERT FORM --}}
            <div id="editDeptForm">
                <div class="alert success" id="edit_success">
                    <span class="closebtn">&times;</span>
                    <strong>Success!</strong> Department Has Been Updated.
                </div>
                <div class="alert danger" id="edit_failed">
                    <span class="closebtn">&times;</span>
                    <strong>Danger!</strong> This Department Name OR ID Already Exists
                </div>
                <div class="alert warning" id="edit_warning">
                    <span class="closebtn">&times;</span>
                    <strong>Warning!</strong> Please Fill <span id="editmsg"></span>
                </div>

                <form name="editDept">
                    <input type="hidden" id="p-key" name="id" value="">

                    <label for="fname">Department ID</label>
                    <input type="number" id="editDeptId" name="deptId" placeholder="0" required>

                    <label for="fname">Department Name</label>
                    <input type="text" id="editDeptName" name="deptName" placeholder="Enter Department Name" required>

                    <input type="submit" value="Update" id="editDeptBtn">
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>

    </div>

@endsection
@section('scripts')
<script src="{{ asset('js/departments.js') }}"></script>
@endsection
