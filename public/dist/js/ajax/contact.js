$(function () {
  // Active menú
  $('#contact').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  /*
  $.ajax({
    url: "ajax/dades",
    method: 'post',
    data: {
    name: 'prova',
    "_token": $("meta[name='csrf-token']").attr("content")
    },
    dataType: "json",
    success: function(result){
    console.log(result);
  }}); */

  // Contact table
  $('#contact-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/dades",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_contact"},
      {"data":"name"},
      {"data":"phone_number"},
      {"data":"mail"},
      {"data":"content"},
      {"data":"date"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_contact']);
      $(nRow).attr('data-id', +aData['id_contact']);
      $(nRow).attr('class', 'item-contact');
      $(nRow).attr('data-toggle', 'modal');
      $(nRow).attr('data-target', '#contact-modal');
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
  $('#contact-table').attr('style', 'cursor: pointer');
});