@extends ('layout.general')
@section ('content')
<!-- page heading start-->
<div class="page-heading">
    <h2>
    {!! link_to_route('campanias.show', $campania->nombre, [$campania->nombre]) !!} -
    {{ $participante->nombre }}
</h2>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
    {{ $participante->nombre }} <br>
    {{ $participante->correo }}
</div>
<!--body wrapper end-->
@endsection