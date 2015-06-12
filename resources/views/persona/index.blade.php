@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
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

      @if(!$persona->isEmpty())
          <table class="table table-striped table-hover">
              <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
              @foreach ($persona as $person)
                  <tr>
                    <td width="500">{{ $person->per_cedula}}</td>
                    <td width="500">{{ $person->per_nombres}}</td>
                    <td width="500">{{ $person->per_apellidos}}</td>
                    <td width="500">{{ $person->pr_direccion}}</td>
                    <td width="500">{{ $person->pr_celular}}</td>
                    <td width="60" align="center">
                      {!! Html::link(route('persona.edit', $person->per_consecutivo), 'Edit', array('class' => 'btn btn-success btn-md')) !!}
                    </td>
                    <td width="60" align="center">
                      {!! Form::open(array('route' => array('persona.destroy', $person->per_consecutivo), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-danger btn-md">Delete</button>
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
        {!! Html::link(route('persona.create'), '', array('class' => 'btn btn-primary btn-fab btn-raised mdi-content-add')) !!}
       </div>
</div>
@endsection