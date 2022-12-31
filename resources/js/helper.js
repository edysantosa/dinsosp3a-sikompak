
// export default Helper;

export function getSelectedDataTable(datatable, column){

    var data = datatable.rows({selected:  true}).data();
    var result=[];       
    for (var i = 0; i < data.length; i++) {
        result.push(data[i][column]);
    }
     
    return result;
}

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