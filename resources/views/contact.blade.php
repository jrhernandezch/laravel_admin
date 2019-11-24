@extends("main")

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Contacte</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Contacte</a></li>
            <li class="breadcrumb-item active">Contacte</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-olive">
              <h3 class="card-title">Registres de contactes formulades</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="contact-table" class="table table-hover table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Mail</th>
                  <th>Subject</th>
                  <th>Content</th>
                  <th>Checked</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Mail</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th>Checked</th>
                    <th>Date</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="contact-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-olive">
          <h4 class="modal-title">Contacte</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mailbox-read-info">
            <h5 id="subject"></h5>
            <h6><strong>From:</strong> <span id="name"></span> - <span id="mail"></span> <br> <strong>Phone:</strong><span id="phone_number"></span>
              <span class="mailbox-read-time float-right" id="date"></span></h6>
          </div>
          <!-- /.mailbox-read-info -->
          <div class="mailbox-controls with-border text-center">
            <div class="btn-group">
              <button type="button" class="btn btn-danger btn-sm" id="delete-contact" data-toggle="tooltip" data-container="body" title="Delete">
                <i class="far fa-trash-alt"></i></button>
            </div>
            <!-- /.btn-group -->
          </div>
          <!-- /.mailbox-controls -->
          <div class="mailbox-read-message">
            <p id="content"></p>
          </div>
          <!-- /.mailbox-read-message -->
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Acceptar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}">
  <!-- Sweetalert Css -->
  <link href="{!! asset('plugins/sweetalert/sweetalert.css') !!}" rel="stylesheet" />
@endsection

@section('script')
  <!-- DataTables -->
  <script src="{!! asset('plugins/datatables/jquery.dataTables.js') !!}"></script>
  <script src="{!! asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}"></script>
  <!-- Sweet Alert Plugin Js -->
  <script src="{!! asset('plugins/sweetalert/sweetalert.min.js') !!}"></script>
  <!-- data -->
  <script src="{!! asset('dist/js/ajax/contact.js') !!}"></script>
@endsection