@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Adicionar novo funcionário</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('employee.save')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do Funcionário:</label>
                    <input type="text" name="nome" class="form-control" id="nome"
                        placeholder="Digite o nome do funcionário">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Funcionário:</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Digite uma breve descrição">
                </div>
                <div class="form-group">
                    <label for="funcao">Função do Funcionário:</label>
                    <input type="text" name="funcao" class="form-control" id="funcao"
                        placeholder="Digite a função exercida">
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
