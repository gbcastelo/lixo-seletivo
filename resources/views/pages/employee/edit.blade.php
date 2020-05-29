@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar cadastro de funcionário</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('employee.save')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome do funcionário</label>
                    <input type="text" name="nome" class="form-control" id="nome"
                        placeholder="Digite o nome do funcionário" value="{{$employee->name}}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Funcionário</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Digite uma breve descrição" value="{{$employee->description}}" required>
                </div>
                <div class="form-group">
                    <label for="funcao">Função do Funcionário</label>
                    <input type="text" name="funcao" class="form-control" id="funcao"
                        placeholder="Digite a função exercida" value="{{$employee->function}}" required>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="{{$employee->id}}">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>

@endsection
