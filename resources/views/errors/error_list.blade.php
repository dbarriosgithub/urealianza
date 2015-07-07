	@if($errors->has())
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
                {!! $message !!}
            @endforeach
        </div>
    @endif
 
	@if (Session::has('message'))
	    <div class="alert alert-success">{{ Session::get('message') }}</div>
	@elseif (Session::has('message-error')) 
        <div class="alert alert-danger">{{ Session::get('message-error') }}</div>
    @endif