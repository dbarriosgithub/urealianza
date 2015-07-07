<div style="border:0.1em solid #ccc;margin:1em;padding-left:1em">
 <div class="btn-group">
    <a href="javascript:void(0)" class="btn btn-primary btn-xs">Consultar</a>
    <a href="#" data-target="#" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown"><span class="caret"></span></a>
         <ul class="dropdown-menu">
                <li>
          {!! Html::linkAction('PersonaController@index', 'Persona') !!}</li>
          <li>
          {!! Html::linkAction('AlcaldeController@index', 'Alcalde') !!}</li>
          <li>
          {!! Html::linkAction('ConcejalController@index', 'Concejal') !!}
          </li>
          <li>
          {!! Html::linkAction('JefepoliticoController@index', 'Jefe político') !!}
          </li>
          <li>
          {!! Html::linkAction('LiderController@index', 'Lider') !!}
          </li>
          <li>
          {!! Html::linkAction('VotanteController@index', 'Votante') !!}
          </li>
      </ul>  
 </div>   
 <div class="btn-group">
    <a href="javascript:void(0)" class="btn btn-primary btn-xs">Registrar</a>
    <a href="#" data-target="#" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown"><span class="caret"></span></a>
	   <ul class="dropdown-menu">
                <li>
			    {!! Html::linkAction('PersonaController@create', 'Persona') !!}</li>
			    <li>
			    {!! Html::linkAction('AlcaldeController@create', 'Alcalde') !!}</li>
          <li>
          {!! Html::linkAction('ConcejalController@create', 'Concejal') !!}
          </li>
          <li>
          {!! Html::linkAction('JefepoliticoController@create', 'Jefe político') !!}
          </li>
          <li>
          {!! Html::linkAction('LiderController@create', 'Lider') !!}
          </li>
          <li>
          {!! Html::linkAction('VotanteController@create', 'Votante') !!}
          </li>
			</ul>    
	</div>	           
	
</div>