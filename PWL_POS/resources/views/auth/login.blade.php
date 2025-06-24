<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pengguna</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: #f4f6f9;
            /* font-family: 'Segoe UI', sans-serif; */
        }

        .login-wrapper {
            display: flex;
            min-height: 100vh;
            flex-wrap: wrap;
        }

        .login-left {
            flex: 1;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-right: 1px solid #ddd;
            position: relative;
        }

        .login-left img {
            width: 100%;
            max-width: 400px;
        }

        .login-left::after {
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

        .login-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: #f8f9fa;
        }

        .login-form-full {
            width: 100%;
            max-width: 420px;
        }

        .text-center a {
            color: #007bff;
        }

        .error-text {
            font-size: 0.85rem;
        }

        .input-group{
            
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

        .input-icon input {
            border: none;
            outline: none;
            flex: 1;
            padding: 5px 0;
            background: transparent;
        }

        .btn-login-full {
            width: 100%;
            padding: 10px;
            background: linear-gradient(270deg, #007bff, #00c6ff, #007bff);
            background-size: 600% 600%;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-position 0.5s ease;
        }

        .btn-login-full:hover {
            background-position: right center;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .icheck-primary {
            display: flex;
            align-items: center;
        }

        .icheck-primary input[type="checkbox"] {
            margin-right: 5px;
        }

    </style>
</head>

<body>
    <div class="login-wrapper">
        <!-- Bagian Kiri -->
        <div class="login-left">
            <img src="{{ asset('img/shopping-bag1.svg') }}" alt="Shopping Illustration" class="img-fluid" style="max-width: 80%;">

            <div class="text-center mt-4">
                <h4 class="font-weight-bold mb-1">PWL <span class="text-primary">POS</span></h4>
                <p class="text-muted">Jiha Ramdhan / 14 / 2341720043 / TI-2A</p>
            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="login-right">
            <div class="login-form-full">
                <a href="{{ url('/') }}" class="mb-3 d-inline-block text-primary" style="font-weight: 500;">
                    &larr; Kembali ke Beranda
                </a>
                <h2 class=" mb-1 text-left"><b>Selamat Datang!</b></h2>
                <p class="text-left text-muted mb-5">Silakan login untuk masuk</p>
        
                <form action="{{ url('/login') }}" method="POST" id="form-login">
                    @csrf
                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <span class="fas fa-user"></span>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        </div>
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>
                
                    <div class="input-group form-group-custom">
                        <div class="input-icon">
                            <span class="fas fa-lock"></span>
                            <input type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>
                
                    <div class="form-group-custom remember-login">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Ingat saya</label>
                        </div>
                    </div>
                
                    <button type="submit" class="btn-login-full mb-4 mt-4">Login</button>
                </form>
                
        
                <p class="text-center">
                    Belum punya akun? <a href="{{ url('register') }}">Daftar disini</a>
                </p>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
        
            .login-left, .login-right {
                flex: 1 0 auto;
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #ddd;
                padding: 1rem;
            }
        
            .login-left img {
                max-width: 60%;
            }
        
            .login-form-full {
                max-width: 100%;
            }
        
            .btn-login-full {
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
        $(document).ready(function() {
            $("#form-login").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 20
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
                                    title: 'Berhasil',
                                    text: response.message,
                                }).then(function() {
                                    window.location = response.redirect;
                                });
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
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
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>
