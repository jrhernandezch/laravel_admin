$(function () {
  // Active menú
  $('#home-open').addClass('menu-open');
  $('#success-case').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Success case table
  $('#successcase-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/success-cases",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_service"},
      {"data":"name"},
      {"data":"phone_number"},
      {"data":"mail"},
      {"data":"content"},
      {"data":"date"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_service']);
      $(nRow).attr('data-id', +aData['id_service']);
      $(nRow).attr('class', 'item-success');
      $(nRow).attr('data-toggle', 'modal');
      $(nRow).attr('data-target', '#success-modal');
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

  //$("#successcase-table tr").addClass('cursor', 'pointer');
  $('#successcase-table').attr('style', 'cursor: pointer');
});