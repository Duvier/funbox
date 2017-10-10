@extends(Config::get('entrust-gui.layout'))

@section('title', 'Usuarios')
@section('module', 'Usuarios')
@section('view', 'Lista de usuarios')

@section('content')
<div id="user">
  <div id="content" class="container-fluid">
    <div class="content-body">
      <div class="row">
        <div class="col-xs-12">
          <div class="card card-data-tables product-table-wrapper">
            <header class="card-heading">
              <h2 class="card-title">Listado de usuarios</h2>
              <div class="card-search">
                <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                  <i class="zmdi zmdi-search search-icon-left"></i>
                  <input type="text" class="form-control filter-input" placeholder="Buscar usuario..." autocomplete="off">
                  <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Cerrar"><i class="zmdi zmdi-close"></i></a>
                </div>
              </div>
              <ul class="card-actions icons right-top">
                <li id="deleteItems" style="display: none;">
                  <span class="label label-info pull-left m-t-5 m-r-10 text-white"></span>
                  <a href="javascript:void(0)" id="confirmDelete" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar usuario(s)">
                    <i class="zmdi zmdi-delete"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" data-card-search="open" data-toggle="tooltip" data-placement="top" data-original-title="Buscar usuario">
                    <i class="zmdi zmdi-search"></i>
                  </a>
                </li>
                <li class="dropdown" data-toggle="tooltip" data-placement="top" data-original-title="Mostrar">
                  <a href="javascript:void(0)" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                  </a>
                  <div id="dataTablesLength">
                  </div>
                </li>
              </ul>
            </header>
            <div class="card-body p-0">
              <div class="alert alert-info m-20 hidden-md hidden-lg" role="alert">
                <p>
                  ¡Aviso! Puede deslizar la tabla de izquierda a derecha en dispositivos móviles.
                </p>
              </div>
              <div class="table-responsive">
                <table id="tabla-users" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th data-orderable="false" class="col-xs-1">
                        <span class="checkbox">
                          <label>
                            <input type="checkbox" value="" id="checkAll">
                            <span class="checkbox-material"></span>
                          </label>
                        </span>
                      </th>
                      <th class="col-xs-2">Nombre</th>
                      <th class="col-xs-2">Correo</th>
                      <th data-orderable="false" class="col-xs-2">Teléfono</th>
                      <th class="col-xs-1">Documento</th>
                      <th class="col-xs-1">Activo</th>
                      <th data-orderable="false" class="col-xs-1">Acciones</th>
                      {{-- <th data-orderable="false" class="col-xs-2">
                        <button class="btn btn-primary btn-fab  animate-fab"><i class="zmdi zmdi-plus"></i></button>
                      </th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td class="checkbox-cell">
                        <span class="checkbox">
                          <label>
                            <input type="checkbox" value="" id="">
                            <span class="checkbox-material"></span>
                          </label>
                        </span>
                      </td>
                      <td>{{ $user->name . ' ' .$user->last_name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->identification_card }}</td>
                      <td>
                        <div class="togglebutton">
                          <label>
                            <input type="checkbox" class="toggle-info" checked>
                          </label>
                        </div>
                      </td>
                      <td><a href="#" data-toggle="modal" data-target="#modal-user" class="edit icon"><i class="zmdi zmdi-edit"></i></a>
                      <a href="javascript:void(0)" class=" icon"><i class="zmdi zmdi-delete"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title" id="myModalLabel-2">Usuario</h4>
          <ul class="card-actions icons right-top">
            
            <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
              <i class="zmdi zmdi-close"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group" :class="{'has-error is-focused': formErrors.email}">
              <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                <input v-model="email" type="email" class="form-control" placeholder="Correo"  v-on:click="deleteError('email')">
                <small id="msn1" class="help-block result-email" v-show="formErrors.email"></small>
              </div>
            </div>
            <div class="form-group" :class="{'has-error is-focused': formErrors.password}">
              <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-key"></i></span>
                <input v-model="password" type="password" class="form-control" placeholder="Contraseña" v-on:click="deleteError('password')">
                <small id="msn1" class="help-block result-password" v-show="formErrors.password"></small>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group" :class="{'has-error is-focused': formErrors.name}">
              <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-face"></i></span>
                <input v-model="name" type="text" class="form-control" placeholder="Nombre" v-on:click="deleteError('name')">
                <small id="msn1" class="help-block result-name" v-show="formErrors.name"></small>
              </div>
            </div>
            <div class="form-group" :class="{'has-error is-focused': formErrors.identification_card}">
              <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-account-box-o"></i></span>
                <input v-model="identification_card" type="text" class="form-control" placeholder="Documento" v-on:click="deleteError('identification_card')">
                <small id="msn1" class="help-block result-identification_card" v-show="formErrors.identification_card"></small>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                <input v-model="phone" type="text" class="form-control" placeholder="Teléfono">
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm btn-flat" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary btn-sm" @click.prevent="create()" v-if="editar==0">Aceptar</button>
          <button type="button" class="btn btn-success btn-sm" @click.prevent="update()" v-if="editar==1">Actualizar</button>
        </div>
      </div>
      <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
  </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/templates/users.js') }}"></script>
@endsection
@section('guardar')
{{-- <td class="col-xs-4">
  <form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.edit', $user->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>
    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
  </form>
</td> --}}
@endsection
