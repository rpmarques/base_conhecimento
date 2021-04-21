      </div>
    </div>
  </div>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/popper.min.js"> </script>
  <script src="./js/bootstrap.min.js"> </script>  
  <script src="./js/select2.min.js"></script>
  <script src="./js/i18n/pt-BR.js"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="////cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
  
<script>
   // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    // Use only for V1
    $('#radioBtn span').on('click', function(){
        var sel = $(this).data('value');
        var tog = $(this).data('toggle');
        $('#'+tog).val(sel);
        // You can change these lines to change classes (Ex. btn-default to btn-danger)
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active btn-primary').addClass('notActive btn-default');
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive btn-default').addClass('active btn-primary');
    });
    
    // Use only for V2
    $('#radioBtnV2 span').on('click', function(){
        var sel = $(this).data('value');
        var tog = $(this).data('toggle');
        var active = $(this).data('active');
        var classes = "btn-default btn-primary btn-success btn-info btn-warning btn-danger btn-link";
        var notactive = $(this).data('notactive');
        $('#'+tog).val(sel);
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active '+classes).addClass('notActive '+notactive);
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive '+classes).addClass('active '+active);
    });
    
    
    
    
    
    
    $('.select2').select2({
        language: "pt-BR"
    });
    $('#tabela').DataTable({
        "oLanguage": {
                       "sProcessing": "Processando...",
                       "sLengthMenu": "Mostrar _MENU_ registros",
                       "sZeroRecords": "Não foram encontrados resultados",
                       "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                       "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
                       "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
                       "sInfoPostFix": "",
                       "sSearch": "Buscar:",
                       "sUrl": "",
                       "oPaginate": {
                           "sFirst": "Primeiro",
                           "sPrevious": "Anterior",
                           "sNext": "Seguinte",
                           "sLast": "Último"
                       }
                   }
    });
});
</script>
  
  
</body>

</html>
