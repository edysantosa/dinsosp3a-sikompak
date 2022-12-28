require('./app');
require('./datatables');
import toastr from '../adminlte/plugins/toastr/toastr.min.js';
import bootbox from 'bootbox';
import datatableId from 'datatables.net-plugins/i18n/id.json';
import select2 from '../adminlte/plugins/select2/js/select2.full.min.js';
var datatable;

$(document).ready(function() {
    datatable = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        // searchDelay: 1000,
        ajax: {
            url: 'pmks',
            data: function (d) {
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
                    }
                });
            },
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
        }
    });
}).on('click', '#btn-search', function(e){
    datatable.draw();
}).on('click', '#btn-search-undo', function(e){
    $(':input').not(':button, :submit, :reset, :hidden, .select2')
    .removeAttr('checked')
    .removeAttr('selected')
    .not(':checkbox, :radio, select, .select2')
    .val('');
    $('.select2').val(null).trigger('change');
}).on('click', '.trigger', function(e){

});

//Initialize Select2 Elements
$('.select2').select2({
  theme: 'bootstrap4'
})