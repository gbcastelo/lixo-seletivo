@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar cadastro de destino</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('destination.save')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome da Empresa</label>
                    <input type="text" name="nome" class="form-control" id="nome"
                        placeholder="Digite o nome da empresa" value="{{$destination->name}}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do Destino</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Digite uma breve descrição" value="{{$destination->description}}" required>
                </div>
                <div class="form-group">
                    <label for="finalidade">Finalidade do Destino</label>
                    <input type="text" name="finalidade" class="form-control" id="finalidade"
                        placeholder="Digite a finalidade. Ex: Aterro, Incineração" value="{{$destination->finality}}" required>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="{{$destination->id}}">
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

@if(session('success'))
<script>
    $(function () {
            Swal.fire(
                'Sucesso!',
                '{{session('success')}}',
                'success'
            )
        });
</script>
@endif

@endsection
