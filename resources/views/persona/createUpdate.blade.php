@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Crear Persona</div>
                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
 
				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif
 
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
 					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection