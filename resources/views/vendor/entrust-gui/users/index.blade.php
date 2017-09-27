@extends(Config::get('entrust-gui.layout'))

@section('heading', 'Users')

@section('content')

<div id="content" class="container-fluid">
            <div class="content-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="card card-data-tables product-table-wrapper">
                    <header class="card-heading">
                      
                      <h2 class="card-title">Zero configuration</h2>
                      <small class="dataTables_info">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code></small>
                      
                      <div class="card-search">
                        <div id="productsTable_wrapper" class="form-group label-floating is-empty">
                          <i class="zmdi zmdi-search search-icon-left"></i>
                          <input type="text" class="form-control filter-input" placeholder="Filter Products..." autocomplete="off">
                          <a href="javascript:void(0)" class="close-search" data-card-search="close" data-toggle="tooltip" data-placement="top" title="Close"><i class="zmdi zmdi-close"></i></a>
                        </div>
                      </div>
                      <ul class="card-actions icons right-top">
                        <li id="deleteItems" style="display: none;">
                          <span class="label label-info pull-left m-t-5 m-r-10 text-white"></span>
                          <a href="javascript:void(0)" id="confirmDelete" data-toggle="tooltip" data-placement="top" data-original-title="Delete Product(s)">
                            <i class="zmdi zmdi-delete"></i>
                          </a>
                        </li>
                        <li>
                          <a href="javascript:void(0)" data-card-search="open" data-toggle="tooltip" data-placement="top" data-original-title="Filter Products">
                            <i class="zmdi zmdi-filter-list"></i>
                          </a>
                        </li>
                        <li class="dropdown" data-toggle="tooltip" data-placement="top" data-original-title="Show Entries">
                          <a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                          </a>
                          <div id="dataTablesLength">
                          </div>
                        </li>
                        <li>
                          <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="Export All">
                            <i class="zmdi zmdi-inbox"></i>
                          </a>
                        </li>
                      </ul>
                    </header>
                    <div class="card-body p-0">
                      <div class="alert alert-info m-20 hidden-md hidden-lg" role="alert">
                        <p>
                          Heads up! You can Swipe table Left to Right on Mobile devices.
                        </p>
                      </div>
                      <div class="table-responsive">
                        <table id="productsTable" class="mdl-data-table product-table m-t-30" cellspacing="0" width="100%">
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
                              <th data-orderable="false" class="col-xs-2">Correo</th>
                              <th class="col-xs-4">Nombre</th>
                              <th data-orderable="false" class="col-xs-1">Activo</th>
                              <th class="col-xs-2">Acciones</th>
                              <th data-orderable="false" class="col-xs-2">
                                <button class="btn btn-primary btn-fab  animate-fab"><i class="zmdi zmdi-plus"></i></button>
                              </th>
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
                                <td>{{ $user->email }}</th>
                                <td>{{ $user->name }}</th>
                                <td>
                                    <div class="togglebutton">
                                      <label>
                                        <input type="checkbox" class="toggle-info" checked>
                                      </label>
                                    </div>
                                </td>
                                <td><a href="javascript:void(0)" class="edit-product icon"><i class="zmdi zmdi-edit"></i></a></td>
                                {{-- <td class="col-xs-4">
                                  <form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.edit', $user->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>
                                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
                                  </form>
                                </td> --}}
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
            <section id="chat_compose_wrapper">
              <div class="tippy-top">
                <div class="recipient">Allison Grayce</div>
                <ul class="card-actions icons  right-top">
                  <li>
                    <a href="javascript:void(0)">
                      <i class="zmdi zmdi-videocam"></i>
                    </a>
                  </li>
                  <li class="dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                      <i class="zmdi zmdi-more-vert"></i>
                    </a>
                    <ul class="dropdown-menu btn-primary dropdown-menu-right">
                      <li>
                        <a href="javascript:void(0)">Option One</a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">Option Two</a>
                      </li>
                      <li>
                        <a href="javascript:void(0)">Option Three</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript:void(0)" data-chat="close">
                      <i class="zmdi zmdi-close"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class='chat-wrapper scrollbar'>
                <div class='chat-message scrollbar'>
                  <div class='chat-message chat-message-recipient'>
                    <img class='chat-image chat-image-default' src='assets/img/profiles/05.jpg' />
                    <div class='chat-message-wrapper'>
                      <div class='chat-message-content'>
                        <p>Hey Mike, we have funding for our new project!</p>
                      </div>
                      <div class='chat-details'>
                        <span class='today small'></span>
                      </div>
                    </div>
                  </div>
                  <div class='chat-message chat-message-sender'>
                    <img class='chat-image chat-image-default' src='assets/img/profiles/02.jpg' />
                    <div class='chat-message-wrapper '>
                      <div class='chat-message-content'>
                        <p>Awesome! Photo booth banh mi pitchfork kickstarter whatever, prism godard ethical 90's cray selvage.</p>
                      </div>
                      <div class='chat-details'>
                        <span class='today small'></span>
                      </div>
                    </div>
                  </div>
                  <div class='chat-message chat-message-recipient'>
                    <img class='chat-image chat-image-default' src='assets/img/profiles/05.jpg' />
                    <div class='chat-message-wrapper'>
                      <div class='chat-message-content'>
                        <p> Artisan glossier vaporware meditation paleo humblebrag forage small batch.</p>
                      </div>
                      <div class='chat-details'>
                        <span class='today small'></span>
                      </div>
                    </div>
                  </div>
                  <div class='chat-message chat-message-sender'>
                    <img class='chat-image chat-image-default' src='assets/img/profiles/02.jpg' />
                    <div class='chat-message-wrapper'>
                      <div class='chat-message-content'>
                        <p>Bushwick letterpress vegan craft beer dreamcatcher kickstarter.</p>
                      </div>
                      <div class='chat-details'>
                        <span class='today small'></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <footer id="compose-footer">
                <form class="form-horizontal compose-form">
                  <ul class="card-actions icons left-bottom">
                    <li>
                      <a href="javascript:void(0)">
                        <i class="zmdi zmdi-attachment-alt"></i>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="zmdi zmdi-mood"></i>
                      </a>
                    </li>
                  </ul>
                  <div class="form-group m-10 p-l-75 is-empty">
                    <div class="input-group">
                      <label class="sr-only">Leave a comment...</label>
                      <input type="text" class="form-control form-rounded input-lightGray" placeholder="Leave a comment..">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-blue btn-fab  btn-fab-sm">
                          <i class="zmdi zmdi-mail-send"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </form>
              </footer>
            </section>
          </div>
{{-- <div class="row" id="usuario">
<div class="col-lg-5">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Crear usuario</h5>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
         @if(isset($edit) && $edit)
          @include('entrust-gui::users.edit')
         @else
          <form action="{{ route('entrust-gui::users.store') }}" method="post" role="form">
              @include('entrust-gui::users.partials.form')
              <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('entrust-gui::button.create') }}</button>
              <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('entrust-gui::button.cancel') }}</a>
          </form>
         @endif
      </div>
    </div>
  </div>
    <div class="col-lg-7">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Listado de usuarios</h5>
        </div>
        <div class="ibox-content">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Correo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <body>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->email }}</th>
                <td class="col-xs-4">
                  <form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.edit', $user->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>
                    <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </body>
          </table>
          <div class="text-center">
            {!! $users->render() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
@section('scripts')
<script src="{{ asset('js/templates/usuarios/main.js') }}"></script>
@endsection