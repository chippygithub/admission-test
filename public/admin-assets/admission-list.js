
$(document).ready(function() {
    var  table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: ADMISSION_LIST_URL,
        columns: [
            {
                data: 'DT_RowIndex', 'searchable': false ,
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
               
            },
            {
                data: 'email',
                name: 'email'
            },
           
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {

                data: 'status',
                render: function(data, type, full) {

                    var url = ADMISSION_DETAIL_URL.replace(':id', full.id);
                    return '<a href="'+url+'" >Detail</a>'

                }
            },


           
        ]
    });

    

});







