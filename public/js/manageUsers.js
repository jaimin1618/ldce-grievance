$(document).ready(() => {
    var SHOW_ID;
    var DELETE_ID;
    var EDIT_ID;
    var PROFILE_IMAGE_URL = 'http://127.0.0.1:8000/';
    
    $.ajaxSetup({ // AJAX SETUP FOR CSRF;
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
       }
    });
    
    // My jQuery functions lib
    $.fn.roleIdentifier = (role) => {
        if (role === '0') {
            return "SUPER ADMIN";
        } else if (role === '1') {
            return "PRINCIPAL";
        } else if (role === '2') {
            return "HOD";
        } else if (role === '3') {
            return "OFFICER";
        } else if (role === '4') {
            return "STUDENT";
        } else {
            return "-";
        }
    }

    $.fn.appendNewRow = (user) => {
        let role = $.fn.roleIdentifier(user.role);
        let output = `
        <tr class="tr">
           <td class="td">${user.name}</td>
           <td class="td">${user.email}</td>
           <td class="td">${role}</td>
           <td class="td"><button class="button button_view" data-id="${user.id}">View</button></td>
           <td class="td"><button class="button button_edit" data-id="${user.id}">Edit</button></td>
           <td class="td"><button class="button button_delete" data-id="${user.id}">Delete</button></td>
        </tr>`
        
        $('#user-tbody').append(output);
    }
    
    $.fn.appendNullRow = () => {
        let output = `
        <tr class=tr>
            <td colspan=6>No Users Found</td>
        </tr>
        `;
        $('#user-tbody').append(output);
    }
    
    $.fn.getUsersData = (id = -1) => {
        $.ajax({
            url: 'manage-users/all-users/',
            type: 'GET',
            dataType: 'json',
            success: (data) => { // console.log(data);
                let cnt = data.length;
                if (cnt > 0) {
                    data.forEach((item, i) => {
                        
                        $.fn.appendNewRow(item);
                        
                    });
                } else if (cnt == undefined || cnt <= 0) {
                    $.fn.appendNullRow();
                }
            }
        });
    }
    $.fn.getUsersData();
    
    
    // EXTRA JQUERY CODE AND EVENTS;
    
    // ON-CLICK-VIEW-BUTTON
    $('#users_table').on('click', '.button_view', (e) => {
        let id = e.target.dataset.id;
        
        $.ajax({
            url: `manage-users/show-user/${id}`,
            type: 'GET',
            dataType: 'json',
            success: (data) => { // console.log(data);
                $('#viewModal #img').attr('src', PROFILE_IMAGE_URL + data.profile_pic);
                $('#viewModal #name').html(data.name);
                $('#viewModal #email').html(data.email);
                $('#viewModal #dept').html(data.department);
                $('#viewModal #role').html($.fn.roleIdentifier(data.role));
                $('#viewModal #number').html(data.contact);
                $('#viewModal #institute').html(data.institute);
                $('#viewModal #last_updt').html(data.updated_at);
                $('#viewModal').css('display', 'block');
            }
        });
    }); //
    
    
    // ON-CLICK-DELETE-BUTTON
    $('#users_table').on('click', '.button_delete', (e) => {
        DELETE_ID = e.target.dataset.id;
        $('#delModal').css('display', 'block');

    });
    
    $('#cancelBtn').on('click', () => {
        $('.modal').css('display', 'none');
    });
    
    $('#deleteUserBtn').on('click', () => {
        let id = DELETE_ID;
        $.ajax({
            url: `manage-users/delete-user/${id}`,
            type: 'POST',
            dataType: 'json',
            success: (data) => {
                if (data.status == 1) {
                    $('#delModal #delete_success').css('display', 'block');
                    setTimeout(() => {
                        $('#delModal #delete_success').fadeOut('slow');
                    }, 3000);
                    
                    $('#user-tbody').empty();
                    $.fn.getUsersData();
                    
                } else if (data.status == 0) {
                    $('#delModal #delete_failure').css('display', 'block');
                    setTimeout(() => {
                        $('#delModal #delete_failure').fadeOut('slow');
                    }, 3000);
                    
                }
            },
            complete: () => {
                setTimeout(() => {
                    $('#delModal').css('display', 'none');
                }, 1000);
            }
        });
    }); //
    

    
    // ON-CLICK-EDIT-BUTTON
    $('#users_table').on('click', '.button_edit', (e) => {
        EDIT_ID = e.target.dataset.id;
        let id = EDIT_ID;
        
        $.ajax({
            url: `manage-users/show-user/${id}`,
            type: 'GET',
            dataType: 'json',
            success: (data) => { // console.log(data);
                $('#edit-user-form #name').val(data.name);
                $('#edit-user-form #email').val(data.email);
                $('#edit-user-form #contact').val(data.contact);
                $('#edit-user-form #role').val(data.role);
                if (data.role == 2) {
                    $('#deptNo').css('display', 'block');
                    $('#edit-user-form #deptNum').val(data.department);
                } else {
                    $('#deptNo').css('display', 'none');
                }
                $('#edit-user-form #instituteNum').val(data.institute);
                $('#editUserModal').css('display', 'block');
            }
        });
        
    });
    
    $('#editUserBtn').on('click', (e) => { e.preventDefault();
        let id = EDIT_ID;
        name = $('#edit-user-form #name').val();
        email = $('#edit-user-form #email').val();
        contact = $('#edit-user-form #contact').val();
        role = $('#edit-user-form #role').val();
        deptNum = $('#edit-user-form #deptNum').val();
        instituteNum = $('#edit-user-form #instituteNum').val();
        password = $('#newPassword').val();
        passowrd2 = $('#newPassword2').val();
        
        /*
        if (role == 2) {
            $('#deptNo').css('display', 'block');
        }
        */
        
        /* sanitization and filtering */
        let msg = [];
        $('#warnings').empty();
        if (name == '') {
            msg.push('Please enter full name');
        } if (email == '') {
            msg.push('Please enter email');
        } if (contact == '') {
            msg.push('Please enter contact number');
        } if (role == 2 && deptNum == '') {
            msg.push('Please enter department number');
        } if (instituteNum == '') {
            msg.push('Please enter institute number');
        } if (password != passowrd2) {
            msg.push('Password and Re-type passowrd both must match');
        }
        
        if (msg.length > 0) {
            msg.forEach((msg, i) => {
                let output = `<small class='msg'>${msg}</small><br>`;
                $('#edit_warning #warnings').append(output);
            });
            
            $('#edit_warning').css('display', 'block');
            setTimeout(() => {
                $('#edit_warning').fadeOut('slow');
            }, 10000);
            
            msg = [];
            
        } else {
            $.ajax({
                url: 'manage-users/edit-user/',
                type: 'POST',
                data: {
                    'id': id,
                    'name': name,
                    'email': email,
                    'contact': contact,
                    'role': role,
                    'deptNum': deptNum,
                    'instituteNum': instituteNum,
                    'password': password
                },
                dataType: 'json',
                success: (data) => { // console.log(data);
                    
                    if (data.status === 1) {
                        $('#editUserModal #edit_success').css('display', 'block');
                        setTimeout(() => {
                            $('#editUserModal #edit_success').fadeOut('slow');
                        }, 5000);
                    } else {
                        $('#editUserModal #edit_failure').css('display', 'block');
                        setTimeout(() => {
                            $('#editUserModal #edit_failure').fadeOut('slow');
                        }, 10000);
                    }
                },
                complete: () => {
                    $('#user-tbody').empty();
                    $.fn.getUsersData();
                },
                error: (err) => { 
                    console.log(err);
                    
                    $('#dangers').empty();
                    if (err.status != 200) {
                        let errors = err.responseJSON.errors;
                        for (let err in errors) {
                            for (let er of errors[err]) {
                                
                                let output = `<small> ${er} </small><br />`;
                                $('#dangers').append(output);
                                
                            }
                        }
                        $('#editUserModal #edit_failure').css('display', 'block');
                        $('#dangers').css('display', 'block');
                    }
                    
                    setTimeout(() => {
                        $('#editUserModal #edit_failure').fadeOut('slow');
                    }, 10000);
                }
            })
        }
        
    });

    /* ON INSERT BUTTON CLICK */
    $('#insert-user-modal').on('click', () => {
        $('#insertUserModal').css('display', 'block');
    });  
    
    /* ON INSERT FORM BUTTON CLICK */
    $('#insertUserBtn').on('click', (e) => { e.preventDefault();
        name = $('#insert-user-form #name').val();
        email = $('#insert-user-form #email').val();
        contact = $('#insert-user-form #contact').val();
        role = $('#insert-user-form #role').val();
        deptNum = $('#insert-user-form #deptNum').val();
        instituteNum = $('#insert-user-form #instituteNum').val();
        password = $('#insert-user-form #newPassword').val();
        passowrd2 = $('#insert-user-form #newPassword2').val();

        let msg = [];
        $('#insert-user-form #warnings').empty();
        if (name == '') {
            msg.push('Please enter full name');
        } if (email == '') {
            msg.push('Please enter email');
        } if (contact == '') {
            msg.push('Please enter contact number');
        } if (role == 2 && deptNum == '') {
            msg.push('Please enter department number');
        } if (instituteNum == '') {
            msg.push('Please enter institute number');
        } if (password != passowrd2) {
            msg.push('Password and Re-type passowrd both must match');
        }
        
        if (msg.length > 0) {
            msg.forEach((msg, i) => {
                let output = `<small class='msg'>${msg}</small><br>`;
                $('#insertUserModal #edit_warning #warnings').append(output);
            });
            
            $('#insertUserModal #edit_warning').css('display', 'block');
            setTimeout(() => {
                $('#insertUserModal #edit_warning').fadeOut('slow');
            }, 10000);
            msg = [];
        } else {
            $.ajax({
                url: 'manage-users/add-user/',
                type: 'POST',
                data: {
                    'name': name,
                    'email': email,
                    'contact': contact,
                    'role': role,
                    'deptNum': deptNum,
                    'instituteNum': instituteNum,
                    'password': password
                },
                dataType: 'json',
                success: (data) => {  // console.log(data.status);
                    if (data.status == 2) {
                        let out = "<small>User already exists</small><br>";
                        $('#insert-dangers').append(out);
                        $('#insertUserModal #edit_failure').css('display', 'block');

                    } else if (data.status == 1) {
                        $('#insertUserModal #edit_success').css('display', 'block');
                        setTimeout(() => {

                            $('#insertUserModal #edit_success').fadeOut('slow');

                        }, 10000);
                    }
                },
                complete: () => {
                    $('#user-tbody').empty();
                    $.fn.getUsersData();
                    $('#insert-user-form #name').val("");
                    $('#insert-user-form #email').val("");
                    $('#insert-user-form #contact').val("");
                    $('#insert-user-form #role').val("");
                    $('#insert-user-form #deptNum').val("");
                    $('#insert-user-form #instituteNum').val("");
                    $('#insert-user-form #newPassword').val("");
                    $('#insert-user-form #newPassword2').val("");
                },
                error: (err) => { // console.log(err);
                    
                    if (err.status != 200) {
                        let errors = err.responseJSON.errors;
                        console.log(errors);
                        for (let err in errors) {
                            for (let er of errors[err]) {
                                let output = `<small> ${er} </small><br />`;
                                $('#insert-dangers').append(output);
                            }
                        }
                        $('#insertUserModal #edit_failure').css('display', 'block');
                    }
                    
                    setTimeout(() => {
                        $('#insertUserModal #edit_failure').fadeOut('slow');
                    }, 10000);
                    setTimeout(() => {
                        $('#insert-dangers').empty();
                    }, 10000);
                }
            })
        }
    });

    
    $('#edit-user-form #role').on('change', () => {
        let selected = $('#edit-user-form #role')[0].selectedIndex;
        
        if (selected == 2) {
            $('#deptNo').css('display', 'block');
        } else {
            $('#deptNo').css('display', 'none');
        }
    });

    $('#insert-user-form #role').on('change', () => {
        let selected = $('#insert-user-form #role')[0].selectedIndex;
        
        if (selected == 2) {
            $('#insert-user-form #deptNo').css('display', 'block');
        } else {
            $('#insert-user-form #deptNo').css('display', 'none');
        }
    });
    
    
    
    $('.close').on('click', () => {
        $('.modal').css('display', 'none');
    });
    
    $(window).on('click', (e) => {
        if (e.target.className === 'modal') {
            $('.modal').css('display', 'none');
        }
    });
    
    $('.closebtn').on('click', (e) => {
        e.target.parentNode.style.display = 'none';
    })

    
});