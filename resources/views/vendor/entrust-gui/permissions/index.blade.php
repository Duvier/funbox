@extends(Config::get('entrust-gui.layout'))

@section('heading', 'Permissions')
@section('content')
<div class="row" id="usuario"> 
  <div class="col-lg-5">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Crear permiso</h5>
        </div>
        <div class="ibox-content">
            @if(isset($edit) && $edit)
                @include('entrust-gui::permissions.edit')
            @else
                <form action="{{ route('entrust-gui::permissions.store') }}" method="post" role="form">
                    @include('entrust-gui::permissions.partials.form')
                    <button type="submit" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('entrust-gui::button.create') }}</button>
                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::permissions.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('entrust-gui::button.cancel') }}</a>
                </form>
            @endif
        </div>
    </div>
  </div>
    <div class="col-lg-7">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Listado de permisos</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{ $model->display_name }}</th>
                            <td class="col-xs-4">
                                <form action="{{ route('entrust-gui::permissions.destroy', $model->id) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::permissions.edit', $model->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>
                                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
          <div class="text-center">
            {!! $models->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/templates/usuarios/main.js') }}"></script>
@endsection