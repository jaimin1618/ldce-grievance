/* GLOBAL VARS */
var deleteThisId;
var editThisDeptId;
var DeptDataForEdit = {};
var editThisId;
//

// Navbar responsiveness script
function responsiveNavBar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
//

$(document).ready(function () {


    // AJAX SETUP FOR CSRF;
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
       }
    });

/* GETTING DATA FROM SERVER */
    fetchRecords();
    function fetchRecords(id = 0) {

        $.ajax({
            type: 'GET',
            url: `get_data/${id}`,
            dataType: 'json',
            success: function (response) {
                /*
                    NOTE: UNCOMMENT FOR RESPONSE TEXT
                    console.log(response);
                */

                var len;
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    for (let i = 0; i < len; ++i) {
                        let dept = {
                            id: response['data'][i].id,
                            deptId: response['data'][i].department_id,
                            deptName: response['data'][i].department_name
                        }

                        /* This function is rendering response on window */
                        displayRecord(dept);
                    }
                } else if (len == 0) {
                    $tbody.append(`<tr> <td colspan=4> NO DATA FOUND </td> </tr>`);
                }
            },

            error: function (e) {
                console.log(e);
            }
        });

    }

    function ajaxRequestForDeptData ({deptId, deptName}) {

        // "csrf-token": "{{ csrf_token() }}",
        $.ajax({
            url: "department/add-dept",
            type: 'POST',
            data: {
                "id": deptId,
                "name": deptName
            },
            success: function (response) {
                /*
                    NOTE: console.log(response.status); UNCOMMENT FOR ERROR/REVIEW
                */
                if (response.status == 1) {
                    $('#myModal .success').css('display', 'block');
                    setTimeout(function () {
                        $('#myModal .success').fadeOut('slow');
                    }, 3000);

                    let dept = {
                        deptId: deptId,
                        deptName: deptName
                    };

                    displayRecord(dept);

                } else if (response.status == 2) {
                    $('#myModal .danger').css('display', 'block');
                    setTimeout(function () {
                        $('#myModal .danger').fadeOut('slow');
                    }, 3000);
                }
            },
            error: function (e) {
                var error = JSON.parse(e.responseText);
                console.log(error['message']);
            }
        }); // ajax

    } // ajaxRequestForDeptData;


/* INSERT NEW DEPARTMENT FORM SCRIPTS */
    // console.log("Form Insert");

    // MODAL DISPLAYING SCRIPT
    var $modal = $('#myModal');
    var $modalBtn = $('#insert-modal');

    $('.close').click(function () {
        $modal.css('display', 'none');
    });

    $modalBtn.click(function () {
        $modal.css('display', 'block');
    });

    $(window).click(function (e) {
        if (e.target.className == 'modal') {
            $modal.css('display', 'none');
        }
    });

    $('.closebtn').click(function () {
        var div = this.parentElement;
        setTimeout(function () {
            div.style.display = "none";
        }, 600);
    });

    // INSERTING NEW DEPARTMENT BUTTON
    $("#insertDept").click(function (e) { e.preventDefault();

        let dept = {
            deptId: $("#deptId").val(),
            deptName: $("#deptName").val().toUpperCase()
        }

        // Data sanitization;
        var msg = '';
        if (dept.deptId == '' && dept.deptName == '') {
            msg = 'Please Fill Department ID And Department Name';
        } else if (dept.deptId == '') {
            msg = 'Please Fill Department ID';
        } else if (dept.deptName == '') {
            msg = 'Please Fill Department Name';
        }

        if (msg != '') {

            $('#myModal .warning').css('display', 'block');
            $('#msg').html(msg);
            setTimeout(function () {
                $('#myModal .warning').fadeOut('slow');
            }, 3000);

        } else {
            ajaxRequestForDeptData(dept);

        } // else close
    }); // button

    /* DELETE DEPARTMENT SCRIPTS */
    $(window).click(function (e) {
        if (e.target.className == 'modal') {
            $('#delModal').css('display', 'none');
        }
    });

    $('#cancelBtn').click(function () {
        $('#delModal').css('display', 'none');
    });

    $('.close').click(function () {
        $('#delModal').css('display', 'none');
    });

    $('#deleteDeptBtn').click(function () {
        let id = deleteThisId;
        // console.log("you clicked: " + id);

        $.ajax({
            url: `department/delete-dept/`,
            type: 'POST',
            data: {
                'id': id
            },
            success: function (response) { // console.log(response);
                if (response.status == 1) {

                    $('#deletedDeptId').html(id);
                    $('#delete_success').css('display', 'block');
                    setTimeout(function () {
                        $('#delete_success').fadeOut('slow');
                    }, 3000);

                    // NOTE: refresh...
                    $('#tbody').empty();
                    fetchRecords();
                    setTimeout(function () {
                        $('#delModal').fadeOut('slow');
                    }, 4000);

                } else if (response.status == 0) {

                    $('#delete_failure').css('display', 'block');
                    setTimeout(function () {
                        $('#delete_failure').fadeOut('slow');
                    }, 3000);

                }

            },
            error: function (error) {
                console.log("ERROR: ");
                console.error(error);
            }
        }); // ajax

    }); // deleteDeptBtn button clicked

    /* UPDATE DEPARTMEMT BUTTON CLICKED */
    $(window).click(function (e) {
        if (e.target.className == 'modal') {
            $('#editModal').css('display', 'none');
        }
    });

    $('.close').click(function () {
        $('#editModal').css('display', 'none');
    });

    $('#editDeptBtn').click(function (e) { e.preventDefault();
        id = $('#p-key').val();
        newDeptId = $('#editDeptId').val();
        newDeptName = $('#editDeptName').val().toUpperCase();

        let msg = '';
        if (newDeptId == '' && newDeptName == '') {
            msg = 'Please Fill Department ID And Department Name';
        } else if (newDeptId == '') {
            msg = 'Please Fill Department ID';
        } else if (newDeptName == '') {
            msg = 'Please Fill Department Name';
        }

        if (msg != '') {

            $('#editmsg').html(msg);
            $('#edit_warning').css('display', 'block');
            setTimeout(function () {
                $('#edit_warning').fadeOut('slow');
            }, 3000);

        } else {

            $.ajax({
                url: 'department/edit-dept/',
                type: 'POST',
                data: {
                    'id': id,
                    'deptId': newDeptId,
                    'name': newDeptName
                },
                success: function (response) { // console.log(response);
                    status = response.status;
                    if (status == 1) {
                        $('#edit_success').css('display', 'block');
                        setTimeout(function () {
                            $('#edit_success').fadeOut('slow');
                        }, 3000);

                        setTimeout(function () {
                            $('#editModal').fadeOut('slow');
                        }, 4000);

                        // NOTE: refresh ...
                        $('#tbody').empty();
                        fetchRecords();

                    } else if (status == 0) {
                        $('#edit_failed').css('display', 'block');
                        setTimeout(function () {
                            $('#edit_failed').fadeOut('slow');
                        }, 3000);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            }); // ajax call

        }

    }); // edit button clicked


}); // DOMContentLoaded

function displayRecord({ deptId, deptName }) {
    var $tbody = $('#tbody');
    $tbody.append(
        `<tr class="trow">
            <td> ${ deptId } </td>
            <td> ${ deptName } </td>
            <td>
                <input class="edit ebutton" type="button" name="edit" value="Edit" data-id="${ deptId }" onclick="editDeptModal(${ deptId });">
            </td>
            <td>
                <input class="delete dbutton" type="button" name="delete" value="Delete" data-id="${ deptId }" onclick="deleteDeptModal(${ deptId });">
            </td>
        </tr>`
    );
}

function deleteDeptModal (id) { // console.log("deleteing: " + id);
    deleteThisId = id;
    var $delModal = $('#delModal');
    $delModal.css('display', 'block');



} // function: deleteDept


function editDeptModal (id) {
    editThisDeptId = id;

    $.get({
        url: `get_data/${id}`,
        dataType: 'json'
    }, function () { // console.log("request sent...");
    }).done(function (response) { // console.log(response.data);
        editThisId = response.data.id;

        // show data
        $('#p-key').val(response.data.id);
        $('#editDeptId').val(response.data.department_id);
        $('#editDeptName').val(response.data.department_name);

    }).fail(function (error) {
        console.log(error);
    })

    var $editModal = $('#editModal');
    $editModal.css('display', 'block');

} // function: editDept
