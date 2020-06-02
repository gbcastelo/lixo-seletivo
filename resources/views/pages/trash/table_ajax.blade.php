<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Data</th>
                <th>Peso</th>
                <th>Destino</th>
                <th>Funcionários</th>
                <th>Materiais</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Peso</th>
                <th>Destino</th>
                <th>Funcionários</th>
                <th>Materiais</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($trashs as $trash)
            <tr>
                <td>{{$trash->date->format('d/m/Y H:i')}}</td>
                <td>{{$trash->weight}}</td>
                @if ($trash->destination != null)
                    <td>{{$trash->destination->name}}</td>
                @else
                    <td>-</td>
                @endif
                <td>
                    @foreach ($trash->employees as $employee)
                    {{$employee->name}}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($trash->materials as $material)
                    {{$material->name}}<br>
                    @endforeach
                </td>
                @if ($trash->type == 0)
                    <td>Entrada</td>
                @else
                    <td>Saída</td>
                @endif
                <td>
                    @if ($trash->type == 0)
                        <a href="{{route('trash.edit.in', ['id' => $trash->id])}}">
                            <button type="button" class="btn btn btn-success" style="padding-right: 10px;">
                                <i class="far fa-edit"></i>
                            </button>
                        </a>
                    @else
                        <a href="{{route('trash.edit.out', ['id' => $trash->id])}}">
                            <button type="button" class="btn btn btn-success" style="padding-right: 10px;">
                                <i class="far fa-edit"></i>
                            </button>
                        </a>
                        
                    @endif
                    <a href="" id="delete_button" data-id="{{$trash->id}}">
                        <button type="button" class="btn btn btn-success">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>