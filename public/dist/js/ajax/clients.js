$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea').summernote({
    placeholder: 'Descripció del client',
    tabsize: 2,
    height: 150
  });
  // Btn send
  $('#btnSend').css('display', 'none');

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

  // Show client item
  $(document).on('click','.item-client', function(){
    activeBtn("update");
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/clients/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputName').val(array.data[0].name);
        $('#inputContent').summernote('code', array.data[0].content);
        $('#btnDelete').data( "id", array.data[0].id_client );
        $('#btnModify').data( "id", array.data[0].id_client );
        $('#btnUpload').data( "id", array.data[0].id_client );
      }
    });
    $('#client-modal').modal('show');
  });

  // Modify client item
  $(document).on('click','#btnModify', function(){
    id = $('#btnModify').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('name',$('#inputName').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/clients/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#clients-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#client-modal').modal('hide');
  });

  // Delete client item
  $(document).on('click','#btnDelete', function(){
    swal({
      title: "Estàs segur?",
      text: "Aquest client s'eliminarà completament.",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function (isConfirm) {
      if (isConfirm) {
        id = $("#btnDelete").data('id');

        var data = new FormData();
        data.append('id',id);
        data.append('_token',$("meta[name='csrf-token']").attr("content"));

        $.ajax({
          type: 'POST',
          url: 'ajax/clients/delete',
          data: data,
          mimeType:"multipart/form-data",
          contentType: false,
          cache: false,
          processData: false,
          success: function (data) {
            swal("Eliminar", "Eliminat correctament", "success");
          }
        });
      } else {
        swal("Cancel·lat", "No s'ha fet cap acció.", "error");
      }
      $('#clients-table').DataTable().ajax.reload();
      $('#client-modal').modal('hide');
    });
  });

  // New blog item
  $(document).on('click','#new-client', function(){
    activeBtn("upload");
    $('#inputName').val("");
    $('#inputContent').summernote('code', "");
    $('#client-modal').modal('show');
  });

  // Send new client
  $(document).on('click','#btnSend', function(){   
    var data = new FormData();
    data.append('name',$('#inputName').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/clients/new",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        if(array.data == 1){
          swal("Nou client", "Afegit correctament", "success");
        }
      }
    });
    activeBtn("update");
    $('#clients-table').DataTable().ajax.reload();
    $('#client-modal').modal('hide');
  });

  function activeBtn(action) {
    if(action == "upload"){
      $('#btnSend').css('display', 'inline-block');
      $('#btnDelete').css('display', 'none');
      $('#btnModify').css('display', 'none');
      $('#btnUpload').css('display', 'none');
    }else{
      $('#btnDelete').css('display', 'inline-block');
      $('#btnModify').css('display', 'inline-block');
      $('#btnUpload').css('display', 'inline-block');
      $('#btnSend').css('display', 'none');
    }
  }
});