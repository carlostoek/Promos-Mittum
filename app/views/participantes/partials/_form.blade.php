<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::text('correo') !!}
</div>
 
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre') !!}
</div>
 
<div class="form-group">
    {!! Form::label('click', '¿Participa?:') !!}
    {!! Form::checkbox('click') !!}
</div>
 
<div class="form-group">
    {!! Form::submit($submit_text) !!}
</div>