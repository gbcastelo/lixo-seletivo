<!-- Bootstrap core JavaScript-->

<script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

<!-- Core plugin JavaScript-->
<script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>

<!-- Custom scripts for all pages-->
<script src={{asset("js/sb-admin-2.min.js")}}></script>

<!-- Page level plugins -->


<!-- Page level custom scripts -->
<script src={{asset("js/demo/datatables-demo.js")}}></script>

<script src={{asset("vendor/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("vendor/datatables/dataTables.bootstrap4.min.js")}}></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

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

<script>
    $(document).ready(function(){
        $('#data').mask('00/00/0000');
        $('#hora').mask('00:00');
        $('.select_funcionarios').select2({
            placeholder: "Selecione os funcionários"
        });
        $('.select_materiais').select2({
            placeholder: "Selecione os materiais"
        });
    });
</script>

<script>
    @if ($errors->any())              
        errors = {!! json_encode($errors->messages()) !!};
            out = '';
            for (var p in errors) {
            out += errors[p] + '\n' ;
            }
        swal({
            type: 'error',
            title: 'Erro!',
            text : `${out}`          
        });
    @endif
</script>





<script type="text/javascript">
    $('#dataTable').dataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha",
                    "_": "Selecionado %d linhas"
                }
            },
            "buttons": {
                "copy": "Copiar para a área de transferência",
                "copyTitle": "Cópia bem sucedida",
                "copySuccess": {
                    "1": "Uma linha copiada com sucesso",
                    "_": "%d linhas copiadas com sucesso"
                }
            }
        }
    }); 
</script>
