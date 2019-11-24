$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea').summernote({
    placeholder: 'Descripció del client',
    tabsize: 2,
    height: 150
  });

  // Active menú
  $('#home-open').addClass('menu-open');
  $('#services').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Services table
  $('#services-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/services",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_service"},
      {"data":"title"},
      {"data":"content"},
      {"data":"image"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_service']);
      $(nRow).attr('data-id', +aData['id_service']);
      $(nRow).attr('class', 'item-services');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] },
      { 'aTargets': [ 1 ], 'width': '20%' },
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
  $('#services-table').attr('style', 'cursor: pointer');

  // Show services item
  $(document).on('click','.item-services', function(){
    activeBtn("update");
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/services/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputName').val(array.data[0].title);
        $('#inputContent').summernote('code', array.data[0].content);
        $('#btnDelete').data( "id", array.data[0].id_service );
        $('#btnModify').data( "id", array.data[0].id_service );
        $('#btnUpload').data( "id", array.data[0].id_service );
      }
    });
    $('#services-modal').modal('show');
  });

  // Modify services item
  $(document).on('click','#btnModify', function(){
    id = $('#btnModify').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('name',$('#inputName').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/services/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#services-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#services-modal').modal('hide');
  });

  // Delete services item
  $(document).on('click','#btnDelete', function(){
    swal({
      title: "Estàs segur?",
      text: "Aquest servei s'eliminarà completament.",
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
          url: 'ajax/services/delete',
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
      $('#services-table').DataTable().ajax.reload();
      $('#services-modal').modal('hide');
    });
  });

  // New service item
  $(document).on('click','#new-service', function(){
    activeBtn("upload");
    $('#inputName').val("");
    $('#inputContent').summernote('code', "");
    $('#services-modal').modal('show');
  });

  // Send new service
  $(document).on('click','#btnSend', function(){   
    var data = new FormData();
    data.append('name',$('#inputName').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/services/new",
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
          swal("Nou servei", "Afegit correctament", "success");
        }
      }
    });
    activeBtn("update");
    $('#services-table').DataTable().ajax.reload();
    $('#services-modal').modal('hide');
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