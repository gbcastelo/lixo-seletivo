<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->description}}</td>
                <td>{{$employee->function}}</td>
                <td>
                    <a href="{{route('employee.edit', ['id' => $employee->id])}}">
                        <button type="button" class="btn btn-success" style="padding-right: 10px;">
                            <i class="far fa-edit"></i>
                        </button>
                    </a>
                    <a href="" id="delete_button" data-id="{{$employee->id}}">
                        <button type="button" class="btn btn-success">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>