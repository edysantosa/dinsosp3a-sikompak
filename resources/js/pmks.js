require('./app');
require('./datatables');
import toastr from '../adminlte/plugins/toastr/toastr.min.js';
import bootbox from 'bootbox';
import datatableId from 'datatables.net-plugins/i18n/id.json';
import select2 from '../adminlte/plugins/select2/js/select2.full.min.js';
import * as helper from './helper';
var datatable;
import URI from 'urijs';

// Masukkan data form filter ke url
let uriHelper = helper.fillFormFromUri();
var uris = uriHelper.uris;
var currentUri = uriHelper.currentUri;

$(document).ready(function() {
    // Inisialiasi datatable
    datatable = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        // searchDelay: 1000,
        ajax: {
            url: 'pmks',
            data: function (d) {
                currentUri.search("");
                let uris = [];
                $('form#form-search').find('.form-control, .form-check-input').each(function(index, element){
                    let elm = $(element),
                        type = elm.attr('type'),
                        name = elm.attr('name') || "",
                        value = elm.val() || "",
                        checked = elm.prop("checked");

                    if ((name.length > 0 && value.length > 0) && value != 0 && type != "checkbox" || (type == "checkbox" && checked)) {
                        if (name == 'date') {
                            d['date'] = elm.data('daterangepicker').startDate.format('YYYY-MM-DD');
                        } else {
                            d[name] = value;
                        }
                        uris[name] = d[name];
                    }
                });

                // Masukkan parameter ke uri
                currentUri.setQuery(uris);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                if (xhr.status == 401 || xhr.status == 403) {
                    location.reload();
                } else {
                    toastr.error(thrownError);
                }
            }
        },
        order: [[1, 'asc']],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', sortable: false, searchable: false},
            {data: 'nama', name: 'nama'},
            {data: 'kabupaten_kota.nama', name: 'kabupaten_kota', sortable:false, searchable: false},
            {data: 'alamat', name: 'alamat', sortable:false, searchable: false},
            {data: 'jenis_pmks', name: 'jenis_pmks', sortable:false, searchable: false, render: function(cellData, type, rowData) {
                return cellData.map(x => x.nama).join(', ');
            }},
            {name:'action', data:null, sortable:false, searchable: false, className:'text-center', render: function(cellData, type, rowData) {
            return `
                <div class="btn-group">
                <button type="button" class="btn btn-warning trigger" data-trigger="edit"> <i class="fas fa-pencil-alt"></i> </button>
                <button type="button" class="btn btn-danger trigger" data-trigger="delete"> <i class="fas fa-times"></i> </button>
                </div>
            `;
            }},
        ],
        language: datatableId,
        processing: true,
        search: {return: true},
        serverSide: true,
        preDrawCallback: function( settings ) {
            $("#form-search :input").prop("disabled", true);
        },
        drawCallback: function( settings ) {
            $("#form-search :input").prop("disabled", false);

            // Masukkan parameter pencarian ke alamat browser
            window.history.pushState({}, 'Sikompak', currentUri.toString());
        }
    });
    
    // Uncollapese filter kalau ada valuenya
    if (!helper.isFormEmpty('#form-search')) {
        $('#search-card').CardWidget('expand');
    } else {
        $('#search-card').CardWidget('collapse');
    }

    //Initialize Select2 Elements
    $('.select2').select2({
        theme: 'bootstrap4'
    })
}).on('click', '#btn-search-undo', function(e){
    $(':input').not(':button, :submit, :reset, :hidden, .select2')
    .removeAttr('checked')
    .removeAttr('selected')
    .not(':checkbox, :radio, select, .select2')
    .val('');
    $('.select2').val(null).trigger('change');
    datatable.draw();
}).on('click', '#btn-search', function(e){
    datatable.draw();
}).on('click', '.trigger', function(e){
    let id = $(this).parents('tr').attr('id');
    let $button = $(this);
    
    switch($(this).data('trigger')) {
      case 'delete':
        bootbox.confirm({
            message: 'Yakin hapus data PMKS ini?',
            locale: 'id',
            callback: function (result) {
                if (result) {
                    $.ajax({
                        url : `pmks/${id}`,
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
        location.href = `pmks/${id}/edit`;
        break;
    }  
});
