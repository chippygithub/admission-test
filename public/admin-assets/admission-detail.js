$(document).ready(function() {

    
    

});

$(document).on('click', '#js-btn-admit', function() {
    var button = $(this);
    var id = $(this).data('id');
    var content_type = $(this).data('type');
    var confirmation = confirm("Are you sure you want to admit?");
    if (confirmation) {
        var admissionId = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        $.ajax({
            url: ADMIT_URL.replace(':id', id),
            type: 'POST',
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
              if(response == true){
                alert('admitted successfully')
                window.location.reload();

              }else{
                alert('something went wrong')

              }

            },
            error: function(response) {

                console.log(response);
            }
        });
    }

});











