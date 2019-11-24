$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea_icons').summernote({
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

  /* Icons table
  *****************************/
  $('#icons-table').DataTable( {
    "ordering": false,
    "info":     false,
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/icons-info",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_icon"},
      {"data":"title"},
      {"data":"content"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_icon']);
      $(nRow).attr('data-id', +aData['id_icon']);
      $(nRow).attr('class', 'item-icons');
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
  $('#icons-table').attr('style', 'cursor: pointer');
  $('#icons-table_paginate').hide();
  
  // Show information icons item
  $(document).on('click','.item-icons', function(){
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/icons-info/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputTitle_icons').val(array.data[0].title);
        $('#inputIcon_icons').val(array.data[0].icon);
        $('#inputContent_icons').summernote('code', array.data[0].content);
        $('#btnModify_icons').data( "id", array.data[0].id_icon );
      }
    });
    $('#icons-modal').modal('show');
  });

  // Modify information icons item
  $(document).on('click','#btnModify_icons', function(){
    id = $('#btnModify_icons').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('title',$('#inputTitle_icons').val());
    data.append('icon',$('#inputIcon_icons').val());
    data.append('content',$('#inputContent_icons').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/icons-info/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#icons-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#icons-modal').modal('hide');
  });
});