@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Adicionar nova entrada de lixo</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('trash.save')}}">
                @csrf
                <div class="form-group">
                    <label for="data">Data da entrada:</label>
                    <input type="text" name="data" class="form-control" id="data"
                        placeholder="Digite a data de entrada do lixo">
                </div>
                <div class="form-group">
                    <label for="hora">Hora da entrada:</label>
                    <input type="text" name="hora" class="form-control" id="hora"
                        placeholder="Digite a hora de entrada do lixo">
                </div>
                <div class="form-group">
                    <label for="peso">Peso do Lixo:</label>
                    <input type="text" name="peso" class="form-control" id="peso"
                        placeholder="Digite o peso do lixo (Ex: 45,00kg)">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Lixo:</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Digite uma breve descrição">
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="funcionarios">Funcionário(s) Responsáveis:</label>
                    <select class="select_funcionarios w-100" id="funcionarios" name="funcionarios[]" multiple="multiple">
                        @foreach ($funcionarios as $funcionario)
                            <option value="{{$funcionario->id}}">{{$funcionario->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="materiais">Materiais Recolhidos:</label>
                    <select class="select_materiais w-100" id="materiais" name="materiais[]" multiple="multiple">
                        @foreach ($materiais as $material)
                            <option value="{{$material->id}}">{{$material->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="tipo" value="0">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
