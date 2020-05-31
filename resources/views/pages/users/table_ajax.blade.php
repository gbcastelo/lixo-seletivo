<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{route('user.edit.name', ['id' => $user->id])}}">
                        <button title="Editar nome do usuário" type="button" class="btn btn-success" style="padding-right: 10px;">
                            <i class="fas fa-user-edit"></i>
                        </button>
                    </a>
                    <a href="{{route('user.edit.email', ['id' => $user->id])}}">
                        <button title="Editar email do usuário" type="button" class="btn btn-success" style="padding-right: 10px;">
                            <i class="fas fa-at"></i>
                        </button>
                    </a>
                    <a href="{{route('user.edit.pass', ['id' => $user->id])}}">
                        <button title="Editar senha do usuário" type="button" class="btn btn-success" style="padding-right: 10px;">
                            <i class="fas fa-unlock"></i>
                        </button>
                    </a>
                    <a href="{{route('user.edit.permission', ['id' => $user->id])}}">
                        <button title="Editar permissão do usuário" type="button" class="btn btn-success" style="padding-right: 10px;">
                            <i class="fas fa-crown"></i>
                        </button>
                    </a>
                    <a href="" id="delete_button" data-id="{{$user->id}}">
                        <button title="Excluir usuário" type="button" class="btn btn-success">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>