@extends ('layout.general')
@section ('content')
<!-- page heading start-->
<div class="page-heading">
    <h2>Editar Usuario "{{ $participante->nombre }}"</h2>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    {!! Form::model($participante, ['method' => 'PATCH', 'route' => ['campanias.participantes.update', $campania->nombre, $participante->nombre]]) !!}
        @include('participantes/partials/_form', ['submit_text' => 'Editar Usuario'])
    {!! Form::close() !!}
</div>
<!--body wrapper end-->
@endsection