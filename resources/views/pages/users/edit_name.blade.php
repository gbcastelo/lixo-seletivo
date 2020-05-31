@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar nome do usuário</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('user.save.name')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Novo nome do usuário:</label>
                    <input type="text" name="nome" class="form-control" id="nome"
                        placeholder="Digite o nome do usuário" value="{{$user->name}}" required>
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
