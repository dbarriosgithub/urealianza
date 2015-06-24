@extends('app')
@section('content')
<div class="container">
	  <div class="row">
    
		<div class="col-md-10 col-md-offset-1">
        @include('errors.error_list')        
      <div class="panel panel-default">
        <div class="panel-body">
         {!! Form::open(['route'=>'persona.index','method'=>'GET','class'=>'navbar-form  pull-right','role'=>'search'])!!}
           <div class="form-group">
              {!! Form::text('qcedula',null,["class" => "form-control","placeholder"=>"Buscar cédula"])!!}
           </div>
              {!! Form::button('',array('type'=>'submit','class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-action-search')) !!}
         {!! Form::close()!!}
        </div>
      </div>   

      @if(!$persona->isEmpty())
          <table class="table table-striped table-responsive">
              <tr>
                <th>Edit</th>          
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Borrar</th>
              </tr>
              @foreach ($persona as $person)
                  <tr>
                    <td width="60" align="center">
                      {!! Html::link(route('persona.edit', $person->per_consecutivo), '', array('class' => 'mdi-content-create')) !!}
                    </td>
                    <td width="60" align="center">
                      {!! Html::link(route('persona.show', $person->per_consecutivo),$person->per_cedula, array('class' => 'badge label-material-blue-grey-700'))!!}
                    </td>
                    <td width="500">{{ $person->per_nombres}}</td>
                    <td width="500">{{ $person->per_apellidos}}</td>
                    <td width="500">{{ $person->pr_direccion}}</td>
                    <td width="500">{{ $person->pr_celular}}</td>
                    <td width="60" align="center">
                      {!! Form::open(array('route' => array('persona.destroy', $person->per_consecutivo), 'method' => 'DELETE')) !!}
                          <button type="submit" class="mdi-content-remove"></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
              @endforeach
          </table>
          <?php echo $persona->render(); ?>
      @endif
		</div>
	</div>
       <div class="col-md-3 pull-right">
        {!! Html::link(route('persona.create'), '', array('class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-social-person-add
')) !!}
       </div>
</div>
@endsection