import axios from 'axios';
import Vue from 'vue';

window.Vue = require('vue');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
$.extend( true, $.fn.dataTable.defaults, {
    "language": {
        "paginate": {
            "previous": "Anterior",
            "next": "Siguiente",
        },
//            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
        "info": "Registros del _START_ al _END_  de un total de _TOTAL_",
        "search": "Buscar",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "infoEmpty": "Mostrando registros del 0 al 0",
        "emptyTable": "No hay datos disponibles en la tabla",
        "infoFiltered": "(Filtrando para _MAX_ Registros totales)",
        "zeroRecords": "No se encontraron registros coincidentes",
    }
});

/*-- Función para recargar datatables --*/
function recargarTabla(tabla){
    $('#' + tabla).dataTable()._fnAjaxUpdate();
};

// Funciones globales para vue js
Vue.mixin({
  data: function() {
    return {
      get required() {
        return 0;
      }
    }
  },
  methods: {
    showError: function(error) {
         me.listErrors = '';
        if (error.response.status === 422) {
            console.log(error.response.data);
            me.formErrors = error.response.data;
        }
        $.each(me.formErrors, function (key, value) {
            $('#p-' + key).addClass('has-error');
            $('.result-' + key).html(value);
        });
    },
    formatPrice(value) {
        let val = (value/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }
  }
})