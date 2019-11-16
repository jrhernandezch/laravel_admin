$(function () {
  // Active menú
  $('#blog').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Blog table
  $('#blog-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/blog",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_blog"},
      {"data":"title"},
      {"data":"content"},
      {"data":"image"},
      {"data":"date"},
      {"data":"important"},
      {"data":"visible"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_contact']);
      $(nRow).attr('data-id', +aData['id_contact']);
      $(nRow).attr('class', 'item-blog');
      $(nRow).attr('data-toggle', 'modal');
      $(nRow).attr('data-target', '#blog-modal');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] },
      { 'aTargets': [ 1 ], 'width': '20%' },
      { 'aTargets': [ 2 ], 'width': '50%' },
      { 'aTargets': [ 3 ], 'width': '80px' }
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
  $('#blog-table').attr('style', 'cursor: pointer');
});