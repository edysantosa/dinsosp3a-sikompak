require('./app');
require('./datatables');
import toastr from '../adminlte/plugins/toastr/toastr.min.js';
import bootbox from 'bootbox';
var datatable;

$(document).ready(function() {
    datatable = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 1000,
        // ajax: "users",
        ajax: {
        url: 'users',
        error: function (xhr, ajaxOptions, thrownError) {
            if (xhr.status == 401 || xhr.status == 403) {
                    location.reload();
                } else {
                    toastr.error(thrownError);
                }
            }
        },
        order: [[1, 'desc']],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', sortable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {name:'action', data:null, sortable:false, searchable: false, className:'text-center', render: function(cellData, type, rowData) {
            return `
                <div class="btn-group">
                <button type="button" class="btn btn-warning trigger" data-trigger="edit"> <i class="fas fa-pencil-alt"></i> </button>
                <button type="button" class="btn btn-danger trigger" data-trigger="delete"> <i class="fas fa-times"></i> </button>
                </div>
            `;
            }},
        ],
    });
}).on('click', '.trigger', function(e){
    // let current_row = $(this).parents('tr');
    // if (current_row.hasClass('child')) {
    //     current_row = current_row.prev();
    // }
    // let id = current_row.attr('id');

    let id = $(this).parents('tr').attr('id');
    let $button = $(this);
    
    switch($(this).data('trigger')) {
      case 'delete':
        bootbox.confirm({
            message: 'Yakin hapus data user ini?',
            locale: 'id',
            callback: function (result) {
                if (result) {
                    $.ajax({
                        url : `users/${id}`,
                        type : 'delete',
                        dataType : 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            $button.parent().find('button').prop('disabled', true);
                            $button.html('<i class="fas fa-spin fa-circle-notch"></i>');
                        },
                        complete: function() {
                        },
                    }).fail(function(xhr, status, statusText){
                        var message = "Unknown error has occured";
                        if( xhr.responseJSON ){
                            message = xhr.responseJSON.message;
                        }
                        bootbox.alert(message);
                    }).done(function(response){
                        datatable.draw();
                    });
                }
            }
        });  
        break;
      case 'edit':
        location.href = 'users/' + id;
        break;
    }  
});
