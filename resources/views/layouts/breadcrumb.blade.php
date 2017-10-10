<div id="header_wrapper" class="header-sm">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <header id="header">
                    <h1>@yield('title')</h1>
                    <ol class="breadcrumb">
                      <li><a href="index.html">Inicio</a></li>
                      <li><a href="javascript:void(0)">@yield('module')</a></li>
                      <li class="active">@yield('view')</li>
                    </ol>
                </header>
            </div>
        </div>
    </div>
</div>