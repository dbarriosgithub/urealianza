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
					{!! Form::open(['route' => 'persona.store']) !!}
 
							<div class="form-group">
								{!! Form::text('per_nombres', null, ["class" => "form-control","placeholder"=>"NOMBRES"]) !!}
							</div>
							<div class="form-group">
								{!! Form::text('per_apellidos', null, ["class" => "form-control","placeholder"=>"APELLIDOS"]) !!}
							</div>
							<div class="form-group">
								{!! Form::text('per_direccion', null, ["class" => "form-control","placeholder"=>"DIRECCION"]) !!}
							</div>
							<div class="form-group">
								{!! Form::text('per_celular', null, ["class" => "form-control","placeholder"=>"CELULAR"]) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Enviar', ["class" => "btn btn-success btn-block"]) !!}
							</div>
 					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection