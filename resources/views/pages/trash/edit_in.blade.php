@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar cadastro de entrada</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('trash.save')}}">
                @csrf
                <div class="form-group">
                    <label for="data">Data da entrada:</label>
                    <input type="text" name="data" class="form-control" id="data" value="{{$trash->date->format('d/m/Y')}}"
                        placeholder="Digite a data de entrada do lixo" required>
                </div>
                <div class="form-group">
                    <label for="hora">Hora da entrada:</label>
                    <input type="text" name="hora" class="form-control" id="hora" value="{{$trash->date->format('H:i:s')}}"
                        placeholder="Digite a hora de entrada do lixo" required>
                </div>
                <div class="form-group">
                    <label for="peso">Peso do Lixo:</label>
                    <input type="text" name="peso" class="form-control" id="peso" value="{{$trash->weight}}"
                        placeholder="Digite o peso do lixo (Ex: 45,00kg)" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Lixo:</label>
                    <input type="text" name="descricao" class="form-control" id="descricao" value="{{$trash->description}}"
                        placeholder="Digite uma breve descrição" required>
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="funcionarios">Funcionário(s) Responsáveis:</label>
                    <select class="select_funcionarios w-100" id="funcionarios" name="funcionarios[]" multiple="multiple">
                        @foreach ($trash->employees as $employee)
                            <option selected value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                        @foreach ($employee_un as $emp_un)
                            <option value="{{$emp_un->id}}">{{$emp_un->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group d-flex flex-column">
                    <label for="materiais">Materiais Recolhidos:</label>
                    <select class="select_materiais w-100" name="materiais[]" id="materiais" multiple="multiple">
                        @foreach ($trash->materials as $material)
                            <option selected value="{{$material->id}}">{{$material->name}}</option>
                        @endforeach
                        @foreach ($material_un as $mat_un)
                            <option value="{{$mat_un->id}}">{{$mat_un->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="{{$trash->id}}">
                    <input type="hidden" name="tipo" value="0">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
