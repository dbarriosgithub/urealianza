@extends('app')
 
@section('content')
<div class="container">
			<div class="panel panel-primary panel-material-cyan-700">
				<div class="panel-heading">Vista Persona</div>
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
						
	                       <ul>
	                          <li class="list-group-item">
	                           <h2>{!! $persona->per_cedula!!}</h2>
	                          </li>
	                          <li class="list-group-item">{!! $persona->per_nombres !!}</li>
	                          <li class="list-group-item">{!! $persona->per_apellidos !!}</li>
	                          <li class="list-group-item">{!! $persona->pr_direccion !!}</li>
	                          <li class="list-group-item">{!! $persona->pr_celular !!}</li>
	                       </ul>
                           
						  <div class="col-md-3 pull-right">
						  {!! Html::link(route('persona.create'), '', array('class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-social-person-add')) !!}
       					  </div>
				          <div class="col-md-3 pull-right">
						   {!! Html::link(route('persona.index'), '', array('class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-action-visibility')) !!}
						  </div>
                       	   
				   </div>
			</div>
</div>
@endsection			