$(document).ready(function () {
    /* my jQuery functions library */
    $.fn.ajaxConfig = function () { // ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
           }
        });
    };
    
    $.fn.dataNotFound = function () {
        let output = `<tr class="msg_row">
            <td colspan='3'>No Message Found</td>
        </tr>`;
        $('#messagesBody').html(output);
    }
    
    $.fn.displayRow = function ({id, name, msg}) {
        let row = `<tr class="msg_row">
            <td>${id}</td>
            <td>${name}</td>
            <td>
                <p> ${msg} </p>
            </td>
        </tr>`;
        $('#messagesBody').append(row);
    };
    
    $.fn.getMessagesList = function () {
        $.ajax({
            url: 'contact-messages-s/',
            type: 'GET',
            dataType: 'json',
            success: function (res) { // console.log(res);
                let len = res.length;
                // len = 0;
                if (len === 0) {

                    $.fn.dataNotFound();

                } else if (res.length > 0) {
                    
                    for (let i = 0; i < len; ++i) {
                        let row = {
                            id: res[i].id,
                            name: res[i].name,
                            msg: res[i].message
                        };
                        $.fn.displayRow(row);
                    }
                }
                $('#row_count').html(len);
            },
            error: function (err) {
                console.log(err);
            }
        });
    };
    
    /* End of functions library */
    $.fn.ajaxConfig();
    
    var row = {
        id: 10,
        name: 'Jane' ,
        msg: 'this is long lasting message that is created inside jQuery function'
    };
    
    // $.fn.displayRow(row);
    
    $.fn.getMessagesList();
    
}); // DOMLoaded