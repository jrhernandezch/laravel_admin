$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea').summernote({
    placeholder: "Contingut del cas d'èxit",
    tabsize: 2,
    height: 150
  });

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
      {"data":"id_success"},
      {"data":"title"},
      {"data":"content"},
      {"data":"image"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_success']);
      $(nRow).attr('data-id', +aData['id_success']);
      $(nRow).attr('class', 'item-success');
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
  $('#successcase-table').attr('style', 'cursor: pointer');

  // Show success item
  $(document).on('click','.item-success', function(){
    activeBtn("update");
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/success/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#inputTitle').val(array.data[0].title);
        $('#inputContent').summernote('code', array.data[0].content);
        $('#btnDelete').data( "id", array.data[0].id_success );
        $('#btnModify').data( "id", array.data[0].id_success );
        $('#btnUpload').data( "id", array.data[0].id_success );
      }
    });
    $('#success-modal').modal('show');
  });

  // Modify success item
  $(document).on('click','#btnModify', function(){
    id = $('#btnModify').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('title',$('#inputTitle').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/success/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#successcase-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#success-modal').modal('hide');
  });

  // Delete success item
  $(document).on('click','#btnDelete', function(){
    swal({
      title: "Estàs segur?",
      text: "Aquest cas d'èxit s'eliminarà completament.",
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
          url: 'ajax/success/delete',
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
      $('#successcase-table').DataTable().ajax.reload();
      $('#success-modal').modal('hide');
    });
  });

  // New success item
  $(document).on('click','#new-case', function(){
    activeBtn("upload");
    $('#inputTitle').val("");
    $('#inputContent').summernote('code', "");
    $('#success-modal').modal('show');
  });

  // Send new success case
  $(document).on('click','#btnSend', function(){   
    var data = new FormData();
    data.append('title',$('#inputTitle').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/success/new",
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
          swal("Nou cas d'èxit", "Afegit correctament", "success");
        }
      }
    });
    activeBtn("update");
    $('#successcase-table').DataTable().ajax.reload();
    $('#success-modal').modal('hide');
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