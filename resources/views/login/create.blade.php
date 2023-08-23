@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
@endif

<form action="{{ route('users.store') }}" method='POST'>
    @csrf
    <div class="mb-3">
        <label for="firtName" class="form-label">Nome</label>
        <input type="text" class="form-control" id="firtName" name="firtName" required>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Sobrenome</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmação de Senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="d-flex flex-column align-items-center mt-3">
        <button type="submit" class="btn btn-primary mb-3">Cadastrar</button>
        <a href="{{ route('site.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</form>