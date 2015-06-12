@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
      @if(!$persona->isEmpty())
          <table class="table table-bordered">
              <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
              @foreach ($persona as $person)
                  <tr>
                    <td width="500">{{ $person->per_nombres}}</td>
                    <td width="500">{{ $person->per_apellidos}}</td>
                    <td width="60" align="center">
                      {!! Html::link(route('persona.edit', $person->id), 'Edit', array('class' => 'btn btn-success btn-md')) !!}
                    </td>
                    <td width="60" align="center">
                      {!! Form::open(array('route' => array('persona.destroy', $person->id), 'method' => 'DELETE')) !!}
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
</div>
@endsection