// Include2 semua script bawaan template disini
try {
    require('./bootstrap');
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js/dist/umd/popper.js').default;
    require('bootstrap');
    require ('../adminlte/dist/js/adminlte.min.js');
    require ('../adminlte/dist/js/demo.js');

    require( 'datatables.net-bs4' )( window, $ );
    require( 'datatables.net-responsive-bs4' )( window, $ );
    require( 'datatables.net-select-bs4' )( window, $ );
    require( 'datatables.net-buttons-bs4' )( window, $ );
} catch (e) {}
