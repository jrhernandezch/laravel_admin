$(function () {
  // Initialize 
  // Editor Summernote
  $('.textarea').summernote({
    placeholder: 'Contingut del blog',
    tabsize: 2,
    height: 150
  });

  // Active menú
  $('#about-open').addClass('menu-open');
  $('#company').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Contact table
  $('#company-table').DataTable( {
    "processing": true,
    "serverSide": true,
    "searching": false,
    "ajax": {
      "url": "ajax/company-info",
      "type": 'post',
      "data": {
        "_token": $("meta[name='csrf-token']").attr("content")
      }
    },
    "columns":[
      {"data":"id_company"},
      {"data":"name"},
      {"data":"content"},
      {"data":"image"}
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
      $(nRow).attr('id', 'tr-'+aData['id_company']);
      $(nRow).attr('data-id', +aData['id_company']);
      $(nRow).attr('class', 'item-company');
    },
    "aoColumnDefs": [
      { 'bVisible': false, 'bSortable': false, 'aTargets': [ 0 ] },
      { 'aTargets': [ 1 ], 'width': '10%' },
      { 'aTargets': [ 3 ], 'width': '20%' },
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
  $('#company-table').attr('style', 'cursor: pointer');

  // Show company item
  $(document).on('click','.item-company', function(){
    id = $(this).data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('_token',$("meta[name='csrf-token']").attr("content"));

    $.ajax({
      url: "ajax/company/item",
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
        $('#btnModify').data( "id", array.data[0].id_company );
        $('#iditem').val(id);
      }
    });
    $('#company-modal').modal('show');
  });

  // Modify company item
  $(document).on('click','#btnModify', function(){
    id = $('#btnModify').data('id');
    
    var data = new FormData();
    data.append('id',id);
    data.append('name',$('#inputName').val());
    data.append('content',$('#inputContent').summernote('code'));

    $.ajax({
      url: "ajax/company/update",
      type: 'post',
      data: data,
      mimeType:"multipart/form-data",
      contentType: false,
      cache: false,
      processData:false,
      success: function(data, textStatus, jqXHR)
      {
        array = $.parseJSON(data);
        $('#company-table').DataTable().ajax.reload();
        swal("Modificació", "Modificat correctament", "success");        
      }
    });
    $('#company-modal').modal('hide');
  });
});