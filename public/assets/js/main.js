$.extend( true, $.fn.dataTable.defaults, {
    "language": {
        "paginate": {
            "previous": "Anterior",
            "next": "Siguiente",
        },
        // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
        "sProcessing":     "Procesando...",
        "info": "Registros del _START_ al _END_  de un total de _TOTAL_",
        "search": "Buscar",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "infoEmpty": "Mostrando registros del 0 al 0",
        "emptyTable": "No hay datos disponibles en la tabla",
        "infoFiltered": "(Filtrando para _MAX_ Registros totales)",
        "zeroRecords": "No se encontraron registros coincidentes",
        "sLoadingRecords": "Cargando...",
    }
});

/*-- Función para recargar datatables --*/
function recargarTabla(tabla){
    $('#' + tabla).dataTable()._fnAjaxUpdate();
};
/*-- Función para pasar el id de jQuery  a vue para eliminarlo --*/
// function eliminar(id,logical){
//     var data =
//     {
//         id:id,
//         logical:logical
//     };
//     objVue.delete(data);    
// }
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
    formatPrice(value) {
        let val = (value/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
    }
  }
})