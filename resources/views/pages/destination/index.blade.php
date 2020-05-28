@extends('layouts.base')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start">
        <a href="{{route('destination.create')}}">
            <button type="button" class="btn btn-success mb-4">Adicionar Destino</button>
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @component('pages.destination.table_ajax', ['destinations' => $destinations])
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
                url: "{{url('/destination_delete')}}",
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

@if (Session::has('success_edit'))
    <script>
        swal({
            type: 'success',
            title: 'Sucesso!',
            text: '{{Session::get('success_edit')}}'
        })
    </script>
@endif

@if (Session::has('success_new'))
    <script>
        swal({
            type: 'success',
            title: 'Sucesso!',
            text: '{{Session::get('success_new')}}'
        })
    </script>
@endif

@endsection
