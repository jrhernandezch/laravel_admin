@extends("main")

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informació genèrica</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Portada</a></li>
            <li class="breadcrumb-item active">Informació genèrica</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Info with icons -->
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header bg-olive">
              <h3 class="card-title">Informació addicional amb icones</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="icons-table" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Content</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Content</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- End table -->

        <!-- Generic info table -->
        <div class="col-6">
          <div class="card">
            <div class="card-header bg-gray">
              <h3 class="card-title">Informació genèrica</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="general-info-table" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Content</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Content</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <div class="row">
        <!-- Social media table -->
        <div class="col-6">
          <div class="card">
            <div class="card-header bg-info">
              <h3 class="card-title">Xarxes socials</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="socialmedia-table" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>URL</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>URL</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- End table -->

        <!-- Slide table -->
        <div class="col-6">
          <div class="card">
            <!-- card-header -->
            <div class="card-header bg-warning">
              <h3 class="card-title">Informació amb Slide</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="slide-table" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Content</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Content</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- End table -->
      </div>
    </div><!-- /.container-fluid -->
  </div>

  <!-- Modal slide-->
  <div class="modal fade" id="slide-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-olive">
          <h4 class="modal-title">Slide</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="inputTitle_slide">Nom client</label>
                <input type="text" class="form-control" id="inputTitle_slide" placeholder="Títol del slide">
              </div>
            </div>
            <div class="col-6"></div>
            <div class="col-12">
              <div class="mb-3">
                <label for="inputContent_slide">Contingut</label>
                <textarea class="textarea_slide" id="inputContent_slide"></textarea>
              </div>
            </div>
            <div class="col-12">
              <p><strong>Pujar nova imatge</strong></p>
              <form action="{{ route('image.upload.post', ['dir' => 'slide']) }}" method="POST" enctype="multipart/form-data">
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
            <button class="btn btn-danger flat" id="btnModify_slide">Modificar</button>
            <button class="btn btn-default flat" id="btnCancel_slide" data-dismiss="modal">Cancel·lar</button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal social media-->
  <div class="modal fade" id="socialmedia-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-olive">
          <h4 class="modal-title">Xarxes socials</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="inputURL_smedia">URL</label>
                <input type="text" class="form-control" id="inputURL_smedia" placeholder="URL de la xarxa">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="justify-content-end">
            <button class="btn btn-danger flat" id="btnModify_smedia">Modificar</button>
            <button class="btn btn-default flat" id="btnCancel_smedia" data-dismiss="modal">Cancel·lar</button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal information icons -->
  <div class="modal fade" id="icons-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-olive">
          <h4 class="modal-title">Informació amb icones</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="inputTitle_icons">Títol icona</label>
                <input type="text" class="form-control" id="inputTitle_icons" placeholder="Títol de la icona">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="inputIcon_icons">Icona (<a href="https://khan.github.io/Font-Awesome/icons/" target="_blank">Catàleg</a>)</label>
                <input type="text" class="form-control" id="inputIcon_icons" placeholder="Tag de la icona">
              </div>
            </div>
            <div class="col-6"></div>
            <div class="col-12">
              <div class="mb-3">
                <label for="inputContent_icons">Contingut</label>
                <textarea class="textarea_icons" id="inputContent_icons"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="justify-content-end">
            <button class="btn btn-danger flat" id="btnModify_icons">Modificar</button>
            <button class="btn btn-default flat" id="btnCancel_icons" data-dismiss="modal">Cancel·lar</button>
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal information icons -->
  <div class="modal fade" id="info-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-olive">
          <h4 class="modal-title">Informació amb icones</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6"></div>
            <div class="col-12">
              <div class="mb-3">
                <label for="inputContent_info">Contingut</label>
                <textarea class="textarea_info" id="inputContent_info"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="justify-content-end">
            <button class="btn btn-danger flat" id="btnModify_info">Modificar</button>
            <button class="btn btn-default flat" id="btnCancel_info" data-dismiss="modal">Cancel·lar</button>
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
  <link rel="stylesheet" href="{!! asset('plugins/sweetalert/sweetalert.css') !!}">
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
  <script src="{!! asset('dist/js/ajax/general-info.js') !!}"></script>
  <script src="{!! asset('dist/js/ajax/slide.js') !!}"></script>
  <script src="{!! asset('dist/js/ajax/social-media.js') !!}"></script>
  <script src="{!! asset('dist/js/ajax/icons-info.js') !!}"></script>
  <script src="{!! asset('dist/js/pages/global.js') !!}"></script>
@endsection