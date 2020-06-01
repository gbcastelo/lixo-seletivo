@extends('layouts.base')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-wrap">
        <h1>Bem vindo ao sistema Lixo Seletivo</h1>
        <h5 class="mb-5">Para adicionar um novo registro utilize o menu de Lixo</h5>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @component('pages.trash.table_ajax', ['trashs' => $trashs])
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
                url: "{{url('/trash_delete')}}",
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
