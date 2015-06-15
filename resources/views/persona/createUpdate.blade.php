@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary panel-material-cyan-700">
			 <div class="panel-heading">{{$titlePanel}}</div>
                @include('errors.error_list')
				<div class="panel-body">
					@if(isset($persona))
						{!! Form::model($persona, ['route' => ['persona.update', $persona->per_consecutivo], 'method' => 'patch']) !!}
					@else
						{!! Form::open(['route' => 'persona.store']) !!}
					@endif
 
							<div class="form-group">
							    {!! Form::label('per_cedula','Cedula') !!}
								{!! Form::text('per_cedula', null, ["class" => "form-control","placeholder"=>"Digite cédula o ID"]) !!}
							    
							</div>
							<div class="form-group">
							    {!! Form::label('per_nombres','Nombres') !!}
								{!! Form::text('per_nombres', null, ["class" => "form-control","placeholder"=>"Ingrese nombres completos"]) !!}
							</div>
							<div class="form-group">
							    {!! Form::label('per_apellidos','Apellidos') !!}
								{!! Form::text('per_apellidos', null, ["class" => "form-control","placeholder"=>"Ingrese sus apellidos"]) !!}
							</div>
							<div class="form-group">
							    {!! Form::label('pr_direccion','Direccion') !!}
								{!! Form::text('pr_direccion', null, ["class" => "form-control","placeholder"=>"Ingrese dirección"]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('pr_celular','Celular') !!}
								{!! Form::text('pr_celular', null, ["class" => "form-control","placeholder"=>"Ingrese número celular"]) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Enviar', ["class" => "btn btn-success btn-lg"]) !!}
							</div>
							<div class="col-md-3 pull-right">
							{!! Html::link(route('persona.create'), '', array('class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-social-person-add')) !!}
       						</div>
				        	<div class="col-md-3 pull-right">
							{!! Html::link(route('persona.index'), '', array('class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-action-visibility')) !!}
				        	</div>
 							{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection