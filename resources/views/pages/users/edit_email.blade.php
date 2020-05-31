@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar email do usuário</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('user.save.email')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Novo email do usuário:</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="Digite o email do usuário" value="{{$user->email}}" required>
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
