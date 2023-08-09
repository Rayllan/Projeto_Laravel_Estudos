@if ($mensagem = Session::get('sucesso'))
<div class="card green lighten-1">
    <div class="card-content white-text">
        <span class="card-title"></span>
        <p>{{ $mensagem }}</p>
    </div>
</div>
@endif

@if ($mensagem = Session::get('sucesso-delete'))
<div class="card amber darken-1">
    <div class="card-content white-text">
        <span class="card-title"></span>
        <p>{{ $mensagem }}</p>
    </div>
</div>
@endif