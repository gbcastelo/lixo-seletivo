@extends('layouts.base')

@section('content')
<div class="container">
    <div class="col-md-12 d-flex justify-content-center flex-column align-items-center">
        <h1>Editar permissão do usuário</h1>
        <div class="col-md-8 mb-5">
            <form method="POST" action="{{route('user.save.permission')}}">
                @csrf
                @if ($user->hasPermissionTo('edit users'))
                    <div class="form-group">
                        <label for="permissao">Selecione a permissão do usuário:</label>
                        <select class="form-control" name="permissao" id="permissao">
                            <option value="0">Admin</option>
                            <option value="1" selected>Super Admin</option>
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="permissao">Selecione a permissão do usuário:</label>
                        <select class="form-control" name="permissao" id="permissao">
                            <option value="0" selected>Admin</option>
                            <option value="1">Super Admin</option>
                        </select>
                    </div>
                @endif
                <div class="col-md-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
