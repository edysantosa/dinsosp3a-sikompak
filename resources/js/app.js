// Include2 semua script bawaan template disini
try {
    require('./bootstrap');
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js/dist/umd/popper.js').default;
    require('bootstrap');
    require ('../adminlte/dist/js/adminlte.min.js');
} catch (e) {}
