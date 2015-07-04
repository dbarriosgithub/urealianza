@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	      @include('partials.submenus')
	    </div>  

		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary panel-material-cyan-700">
			 <div class="panel-heading">{{$titlePanel}}</div>
             
                @include('errors.error_list')
				<div class="panel-body">
				  @include ('partials.showPersonaPartial',array('persona'=>$persona))
				</div>
			  <div class="row">
				<div class="col-md-10 col-md-offset-1">
				 <div class="panel panel-default">
	  			  <div class="panel-body">
				{!! Form::model($lider, ['route' => ['lider.update', $lider->lid_consecutivo], 'method' => 'patch']) !!}
				    @if(isset($list_jefepolitico))
                   	    {!! Form::label('lid_idjefepolitico','Jefe Político') !!}
		                {!! Form::select('lid_idjefepolitico',$list_jefepolitico,$lider->lid_idjefepolitico,array('class'=>'form-control'))!!}	  
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
		                {!! Form::select('vot_idlider',$list_lider,null,array('class'=>'form-control'))!!}
		                <br>
					 @endif
	            
				    {!! Form::hidden($foreignkey,$lider->lid_idpersona, array('id' => 'foreignkey')) !!}
				    <p align="center">
					{!! Form::submit('Guardar', ["class" => "btn btn-success btn-lg"]) !!}
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