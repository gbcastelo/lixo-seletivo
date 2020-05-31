@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Adicionar novo material</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('material.save')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do Material:</label>
                    <input type="text" name="nome" class="form-control" id="nome"
                        placeholder="Digite o nome do material">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Material:</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Digite uma breve descrição">
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
