<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWL - POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #home {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://adadimalang.com/wp-content/uploads/2021/03/20210301_064620_0000_compress78.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        
        #informasi {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            margin-top: 30px;
        }
        
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">PWL - POS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#informasi">Informasi Umum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        <section id="home" class="py-5">
            <div class="container">
                <h1 class="display-4">Selamat Datang di PWL POS</h1>
                <p class="lead">Aplikasi Point of Sale (POS) sederhana untuk membantu pengelolaan transaksi dan stok barang Anda secara efisien.</p>
            </div>
        </section>
        
        <section id="informasi" class="py-5">
            <div class="container">
                <h2 class="mb-4 text-center">Informasi Umum</h2>
                <div class="row">
                    <div class="row-md-6">
                        <p>
                            PWL POS adalah aplikasi Point of Sale berbasis web yang dirancang untuk memudahkan pengelolaan transaksi penjualan dan stok barang. Dengan antarmuka yang sederhana dan fitur yang lengkap, PWL POS membantu pelaku usaha dalam mencatat penjualan, memantau persediaan, serta menghasilkan laporan secara efisien dan akurat.
                        </p>
                    </div>
                    <div class="row-md-6">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/KZcsXBap-JI?si=VluhbIiHOJRuCu7P" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="contact" class="py-5 bg-light">
            <div class="container">
                <h2 class="mb-4 text-center">Hubungi Kami</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <p>Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, silakan hubungi kami melalui email di <a href="mailto:info@pwlpos.com">info@pwlpos.com</a> atau telepon ke <a href="tel:+628123456789">+62 812-3456-789</a>.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-3 bg-dark text-white text-center">
        <div class="container">
            &copy; {{ date('Y') }} PWL - POS. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>