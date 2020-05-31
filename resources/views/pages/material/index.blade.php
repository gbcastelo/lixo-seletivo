@extends('layouts.base')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start">
        <a href="{{route('material.create')}}">
            <button type="button" class="btn btn-success mb-4">Adicionar Material</button>
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @component('pages.material.table_ajax', ['materials' => $materials])
            @endcomponent
        </div>
    </div>

</div>

<script>
$(document).on('click', '#delete_button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Você tem certeza?",
            type: "error",
            text: 'Isso irá deletar este registro permanentemente',
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Deletar",
            showCancelButton: true,
            cancelButtonText: 'Cancelar'
        },
        function() {
            $.ajax({
                type: "POST",
                url: "{{url('/material_delete')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id:id
                },
                success: function (data) {
                        swal({
                            type: 'success',
                            title: 'Sucesso!',
                            text: 'Registro deletado com sucesso'
                        })
                        $('#dataTable').empty();
                        $('#dataTable').html(data);
                    }
            });
    });
});
</script>

@endsection
