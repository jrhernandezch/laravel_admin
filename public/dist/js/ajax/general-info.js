$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea_info').summernote({
    placeholder: 'Contingut de la informació',
    tabsize: 2,
    height: 150
  });

  // Active menú
  $('#home-open').addClass('menu-open');
  $('#general-info').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /* General info table
  *****************************/
  $('#general-info-table').DataTable( {
    "ordering": false,
    "info":     false,
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/general-info",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_info"},
      {"data":"name"},
      {"data":"content"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_info']);
      $(nRow).attr('data-id', +aData['id_info']);
      $(nRow).attr('class', 'item-generalinfo');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] },
      { 'aTargets': [ 1 ], 'width': '25%' }
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
  $('#general-info-table').attr('style', 'cursor: pointer');
  $('#general-info-table_paginate').hide();

  // Show General info item
  $(document).on('click','.item-generalinfo', function(){
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/general-info/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputContent_info').summernote('code', array.data[0].content);
        $('#btnModify_info').data( "id", array.data[0].id_info );
      }
    });
    $('#info-modal').modal('show');
  });

  // Modify General info item
  $(document).on('click','#btnModify_info', function(){
    id = $('#btnModify_info').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('content',$('#inputContent_info').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/general-info/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#general-info-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#info-modal').modal('hide');
  });
});