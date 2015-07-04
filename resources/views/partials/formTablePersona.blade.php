	<table class="table table-striped table-responsive">
		 <tr> 
			 <th>Borrar</th>      
			 <th>Cedula</th>
			 <th>Nombres</th>
			 <th>Apellidos</th>
			 <th>Dirección</th>
			 <th>Celular</th>
		 </tr>
		 @foreach ($persona as $person)
			<tr>
				<td width="60" align="center">
					{!! Form::open(array('route' => array($destroy, $person->per_consecutivo), 'method' => 'DELETE')) !!}
						<button type="submit" class="mdi-content-remove"></button>
					{!! Form::close() !!}
				</td>
				<td width="60" align="center">
					{!! Html::link(route('persona.show', $person->per_consecutivo),$person->per_cedula, array('class' => 'badge label-material-blue-grey-700'))!!}
				</td>
				<td width="500">{!! $person->per_nombres!!}</td>
				<td width="500">{!! $person->per_apellidos!!}</td>
				<td width="500">{!! $person->pr_direccion!!}</td>
				<td width="500">{!! $person->pr_celular!!}</td>
			</tr>
		  @endforeach
	</table>
	<?php echo $persona->render(); ?>