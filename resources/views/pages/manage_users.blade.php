@extends('common.main')

@section('title',"Dashboard")
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/manageUsers.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />     --}}
@endsection

@section('content')

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
    
    <h1>Principle, HODs and Officers</h1>

    <button id="insert-user-modal" class="button"><span>[+]</span> Insert New User </button>

    <table id="users_table">
        <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>More details</th>
              <th>Edit details</th>
              <th>Delete</th>
            </tr>
        </thead>
        
        <tbody id="user-tbody">
            
        </tbody>
      
      {{-- Getting Data From Server To Show Here --}}
    </table>
    
    {{-- SHOW MODAL --}}
    <div id="viewModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>More Details</h2>
        </div>
        <div class="modal-body">
                    
          <div id="showImage">
              <img src="{{ asset('images/profile/two.jpg') }}" alt="" id="img">
          </div>
          <div id="showDetails">
            <p>Name: <span id="name"></span></p>
            <p>Email: <span id="email"></span></p>
            <p>Department No: <span id="dept"></span></p>
            <p>Role: <span id="role"></span></p>
            <p>Contact No: <span id="number"></span></p>
            <p>Institute: <span id="institute"></span></p>
            <p>last-updated: <span id="last_updt"></span></p>
          </div>
    
      </div>
      <div class="modal-footer">
          All available details are shown here.
      </div>
      </div>
    </div>
    
    
    <div  class="modal" id="delModal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Delete User</h2>
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
            
            <div class="deletecontainer">
                <h1>Alert! Deleting User</h1>
                <p>Are you sure you want to delete this User ?</p>

                <div class="clearfix">
                    <button type="button" class="cancelbtn" id="cancelBtn">Cancel</button>
                    <button type="button" class="deletebtn" id="deleteUserBtn">Delete</button>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <h3>Deleting User</h3>
        </div>
      </div>
    </div>
    
    {{-- EDIT MODAL --}}
    <div id="editUserModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Edit User</h2>
        </div>
        <div class="modal-body">
            
            <div class="alert success" id="edit_success">
                <span class="closebtn">&times;</span>
                <strong>Success!</strong> Selected User Has Been Updated.
            </div>
            
            <div class="alert warning" id="edit_warning">
                <span class="closebtn">&times;</span>
                <strong>Danger!</strong> Kindly fill details carefully.
                <div id="warnings">
                    {{-- APPEND Warning --}}
                </div>
            </div>
            
            <div class="alert danger" id="edit_failure">
                <span class="closebtn">&times;</span>
                <strong>Danger!</strong> There were some problems with your given inputs.
                <div id="dangers">
                    {{-- APPEND Warning --}}
                </div>
            </div>
            
            <div>
              <form id="edit-user-form">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Full Name">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email Address">
                
                <label for="contact">Contact No</label>
                <input type="number" id="contact" name="contact" placeholder="Contact No">

                <label for="role">Role</label>
                <select id="role" name="role">
                  <option value="0">SUPER ADMIN</option>
                  <option value="1">PRINCIPAL</option>
                  <option value="2">HOD</option>
                  <option value="3">OFFICER</option>
                </select>
                
                <div id="deptNo">
                    <label for="dept">Department No</label>
                    <input type="number" id="deptNum" name="deptNum" placeholder="Department No">
                </div>
                
                
                <!-- <label for="institute">Institute No</label> -->
                <input type="hidden" id="instituteNum" name="instituteNum" placeholder="Institute No" value="28">
                
                <label for="password">New password</label>
                <input type="password" id="newPassword" name="password" placeholder="new password" value="">
                
                <label for="password">Retype password</label>
                <input type="password" id="newPassword2" name="password2" placeholder="re-type password" value="">
              
                <input id="editUserBtn" type="submit" value="Update">
              </form>
            </div>
            
        </div>
        <div class="modal-footer">
          <h3>Click 'Update' to comfirm your update</h3>
        </div>
      </div>

    </div>
        

    {{-- INSERT MODAL --}}
    <div id="insertUserModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Insert New User</h2>
        </div>
        <div class="modal-body">

        <div class="alert success" id="edit_success">
          <span class="closebtn">&times;</span>
          <strong>Success!</strong> Selected User Has Been Updated.
        </div>

        <div class="alert warning" id="edit_warning">
          <span class="closebtn">&times;</span>
          <strong>Danger!</strong> Kindly fill details carefully.
          <div id="warnings">
              {{-- APPEND Warning --}}
          </div>
        </div>
            
        <div class="alert danger" id="edit_failure">
          <span class="closebtn">&times;</span>
          <strong>Danger!</strong> There were some problems with your given inputs.
          <div id="insert-dangers">
              {{-- APPEND Warning --}}
          </div>
        </div>
        
            <div>
              <form id="insert-user-form">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Full Name">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email Address">
                
                <label for="contact">Contact No</label>
                <input type="number" id="contact" name="contact" placeholder="Contact No">

                <label for="role">Role</label>
                <select id="role" name="role">
                  <option value="0">SUPER ADMIN</option>
                  <option value="1">PRINCIPAL</option>
                  <option value="2">HOD</option>
                  <option value="3">OFFICER</option>
                </select>
                
                <div id="deptNo">
                    <label for="dept">Department No</label>
                    <input type="number" id="deptNum" name="deptNum" placeholder="Department No">
                </div>
                
                
                <!-- <label for="institute">Institute No</label> -->
                <input type="hidden" id="instituteNum" name="instituteNum" placeholder="Institute No" value="28">
                
                <label for="password">New password</label>
                <input type="password" id="newPassword" name="password" placeholder="new password" value="">
                
                <label for="password">Retype password</label>
                <input type="password" id="newPassword2" name="password2" placeholder="re-type password" value="">
              
                <input id="insertUserBtn" type="submit" value="Insert User">
              </form>
            </div>
            
        </div>
        <div class="modal-footer">
          <h3>Click 'Insert' to comfirm your update</h3>
        </div>
      </div>

    </div>
        
        
    

@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/manageUsers.js') }}"></script>
@endsection