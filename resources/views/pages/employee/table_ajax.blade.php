<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #43c647;color: white;">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Função</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tfoot style="background-color: #43c647;color: white;">
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
                        <button type="button" class="btn button-actions" style="padding-right: 10px;">
                            <i class="far fa-edit"></i>
                        </button>
                    </a>
                    <a href="" id="delete_button" data-id="{{$employee->id}}">
                        <button type="button" class="btn button-actions">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>