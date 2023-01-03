import URI from 'urijs';

// export default Helper;
export function getSelectedDataTable(datatable, column){

    var data = datatable.rows({selected:  true}).data();
    var result=[];       
    for (var i = 0; i < data.length; i++) {
        result.push(data[i][column]);
    }
     
    return result;
}

// Cek apakah form kosong atau tidak
export function isFormEmpty(form){
    let empty = true;
    $(form).find(":text, :file, :checkbox, select, textarea").each(function() {
        var $element = $(this);
        if ($element.is(':text')) {
            if ($element.hasClass('multiselect-search')) {
            } else {
                if($element.val())
                    empty = false;
            }
        } else if ($element.is(':checkbox')) {
            if ($element.prop('checked') == true)
                empty = false;            
        } else if ($element.is('select')) {
            if ($element.val().length != 0)
                empty = false;          
        }
    });

    return empty;
}

export function formatNumberIndonesia(n) {
    // format number 1000000 to 1,234,567
    if(n == null || typeof n == 'undefined') {
        return 0;
    }
    return parseFloat(n).toLocaleString('id-ID');
}

// Masukkan data form filter ke url
export function fillFormFromUri() {
    let currentUri = new URI();
    let uris = URI.parseQuery(currentUri.query());
    for(let name in uris){
        if ($('select[name="'+name+'"]').prop('type') == 'select-multiple') {
            if(Array.isArray(uris[name])){
                for(let i in uris[name]){
                    $('select[name="'+name+'"] option[value="'+uris[name][i]+'"]').prop('selected', true);
                }
            }else{
                $('select[name="'+name+'"] option[value="'+uris[name]+'"]').prop('selected', true);
            }
            $('select[name="'+name+'"]').trigger('change');
        } else if ($('select[name="'+name+'"]').prop('type') == 'select-one') {
            $('select[name="'+name+'"] option[value="'+uris[name]+'"]').prop('selected', true).trigger('change');
        } else if($('input[name="'+name+'"]').length){
            $('input[name="'+name+'"]').val(uris[name]);
        }
    }
    return {
        'uris': uris,
        'currentUri': currentUri
    };
}