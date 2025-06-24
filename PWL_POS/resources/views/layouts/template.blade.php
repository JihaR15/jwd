<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'PWL Laravel Starter Code') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.header')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-olive elevation-1">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('polinema.png') }}" alt="AdminLTE Logo" class="brand-image img-circle " style="opacity: .8">
        {{-- <span class="brand-text"><strong>PWL</strong> (Point Of Sales)</span> --}}
        <strong class="brand-text">PWL <span class="text-teal">POS</span></strong>
      </a>

      <!-- Sidebar -->
      @include('layouts.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('layouts.breadcrumb')

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')
  </div>
  <!-- ./wrapper -->



  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables & Plugins -->
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <!-- jquery-validation -->
  <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  <script>
    $(document).on('click', '.btn-edit-akun', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
    
        $('#myModal').load(url,function(){ 
            $('#myModal').modal('show'); 
        }).fail(function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Tidak dapat memuat form edit.'
            });
        });
    });

    function printStruk() {
            var strukContent = document.getElementById('modalStrukContent').innerHTML;

            var printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Struk Penjualan</title>
                    <style>
                        body { font-family: monospace; padding: 10px; }
                        .center { text-align: center; }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { padding: 4px; text-align: left; font-size: 12px; }
                        .footer { margin-top: 10px; text-align: center; font-size: 12px; }
                        .total { font-weight: bold; font-size: 14px; margin-top: 10px; }
                    </style>
                </head>
                <body>
                    ${strukContent}
                </body>
                </html>
            `);
            printWindow.document.close();
        }

        function showStruk(strukUrl) {
            console.log("Struk URL: ", strukUrl); 
            // Memuat konten struk ke dalam modal menggunakan AJAX
            $.get(strukUrl, function(data) {
                console.log("Data struk: ", data);
                $('#modalStrukContent').html(data);  // Isi modal dengan data struk
                console.log('Menampilkan modalStruk');
                $('#modalStruk').modal('show');      // Tampilkan modal
            }).fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Tidak dapat memuat struk.'
                });
            });
        }
  </script>
  <!-- Modal Struk -->
  <div class="modal fade" id="modalStruk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Struk Penjualan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" id="modalStrukContent">
          <!-- struk AJAX -->
        </div>
        <div class="modal-footer">
          <button onclick="printStruk()" class="btn btn-primary">Cetak</button>
        </div>
      </div>
    </div>
  </div>
  
  <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div> 
  @stack('js')
</body>

</html>