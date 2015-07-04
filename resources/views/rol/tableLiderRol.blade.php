<table class="table table-striped table-responsive">
		 <tr> 
			 <th>Editar</th>      
			 <th>Cedula</th>
			 <th>Nombres</th>
			 <th>Apellidos</th>
			 <th>Celular</th>
			 <th>Jefe político</th>
			 <th>Borrar</th>
			
		 </tr>
		 @foreach ($lider as $objlider)
			<tr>
				
				<td width="60" align="center">
                      {!! Html::link(route('lider.edit', $objlider->lid_consecutivo), '', array('class' => 'mdi-content-create')) !!}
                </td>
				<td width="60" align="center">
					{!! Html::link(route('persona.show', $objlider->persona->per_consecutivo),$objlider->persona->per_cedula, array('class' => 'badge label-material-blue-grey-700'))!!}
				</td>
				<td width="500">{!! $objlider->persona->per_nombres!!}</td>
				<td width="500">{!! $objlider->persona->per_apellidos!!}</td>
				<td width="500">{!! $objlider->persona->pr_celular!!}</td>
				<td width="500">{!! $objlider->jefepolitico->persona->per_nombres.'-'.$objlider->jefepolitico->persona->per_apellidos!!}</td>
				<td width="60" align="center">
					{!! Form::open(array('route' => array($destroy, $objlider->lid_consecutivo), 'method' => 'DELETE')) !!}
						<button type="submit" class="mdi-content-remove"></button>
					{!! Form::close() !!}
				</td>
		  @endforeach
	</table>
	<?php echo $lider->render(); ?>