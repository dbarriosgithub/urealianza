@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
  		  <div class="panel-body">
			<div class="btn-group pull-right">
    <a href="javascript:void(0)" class="btn btn-info">Registrar</a>
    <a href="#" data-target="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
			  <ul class="dropdown-menu">
			    <li>
			    <a href="../persona/create">Persona</a></li>
          		<li>
			    <li>
			    <a href="../alcalde/create">Alcalde</a></li>
          		<li>
          		<a href="../concejal/create">Concejal</a></li>
          		<li>
          		<a href="../jefepolitico/create">Jefe político</a>
          		</li>
			  </ul>
			</div>
		  </div>	
		</div>

		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary panel-material-cyan-700">
			 <div class="panel-heading">{{$titlePanel}}</div>
                @include('errors.error_list')
				<div class="panel-body">
					@include ('partials.autocompletePersona')
				  <div id="AreaShowPersona" style="display:none">	
					@include ('partials.showPersonaPartial',array('persona'=>$persona))
				  </div>

				</div>
				{!! Form::open(['route' => $route]) !!}
				<p align="center">
				    {!! Form::hidden($foreignkey, '', array('id' => 'foreignkey')) !!}
					{!! Form::submit('Enviar', ["class" => "btn btn-success btn-lg"]) !!}
				</p>
				{!! Form::close()!!}	
				
			</div>
		</div>
	</div>
</div>
@endsection