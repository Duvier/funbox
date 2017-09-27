<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="{{ (Session::has('errors')) ? old('name', '') : $user->name }}">
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email">Correo</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ (Session::has('errors')) ? old('email', '') : $user->email }}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    @if(Route::currentRouteName() == 'entrust-gui::users.edit')
        <div class="alert alert-info">
          <span class="fa fa-info-circle"></span> Deje el campo de contraseña en blanco si desea mantenerlo igual.
        </div>
    @endif
</div>
@if(Config::get('entrust-gui.confirmable') === true)
<div class="form-group">
    <label for="password">Confirmar contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
</div>
@endif
<div class="form-group">
    <label for="num_doc">Documento</label>
    <input type="text" class="form-control" id="num_doc" placeholder="Documento" name="num_doc" value="{{ (Session::has('errors')) ? old('num_doc', '') : $user->num_doc }}">
</div>
<div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" value="{{ (Session::has('errors')) ? old('direccion', '') : $user->direccion }}">
</div>
<div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="text" class="form-control" id="telefono" placeholder="Teléfono" name="telefono" value="{{ (Session::has('errors')) ? old('telefono', '') : $user->telefono }}">
</div>
<div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" value="{{ (Session::has('errors')) ? old('celular', '') : $user->celular }}">
</div>
<div class="form-group">
    <label for="ciudad">Ciudad</label>
    <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" name="ciudad" value="{{ (Session::has('errors')) ? old('ciudad', '') : $user->ciudad }}">
</div>
<div class="form-group">
    <label for="departamento">Departamento</label>
    <input type="text" class="form-control" id="departamento" placeholder="Departamento" name="departamento" value="{{ (Session::has('errors')) ? old('departamento', '') : $user->departamento }}">
</div>
<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" multiple class="form-control">
        @foreach($roles as $index => $role)
            <option value="{{ $index }}" {{ ((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $user->roles->contains('id', $index))) ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
    </select>
</div>
