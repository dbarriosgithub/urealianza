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
          		<li>
          		<a href="../lider/create">Lider</a>
          		</li>
          		<li>
          		<a href="../votante/create">Votante</a>
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
		  <div class="row">
			<div class="col-md-10 col-md-offset-1">
			 <div class="panel panel-default">
  			  <div class="panel-body">
				{!! Form::open(['route' => $route]) !!}
				    @if(isset($list_jefepolitico))
                   	       {!! Form::label('lid_idjefepolitico','Jefe politico') !!}
		                   {!! Form::select('lid_idjefepolitico',$list_jefepolitico)!!}
		                   <br>
					 @endif

					 @if(isset($list_lider))
					       {!! Form::label('vot_numeromesavotacion','# Mesa de votación')!!}
                   	       {!! Form::text('vot_numeromesavotacion', null, ["class" => "form-control","placeholder"=>"Digite la mesa de Votación"]) !!}
                   	       {!! Form::label('vot_lugavotacion','Lugar de votación')!!}
                   	       {!! Form::text('vot_lugarvotacion', null, ["class" => "form-control","placeholder"=>"Ingrese lugar de Votación"]) !!}
                   	       {!! Form::label('vot_observacion','Observación')!!}
                   	       {!! Form::textarea('vot_observacion', null, ["class" => "form-control","placeholder"=>"Ingrese Observaciones","rows"=>3]) !!}
	                       {!! Form::label('vot_idlider','Lider') !!}
		                   {!! Form::select('vot_idlider',$list_lider)!!}
		                   <br>
					 @endif
	            
				    {!! Form::hidden($foreignkey, '', array('id' => 'foreignkey')) !!}
				    <p align="center">
					{!! Form::submit('Enviar', ["class" => "btn btn-success btn-lg"]) !!}
					</p>
				{!! Form::close()!!}	
			   </div> 
			  </div>
			</div>
		   </div>
		  </div> 	
		</div>
	</div>
 </div>
@endsection