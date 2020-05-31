@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar cadastro de material</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('material.save')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do material:</label>
                    <input type="text" name="nome" class="form-control" id="nome"
                        placeholder="Digite o nome do material" value="{{$material->name}}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Material:</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Digite uma breve descrição" value="{{$material->description}}" required>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="{{$material->id}}">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
