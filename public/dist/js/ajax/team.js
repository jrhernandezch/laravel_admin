$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea').summernote({
    placeholder: 'Descripció del professional',
    tabsize: 2,
    height: 150
  });
  // Btn send
  $('#btnSend').css('display', 'none');

  // Active menú
  $('#about-open').addClass('menu-open');
  $('#team').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Contact table
  $('#team-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/team-info",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_team"},
      {"data":"name"},
      {"data":"position"},
      {"data":"content"},
      {"data":"mail"},
      {"data":"image"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_team']);
      $(nRow).attr('data-id', +aData['id_team']);
      $(nRow).attr('class', 'item-team');
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
  $('#team-table').attr('style', 'cursor: pointer');

  // Show team item
  $(document).on('click','.item-team', function(){
    activeBtn("update");
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/team/item",
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
        $('#inputPosition').val(array.data[0].position);
        $('#inputMail').val(array.data[0].mail);
        $('#btnDelete').data( "id", array.data[0].id_team );
        $('#btnModify').data( "id", array.data[0].id_team );
        $('#btnUpload').data( "id", array.data[0].id_team );
      }
    });
    $('#team-modal').modal('show');
  });

  // Modify team item
  $(document).on('click','#btnModify', function(){
    id = $('#btnModify').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('name',$('#inputName').val());
    data.append('position',$('#inputPosition').val());
    data.append('mail',$('#inputMail').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/team/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#team-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#team-modal').modal('hide');
  });

  // Delete team item
  $(document).on('click','#btnDelete', function(){
    swal({
      title: "Estàs segur?",
      text: "Aquest registre s'eliminarà completament.",
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
          url: 'ajax/team/delete',
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
      $('#team-table').DataTable().ajax.reload();
      $('#team-modal').modal('hide');
    });
  });

  // New team item
  $(document).on('click','#new-team', function(){
    activeBtn("upload");
    $('#inputName').val("");
    $('#inputPosition').val("");
    $('#inputMail').val("");
    $('#inputContent').summernote('code', "");
    $('#team-modal').modal('show');
  });

  // Send new team
  $(document).on('click','#btnSend', function(){   
    var data = new FormData();
    data.append('name',$('#inputName').val());
    data.append('position',$('#inputPosition').val());
    data.append('mail',$('#inputMail').val());
    data.append('content',$('#inputContent').summernote('code'));
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/team/new",
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
          swal("Nou treballador professional", "Afegit correctament", "success");
        }
      }
    });
    activeBtn("update");
    $('#team-table').DataTable().ajax.reload();
    $('#team-modal').modal('hide');
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