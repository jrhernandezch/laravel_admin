$(function () {
  // Active menú
  $('#contact').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  /*
  $.ajax({
    url: "ajax/dades",
    method: 'post',
    data: {
    name: 'prova',
    "_token": $("meta[name='csrf-token']").attr("content")
    },
    dataType: "json",
    success: function(result){
    console.log(result);
  }}); */

  // Contact table
  $('#contact-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/contact",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_contact"},
      {"data":"name"},
      {"data":"phone_number"},
      {"data":"mail"},
      {"data":"subject"},
      {"data":"content"},
      {"data":"date"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_contact']);
      $(nRow).attr('data-id', +aData['id_contact']);
      $(nRow).attr('class', 'item-contact');
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
  $('#contact-table').attr('style', 'cursor: pointer');

  // Show contact item
  $(document).on('click','.item-contact', function(){
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/contact/item",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#name').html(array.data[0].name);
        $('#content').html(array.data[0].content);
        $('#mail').html(array.data[0].mail);
        $('#date').html(array.data[0].date);
        $('#subject').html(array.data[0].subject);
        $('#phone_number').html(array.data[0].phone_number);
        $('#delete-contact').data( "id", array.data[0].id_contact );
      }
    });
    $('#contact-modal').modal('show');
  });

  // Delete contact item
  $(document).on('click','#delete-contact', function(){
    swal({
      title: "Estàs segur?",
      text: "Aquest contacte s'eliminarà completament.",
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
        id = $("#delete-contact").data('id');

        var data = new FormData();
        data.append('id',id);
        data.append('_token',$("meta[name='csrf-token']").attr("content"));

        $.ajax({
          type: 'POST',
          url: 'ajax/contact/delete',
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
      $('#contact-table').DataTable().ajax.reload();
      $('#contact-modal').modal('hide');
    });
  });
});