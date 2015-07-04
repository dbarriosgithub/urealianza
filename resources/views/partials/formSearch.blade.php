     {{-- $title,$route se reciben como parámetros--}}
      <h3><span class="label label default label-material-blue-grey-700">{!!$title!!}</span></h3>          
      <div class="panel panel-default">
        <div class="panel-body">
         {!! Form::open(['route'=>$route,'method'=>'GET','class'=>'navbar-form  pull-right','role'=>'search'])!!}

          <div class="form-group">
            {!! Form::text('qsearch',null,["class" => "form-control","placeholder"=>"Buscar por..","id"=>"txtqcedula"])!!}
          </div>

          {!! Form::button('',array('type'=>'submit','class' => 'btn btn-primary btn-fab btn-raised btn-material-blue-grey-700 mdi-action-search')) !!}
         <br>
          <div class="form-group">
              {!! Form::label('searchOp','Cédula') !!}
              {!! Form::radio('searchOp','qcedula',true) !!}
              {!! Form::label('searchOp','Nombres') !!}
              {!! Form::radio('searchOp','qnombres') !!}
          </div>
        {!! Form::close()!!}
        </div>
      </div>

      