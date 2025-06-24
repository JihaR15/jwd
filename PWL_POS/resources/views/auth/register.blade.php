<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Register Pengguna</title>
 
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
     <!-- icheck bootstrap -->
     <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
     {{-- SweetAlert2 --}}
     <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

     <style>
        .register-wrapper {
            display: flex;
            min-height: 100vh;
            flex-wrap: wrap;
        }

        .register-left {
            flex: 1;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-right: 1px solid #ddd;
            position: relative;
        }

        .register-left img {
            width: 100%;
            max-width: 400px;
        }

        .register-left::after {
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 1.2rem;
            font-style: italic;
            color: white;
            background: rgba(0, 0, 0, 0.4);
            padding: 6px 12px;
            border-radius: 5px;
        }

        .register-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: #f8f9fa;
        }

        .register-form-full {
            width: 100%;
            max-width: 420px;
        }

        .text-center a {
            color: green;
        }

        .error-text {
            font-size: 0.85rem;
        }

        .form-group-custom {
            margin-bottom: 20px;
        }

        .input-icon {
            display: flex;
            align-items: center;
            width: 100%;
            border-bottom: 1px solid #ccc;
            padding: 5px 0;
        }

        .input-icon span {
            margin-right: 10px;
            color: #999;
            font-size: 16px;
        }

        .input-icon input,
        .input-icon select {
            border: none;
            outline: none;
            flex: 1;
            padding: 5px 0;
            background: transparent;
            color: #495057;
        }

        .btn-register-full {
            width: 100%;
            padding: 10px;
            background: linear-gradient(270deg, #28a745, #00c851, #28a745);
            background-size: 600% 600%;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-position 0.5s ease;
        }

        .btn-register-full:hover {
            background-position: right center;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }

     </style>
 </head>
 
 <body>
    <div class="register-wrapper">
        <!-- Bagian Kiri -->
        <div class="register-right">
            <div class="register-form-full">
                <a href="{{ url('/') }}" class="mb-3 d-inline-block text-success" style="font-weight: 500;">
                    &larr; Kembali ke Beranda
                </a>
                <h2 class="mb-1 text-left"><b>Daftar Akun Baru</b></h2>
                <p class="text-left text-muted mb-4">Isi data lengkap untuk membuat akun</p>

                <form action="{{ url('register') }}" method="POST" id="form-register">
                    @csrf

                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <span class="fas fa-user"></span>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <small id="error-nama" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <span >@</span>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        </div>
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <span class="fas fa-lock"></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <span class="fas fa-lock"></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                        </div>
                        <small id="error-password_confirmation" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <select name="level_id" id="level_id" class="form-control text-secondary" disabled>
                                @php
                                    $stfLevel = $level->firstWhere('level_id', '3');
                                @endphp
                                @if($stfLevel)
                                    <option value="{{ $stfLevel->level_id }}" selected>{{ $stfLevel->level_nama }}</option>
                                @else
                                    <option value="">Level STF tidak ditemukan</option>
                                @endif
                            </select>
                            <input type="hidden" name="level_id" value="{{ $stfLevel ? $stfLevel->level_id : '' }}">
                        </div>
                        <small id="error-level_id" class="error-text text-danger"></small>
                    </div>

                    <button type="submit" class="btn-register-full mb-4 mt-4">Register</button>
                </form>

                <p class="text-center">
                    Sudah punya akun? <a href="{{ url('login') }}">Masuk disini</a>
                </p>
            </div>
        </div>

          <!-- Bagian Kanan -->
          <div class="register-left">
            <img src="{{ asset('img/register.svg') }}" alt="Register Illustration" class="img-fluid" style="max-width: 80%;">

            <div class="text-center mt-4">
                <h4 class="font-weight-bold mb-1">PWL <span class="text-olive">POS</span></h4>
                <p class="text-muted">Jiha Ramdhan / 14 / 2341720043 / TI-2A</p>
            </div>
        </div>
    </div>
</body>

<style>
    @media (max-width: 768px) {
    
        .register-left, .register-right {
            flex: 1 0 auto;
            width: 100%;
            border-right: none;
            border-bottom: 1px solid #ddd;
            padding: 1rem;
        }
    
        .register-left img {
            max-width: 60%;
        }
    
        .register-form-full {
            max-width: 100%;
        }
    
        .btn-register-full {
            font-size: 1rem;
        }
    }
</style>

 
     <!-- jQuery -->
     <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
     <!-- Bootstrap 4 -->
     <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <!-- jquery-validation -->
     <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
     <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
     <!-- SweetAlert2 -->
     <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
     <!-- AdminLTE App -->
     <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
 
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             const dropdown = document.getElementById('level_id');
             if (!dropdown.value) {
                 dropdown.classList.add('text-secondary');
             }
 
             dropdown.addEventListener('change', function() {
                 if (dropdown.value) {
                     dropdown.classList.remove('text-secondary');
                     dropdown.style.color = 'black';
                 } else {
                     dropdown.classList.add('text-secondary');
                     dropdown.style.color = '';
                 }
             });
         });
 
         $(document).ready(function() {
             $("#form-register").validate({
                 rules: {
                     nama: {
                         required: true,
                         minlength: 3
                     },
                     username: {
                         required: true,
                         minlength: 4,
                         maxlength: 20
                     },
                     password: {
                         required: true,
                         minlength: 5,
                         maxlength: 20
                     },
                     password_confirmation: {
                         required: true,
                         equalTo: "#password"
                     },
                     level_id: {
                         required: true,
                         number: true
                     }
                 },
                 messages: {
                     password_confirmation: {
                         equalTo: "Password tidak sama!"
                     }
                 },
                 submitHandler: function(form) {
                     $.ajax({
                         url: form.action,
                         type: form.method,
                         data: $(form).serialize(),
                         success: function(response) {
                             if (response.status) {
                                 Swal.fire({
                                     icon: 'success',
                                     title: "Register Berhasil",
                                     text: response.message,
                                 }).then(function() {
                                     window.location = response.redirect;
                                 });
                             } else {
                                 $('.error-text').text('');
                                 $.each(response.msgField, function(prefix, val) {
                                     $("#error-" + prefix).text(val[0]);
                                 });
                                 Swal.fire({
                                     icon: 'error',
                                     title: 'Terjadi Kesalahan',
                                     text: response.message
                                 });
                             }
                         }
                     });
                     return false;
                 },
                 errorElement: "span",
                 errorPlacement: function(error, element) {
                     error.addClass('invalid-feedback');
                     element.closest('.input-group').append(error);
                 },
                 highlight: function(element, errorClass, validClass) {
                     $(element).addClass('is-invalid');
                 },
                 unhighlight: function(element, errorClass, validClass) {
                     $(element).removeClass('is-invalid');
                 }
             });
         });
     </script>
 </body>
 
 </html>