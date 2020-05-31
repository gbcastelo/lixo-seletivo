@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar senha do usuário</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('user.save.pass')}}">
                @csrf
                <div class="form-group">
                    <label for="senha">Nova senha do usuário:</label>
                    <input type="password" name="senha" class="form-control" id="senha"
                        placeholder="Digite a senha do usuário" value="{{$user->senha}}" required>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
