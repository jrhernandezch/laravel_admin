$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea_slide').summernote({
    placeholder: 'Descripció del slide',
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

  /* Slide table
  *****************************/
  $('#slide-table').DataTable( {
    "ordering": false,
    "info":     false,
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/slide-info",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_slide"},
      {"data":"title"},
      {"data":"content"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_slide']);
      $(nRow).attr('data-id', +aData['id_slide']);
      $(nRow).attr('class', 'item-slide');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] },
      { 'aTargets': [ 1 ], 'width': '30%' }
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
  $('#slide-table').attr('style', 'cursor: pointer');
  $('#slide-table_paginate').hide();

  // Show slide item
  $(document).on('click','.item-slide', function(){
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/slide/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputTitle_slide').val(array.data[0].title);
        $('#inputContent_slide').summernote('code', array.data[0].content);
        $('#btnModify_slide').data( "id", array.data[0].id_slide );
        $('#iditem').val(id);
      }
    });
    $('#slide-modal').modal('show');
  });

  // Modify slide item
  $(document).on('click','#btnModify_slide', function(){
    id = $('#btnModify_slide').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('title',$('#inputTitle_slide').val());
    data.append('content',$('#inputContent_slide').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/slide/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#slide-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#slide-modal').modal('hide');
  });
});