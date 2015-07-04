<table class="table table-striped table-responsive">
		 <tr> 
			 <th>Editar</th>      
			 <th>Cedula</th>
			 <th>Nombres</th>
			 <th>Apellidos</th>
			 <th># mesa</th>
			 <th>Lugar de votación</th>
			 <th>Lider</th>
			 <th>Borrar</th>
			
		 </tr>
		 @foreach ($votante as $objvotante)
			<tr>
				
				<td width="60" align="center">
                      {!! Html::link(route('votante.edit', $objvotante->vot_consecutivo), '', array('class' => 'mdi-content-create')) !!}
                </td>
				<td width="60" align="center">
					{!! Html::link(route('persona.show', $objvotante->persona->per_consecutivo),$objvotante->persona->per_cedula, array('class' => 'badge label-material-blue-grey-700'))!!}
				</td>
				<td width="500">{!! $objvotante->persona->per_nombres!!}</td>
				<td width="500">{!! $objvotante->persona->per_apellidos!!}</td>
				<td width="500">{!! $objvotante->vot_numeromesavotacion!!}</td>
				<td width="500">{!! $objvotante->vot_lugarvotacion!!}</td>
				<td width="500">{!! $objvotante->lider->persona->per_nombres.'-'.$objvotante->lider->persona->per_apellidos!!}</td>
				<td width="60" align="center">
					{!! Form::open(array('route' => array($destroy, $objvotante->vot_consecutivo), 'method' => 'DELETE')) !!}
						<button type="submit" class="mdi-content-remove"></button>
					{!! Form::close() !!}
				</td>
		  @endforeach
	</table>
	<?php echo $votante->render(); ?>