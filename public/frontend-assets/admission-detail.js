$(document).on('click', '#js-status-check-btn', function() {
    var button = $(this);
    var email = $('#email').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
    $.ajax({
        url: STATUS_CHECK_URL,
        type: 'POST',
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({
            'email': email
        }),

        success: function(response) {
            $('#js-error-msg').html('');
            if (response.success == true) {
                console.log(response.result)
                $('#js-data-block').show();
               var data = response.result;
                $('#js-name').html(data.name);
                $('#js-email').html(data.email);
                $('#js-address').html(data.address);
                if(data.status == 1){
                    $('#js-admission-status').html('Admitted');
                    if(data.is_free_bus_fair == 1){
                    $('#js-bus-fair').html('YES');
                     }else{
                        $('#js-bus-fair').html('NO');

                     }
                }else{
                    $('#js-admission-status').html('Not Admitted');
                    $('#js-bus-fair').html('NA');
                }
                

            } else {
                $('#js-error-msg').html(response.result)
            }

        },
        error: function(response) {

            console.log(response.result);
        }
    });


});