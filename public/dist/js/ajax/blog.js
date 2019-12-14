$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea').summernote({
    placeholder: 'Contingut del blog',
    tabsize: 2,
    height: 150
  });
  // Btn send
  $('#btnSend').css('display', 'none');

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
      $(nRow).attr('id', 'tr-'+aData['id_blog']);
      $(nRow).attr('data-id', +aData['id_blog']);
      $(nRow).attr('class', 'item-blog');
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
    "order": [[ 4, "desc" ]],
    "pageLength": 10
  });
  $('#blog-table').attr('style', 'cursor: pointer');

  // Show blog item
  $(document).on('click','.item-blog', function(){
    activeBtn("update");
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/blog/item",
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
        $('#checkVisible').prop('checked', array.data[0].visible);
        $('#checkImportant').prop('checked', array.data[0].important);
        $('#btnDelete').data( "id", array.data[0].id_blog );
        $('#btnModify').data( "id", array.data[0].id_blog );
        $('#iditem').val(id);
      }
    });
    $('#blog-modal').modal('show');
  });

  // Modify blog item
  $(document).on('click','#btnModify', function(){
    id = $('#btnModify').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('title',$('#inputTitle').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('visible',$('#checkVisible').is(":checked") ? 1 : 0);
    data.append('important',$('#checkImportant').is(":checked") ? 1 : 0);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/blog/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#blog-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#blog-modal').modal('hide');
  });

  // Delete blog item
  $(document).on('click','#btnDelete', function(){
    swal({
      title: "Estàs segur?",
      text: "Aquesta entrada de blog s'eliminarà completament.",
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
          url: 'ajax/blog/delete',
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
      $('#blog-table').DataTable().ajax.reload();
      $('#blog-modal').modal('hide');
    });
  });

  // New blog item
  $(document).on('click','#new-blog', function(){
    activeBtn("upload");
    $('#inputTitle').val("");
    $('#inputContent').summernote('code', "");
    $('#blog-modal').modal('show');
    $('#checkVisible').prop('checked', 0);
    $('#checkImportant').prop('checked', 0);
  });

  // Send new blog
  $(document).on('click','#btnSend', function(){   
    var data = new FormData();
    data.append('title',$('#inputTitle').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('visible',$('#checkVisible').is(":checked") ? 1 : 0);
    data.append('important',$('#checkImportant').is(":checked") ? 1 : 0);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/blog/new",
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
          swal("Nou blog", "Afegit correctament", "success");
        }
      }
    });
    activeBtn("update");
    $('#blog-table').DataTable().ajax.reload();
    $('#blog-modal').modal('hide');
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