@extends ('layout.general')
@section ('content')
<!-- page heading start-->
<div class="page-heading">
    <h2>Editar Campaña</h2>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    {{ Form::model($campania, ['method' => 'PATCH', 'url' => ['campanias/editar', $campania->id]]) }}
        @include('campanias/partials/_form', ['submit_text' => 'Editar Campaña'])
    {{ Form::close() }}
</div>
<!--body wrapper end-->
@endsection