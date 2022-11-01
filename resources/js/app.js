// Include2 semua script bawaan template disini
import store from 'store';

try {
    require('./bootstrap');
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js/dist/umd/popper.js').default;
    require('bootstrap');
    require ('../adminlte/dist/js/adminlte.min.js');
} catch (e) {}

$(document).ready(function() {
    // Buat menu parent active dan terbuka kalau submenunya active
    let parentMenu = $('.nav-item .nav-treeview .nav-item .nav-link.active').parents('.nav-item.has-submenu');
    for (var i = parentMenu.length - 1; i >= 0; i--) {
        $(parentMenu[i]).addClass('menu-is-opening menu-open');
        $(parentMenu[i]).find('.nav-link').first().addClass('active');
    }

    // Simpan status menu collapsed
    $(document).on('collapsed.lte.pushmenu', '[data-widget="pushmenu"]', function () {
        store.set('sidebar' , 0);
        console.log(store.get('sidebar'));
    });
    $(document).on('shown.lte.pushmenu', '[data-widget="pushmenu"]', function () {
        store.set('sidebar' , 1);
        console.log(store.get('sidebar'));
    });
    if (store.get('sidebar' , null) == 0) {
        $('[data-widget="pushmenu"]').PushMenu('collapse');
    }
});