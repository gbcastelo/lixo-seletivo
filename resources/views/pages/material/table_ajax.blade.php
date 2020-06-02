<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($materials as $material)
            <tr>
                <td>{{$material->name}}</td>
                <td>{{$material->description}}</td>
                <td>
                    <a href="{{route('material.edit', ['id' => $material->id])}}">
                        <button type="button" class="btn btn-success" style="padding-right: 10px;">
                            <i class="far fa-edit"></i>
                        </button>
                    </a>
                    <a href="" id="delete_button" data-id="{{$material->id}}">
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