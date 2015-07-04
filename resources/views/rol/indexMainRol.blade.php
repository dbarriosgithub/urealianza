@extends('app')
@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-10 col-md-offset-1">
  	    @include('partials.submenus')
  	    @include('errors.error_list')
		@include('partials.formSearch',array('title'=>$title,'route'=>$route))
		@include($view,array('destroy'=>$destroy))
	</div>
  </div>
</div>	
@endsection