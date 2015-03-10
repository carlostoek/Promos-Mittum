<div class="form-group">
    {{ Form::label('nombre', 'Nombre la campaña') }}
    {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('gerencia', 'Gerencia') }}
    {{ Form::text('gerencia', Input::old('gerencia'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('limite', 'Límete de ganadores') }}
    {{ Form::text('limite', Input::old('limite'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('url_ok', 'Dirección del Pop-up') }}
    {{ Form::text('url_ok', Input::old('url_ok'), array('class' => 'form-control')) }}
</div>
      
<div class="form-group">
    {{ Form::submit($submit_text, ['class'=>'btn primary']) }}
</div>