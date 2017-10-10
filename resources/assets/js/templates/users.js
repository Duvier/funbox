/* FUNCIONES DE JQUERY */
$(document).ready(function () {
    $('#tbl-users').dataTable().fnDestroy();
    $('#tbl-users').DataTable({
        ajax: 'user/all',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'identification_card', name: 'identification_card'},
            {data: 'phone', name: 'phone'},
            {
                sortable: false,
                "render": function (data, type, full, meta) {
                    var state;
                    if (full.pay == 0) {
                        state =  "<div class='togglebutton'><label><input type='checkbox' v-model='pay' class='toggle-info'><span class='toggle'  onclick=\"changestate(" + full.id + ")\"></span></label></div>";
                    }else{
                        state =  "<div class='togglebutton'><label><input type='checkbox' v-model='pay' class='toggle-info' checked ><span class='toggle' onclick=\"changestate(" + full.id + ")\"></span></label></div>";
                    }
                    return state;
                }
            },
            {
                sortable: false,
                "render": function (data, type, full, meta) {
                    var params = [
                        full.id, 
                        "'" + full.name + "'", 
                        "'" + full.email + "'", 
                        "'" + full.identification_card + "'",
                        "'" + full.phone + "'", 
                        "'" + full.password + "'", 
                        full.pay,
                    ];
                    var btn_delete__ = " <a onclick=\"eliminar(" + full.id + ","+true+")\" class='btn btn-outline btn-danger btn-xs' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash'></i></a> ";
                    var btn_edit__ =  "<a onclick=\"edit(" + params + ")\" class='btn btn-outline btn-success btn-xs' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-edit'></i></a> ";
                    var btn_delete = " <a onclick=\"btnDelete(" + full.id + ","+true+")\" class=' icon'><i class='zmdi zmdi-delete'></i></a>";
                    var btn_edit =  "<a onclick=\"edit(" + params + ")\" data-toggle='modal' data-target='#modal-user' class='edit icon'><i class='zmdi zmdi-edit'></i></a>";
                    return btn_edit + btn_delete;
                }
            }
        ]
    });
});

function edit(id,name,email, identification_card, phone,password,pay){
    var data ={
        id:id,
        name: name,
        email: email,
        identification_card: identification_card,
        phone: phone,
        password: password,
        pay: pay
    };
    objVue.edit(data);
}

function btnDelete(id,logical){
    var data ={
        id:id,
        logical:logical
    };
    objVue.delete(data);    
}
function changestate(id){
    objVue.changeState(id);
}
/*-- Función para pasar el id de jQuery  a vue para deshacer el eliminado --*/
function restoreBtn(id){
    var data ={
        id:id
    };
    objVue.restore(data);    
}

/* FUNCIONES DE VUE */
var objVue = new Vue({
    el: '#user',
    mounted: function () {
    },
    data:{
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        phone: '',
        identification_card: '',
        editar: 0,
        formErrors: {}
    },
    methods:{
        resetForm: function(){
            this.name = '';
            this.email = '';
            this.password = '';
            this.password_confirmation = '';
            this.phone = '';
            this.identification_card = '';
            this.editar = 0;
        },
        changeState: function(id){
            let me = this;
            axios.post('user/changeState', {
                'id':  id
            })
            .then(function (response){
                if(response.data['code'] == 200){
                    toastr.success('Actualizado el estado correctamente.');
                    toastr.options.closeButton = true;
                }else{
                    toastr.warning(response.data['error']);
                    toastr.options.closeButton = true;
                    console.log(response.data);
                }
            })
            .catch(function(error){
                toastr.error("Error al cambiar el estado.", {timeOut: 50000});
            });
        },
        updateTable: function(){
            $('#tbl-users').dataTable()._fnAjaxUpdate();
        },
        delete: function(data){
            this.formErrors = {};
            if(data.logical === true){
                axios.get('user/delete/' + data.id + '/' + data.logical).then(response => {
                    this.updateTable();
                    toastr.success("<div><p>Registro eliminado exitosamente.</p><button type='button' onclick='restoreBtn(" + data.id + ")' id='okBtn' class='btn btn-xs btn-danger pull-right'><i class='fa fa-reply'></i> Restaurar</button></div>");
                    toastr.options.closeButton = true;
                });
            }else{
                axios.delete('arqueo/' + data.id).then(response => {
                    this.updateTable();
                    toastr.success('Registro eliminado correctamente.');
                    toastr.options.closeButton = true;
                });
            }
        },
        /* metodo para eliminar el error de los campos del formulario cuando dan clic sobre el */
        deleteError: function(element){
            let me = this;
            $.each(me.formErrors, function (key, value) {
                if(key !== element){
                   me.formErrors[key] = value; 
               }else{
                me.formErrors[key] = false; 
               }
            });
        },
        restore: function(data){
            axios.get('user/restore/' + data.id).then(response => {
                toastr.success('Registro restaurado.');
                this.updateTable();
            });
        },
        create: function(){
            let me = this;
            axios.post('user', {
                'name':  this.name,
                'email':  this.email,
                'password':  this.password,
                'password_confirmation':  this.password_confirmation,
                'phone':  this.phone,
                'identification_card':  this.identification_card
            })
            .then(function (response){
                if(response.data['code'] == 200){
                    toastr.success('Registro creado correctamente.');
                    toastr.options.closeButton = true;
                    $('#modal-user').modal('hide');
                }else{
                    toastr.warning(response.data['error']);
                    toastr.options.closeButton = true;
                }
                me.resetForm();
                this.updateTable();
            })
            .catch(function(error){
                if (typeof(error.response) != "undefined" && error.response.status === 422) {
                    me.formErrors = error.response.data.errors;
                }
                $.each(me.formErrors, function (key, value) {
                    $('.result-' + key).html(value);
                });
            });
        },
        update: function update() {
            var me = this;
            axios.put('user/' + this.id, {
                'name':  this.name,
                'email':  this.email,
                'password':  this.password,
                'password_confirmation':  this.password_confirmation,
                'phone':  this.phone,
                'identification_card':  this.identification_card
            }).then(function (response) {
                if (response.data['code'] == 200) {
                    toastr.success('Registro Actualizado correctamente');
                    toastr.options.closeButton = true;
                    me.editar = 0;
                } else {
                    toastr.warning(response.data['error']);
                    toastr.options.closeButton = true;
                    console.log(response.data);
                }
                $('#modal-user').modal('hide');
                me.resetForm();
                 $('#tbl-users').dataTable()._fnAjaxUpdate();
            }).catch(function (error) {
                if (typeof(error.response) != "undefined" && error.response.status === 422) {
                    me.formErrors = error.response.data.errors;
                }
            });
        },
        edit: function(data){
            this.id = data['id'];
            this.name = data['name'];
            this.email = data['email'];
            this.identification_card = data['identification_card'];
            this.phone = data['phone'];
            this.password = data['password'];
            this.password_confirmation = data['password'];
            this.pay = data['pay'];
            this.editar = 1;
            this.formErrors = {};
        }
    }
    
});