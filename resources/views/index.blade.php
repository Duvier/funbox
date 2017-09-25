@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<div id="content_wrapper">
	<div id="header_wrapper" class="header-sm">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<header id="header">
						<h1>Inicio</h1>
					</header>
				</div>
			</div>
		</div>
	</div>
	<div id="content" class="container-fluid">
		<div class="content-body">
			<div class="row">
				<div class="col-xs-12">
					<div class="card">
						<header class="card-heading ">
							<h2 class="card-title">INICIO</h2>
							<small>Welcome to the MaterialLab Seed Project</small>
							<ul class="card-actions icons right-top">
								<li>
									<a href="javascript:void(0)" data-toggle="refresh">
										<i class="zmdi zmdi-refresh-alt"></i>
									</a>
								</li>
								<li class="dropdown">
									<a href="javascript:void(0)" data-toggle="dropdown">
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
							</ul>
						</header>
						<div class="card-body">
							<p>
								This is a set of starter pages for your project. You can use these pages as a starting point to add only the components you need.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ENDS $content -->
</div>
@endsection