@extends ('layout.general')
@section ('content')
<!-- page heading start-->
<div class="page-heading">
    <h2>Registrar Participantes</h2>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    <!-- acá se muestran los errores -->
	    
	{{ Form::open(array('url' => 'participantes/crear')) }}

	    <div class="form-group">
	        {{ Form::label('campania_id', 'Id de la campaña') }}
	        {{ Form::text('campania_id', Input::old('campania_id'), array('class' => 'form-control')) }}
	    </div>
	    
	    <div class="form-group">
	        {{ Form::label('correo', 'Correo') }}
	        {{ Form::text('correo', Input::old('correo'), array('class' => 'form-control')) }}
	    </div>
	    
	    <div class="form-group">
	        {{ Form::label('nombre', 'Nombre') }}
	        {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
	    </div>

	    <div class="form-group">
	        {{ Form::label('click', 'Participa? 1.-Si, 0.-No') }}
	        {{ Form::text('click', Input::old('click'), array('class' => 'form-control')) }}
	    </div>

	    {{ Form::submit('Registrar usuario', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
</div>
<!--body wrapper end-->
@endsection