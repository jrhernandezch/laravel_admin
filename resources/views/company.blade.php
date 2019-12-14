@extends("main")

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sobre nosaltres</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Sobre nosaltres</a></li>
            <li class="breadcrumb-item active">Sobre nosaltres</li>
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
              <h3 class="card-title">Informació sobre l'empresa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="company-table" class="table table-hover table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Content</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Image</th>
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
  <div class="modal fade" id="company-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-olive">
          <h4 class="modal-title">Company</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="inputName">Nom</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nom de la companyia">
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="inputContent">Contingut</label>
                <textarea class="textarea" id="inputContent"></textarea>
              </div>
            </div>
            <div class="col-12">
              <p><strong>Pujar nova imatge</strong></p>
              <form action="{{ route('image.upload.post', ['dir' => 'about']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                    <input type="text" name="iditem" class="form-control" id="iditem" hidden>
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn bg-teal flat">Upload</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="justify-content-end">
            <button class="btn btn-danger flat" id="btnModify">Modificar</button>
            <button class="btn btn-default flat" id="btnCancel" data-dismiss="modal">Cancel·lar</button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@if (session('success'))
  <div id="alert-msg" data-msg="{{ session('success') }}"></div>
@endif

@section('css')
  <!-- summernote editor -->
  <link rel="stylesheet" href="{!! asset('plugins/summernote/summernote-bs4.css') !!}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}">
  <!-- Sweetalert Css -->
  <link href="{!! asset('plugins/sweetalert/sweetalert.css') !!}" rel="stylesheet" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{!! asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{!! asset('plugins/toastr/toastr.min.css') !!}">
@endsection

@section('script')
  <!-- Summernote editor -->
  <script src="{!! asset('plugins/summernote/summernote-bs4.min.js') !!}"></script>
  <!-- DataTables -->
  <script src="{!! asset('plugins/datatables/jquery.dataTables.js') !!}"></script>
  <script src="{!! asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}"></script>
  <!-- Sweet Alert Plugin Js -->
  <script src="{!! asset('plugins/sweetalert/sweetalert.min.js') !!}"></script>
  <!-- SweetAlert2 -->
  <script src="{!! asset('plugins/sweetalert2/sweetalert2.min.js') !!}"></script>
  <!-- Toastr -->
  <script src="{!! asset('plugins/toastr/toastr.min.js') !!}"></script>
  <!-- data -->
  <script src="{!! asset('dist/js/ajax/company.js') !!}"></script>
  <script src="{!! asset('dist/js/pages/global.js') !!}"></script>
@endsection