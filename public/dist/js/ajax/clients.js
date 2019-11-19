$(function () {
  // Active menú
  $('#about-open').addClass('menu-open');
  $('#clients').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Contact table
  $('#clients-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/clients-info",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_client"},
      {"data":"name"},
      {"data":"content"},
      {"data":"image"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_client']);
      $(nRow).attr('data-id', +aData['id_client']);
      $(nRow).attr('class', 'item-client');
      $(nRow).attr('data-toggle', 'modal');
      $(nRow).attr('data-target', '#client-modal');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] }
    ],
    "language": {
      "lengthMenu": "Mostrar _MENU_ recepcions per pàgina. ",
      "zeroRecords": "No hi ha resultats",
      "info": "S'han trobat _TOTAL_ recepcions. Mostrant pàgina _PAGE_ de _PAGES_.",
      "infoEmpty": "No hi ha resultats.",
      "search": "Buscar",
      "infoFiltered": "",
      "oPaginate": {
        "sFirst":    "Primer",
        "sLast":     "Últim",
        "sNext":     "Seguent",
        "sPrevious": "Anterior"
      },
    },
    "order": [[ 1, "asc" ]],
    "pageLength": 10
  });
  $('#clients-table').attr('style', 'cursor: pointer');
});