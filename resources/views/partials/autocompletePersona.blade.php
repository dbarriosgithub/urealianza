
  <div class="row">
  	<div class="col-md-10 col-md-offset-1">
  	   <div class="panel panel-default">
        <div class="panel-body">
  	   {!! Form::open(array('onsubmit' => 'return false', 'id' => 'formulario_busqueda','class'=>'navbar-form  pull-right')) !!}
	   <div class="form-group">
	      {!! Form::text('searchced',null,["class" => "form-control","id"=>"searchced","placeholder"=>"Buscar por cédula"])!!}
	   </div>
	        {!! Form::button('',array('id'=>'botonbuscar','type'=>'submit','class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-action-search')) !!}
	     <!-- /input-group -->
        {!! Form::close() !!}
        <div id="loader" style="display:none" class="throbber-loader"></div>
       </div>
      </div> 
    </div>
   </div> 


@section("scripts")
  <script type="text/javascript">
	$("#botonbuscar").on('click',function()
	{
		$("#AreaShowPersona").hide();
		$("#loader").show();
		var url = '../persona/search/'+$("#searchced").val();
		var form = $("#formulario_busqueda");
	    $.post(url,form.serialize(),null,'json')
	     .done(function( data, textStatus, jqXHR ) {
	     	$("#loader").hide();
	        if ( console && console.log ) {
	            console.log( "La solicitud se ha completado correctamente." );
	        }
	        if(data[0])
	        {
	          $("#AreaShowPersona").show();
	          $("#cedula h2").text(data[0].per_cedula);
	          $("#nombres").text(data[0].per_nombres);
	          $("#apellidos").text(data[0].per_apellidos);
	          $("#direccion").text(data[0].pr_direccion);
	          $("#celular").text(data[0].pr_celular);
	          $("#foreignkey").attr('value',data[0].per_consecutivo);
	        }else
	          alert("No tuvo éxito la consulta");
   		 })
    	 .fail(function( jqXHR, textStatus, errorThrown ) {
	        $("#loader").hide();
	        if ( console && console.log ) {
	            console.log( "La solicitud a fallado: " +  textStatus);
	        }
	  	 });
	});	
  </script>
@endsection

