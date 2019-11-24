$(function () {
  // Active menú
  $('#home-open').addClass('menu-open');
  $('#general-info').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /* Social Media table
  *****************************/
  $('#socialmedia-table').DataTable( {
    "ordering": false,
    "info": false,
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/social-media",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_socialmedia"},
      {"data":"name"},
      {"data":"url"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_socialmedia']);
      $(nRow).attr('data-id', +aData['id_socialmedia']);
      $(nRow).attr('class', 'item-socialmedia');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] },
      { 'aTargets': [ 1 ], 'width': '10%' }
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
  });
  $('#socialmedia-table').attr('style', 'cursor: pointer');
  $('#socialmedia-table_paginate').hide();

  // Show social media item
  $(document).on('click','.item-socialmedia', function(){
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/social-media/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputURL_smedia').val(array.data[0].url);
        $('#btnModify_smedia').data( "id", array.data[0].id_socialmedia );
      }
    });
    $('#socialmedia-modal').modal('show');
  });

  // Modify social media item
  $(document).on('click','#btnModify_smedia', function(){
    id = $('#btnModify_smedia').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('url',$('#inputURL_smedia').val());
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/social-media/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#socialmedia-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#socialmedia-modal').modal('hide');
  });
});