@extends ('layout.general')
@section ('content')
<!-- page heading start-->
<div class="page-heading">
    <h2>Crear Campaña</h2>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    <!-- acá se muestran los errores -->
	    
	{{ Form::open(array('url' => 'campanias/crear')) }}
	@include('campanias/partials/_form', ['submit_text' => 'Crear Campaña'])
	{{ Form::close() }}
</div>
<!--body wrapper end-->
@endsection