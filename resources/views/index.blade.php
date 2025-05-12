<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teman Baca</title>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- icon fontawesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">

    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">

    <style>
        nav .navbar-brand {
            color: white;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        nav .navbar-nav {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #000;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Teman<span>Baca</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>

                <!-- Bagian Login/Register di kanan -->
                @if (Route::has('login'))
                <div class="d-flex">
                    @auth
                    <a href="{{ url('/home') }}" class="nav-link text-white me-2">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="nav-link text-white me-2">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>
    <section style="background-color: #000; color: white; height: 100vh;" class="d-flex align-items-center justify-content-center text-center">
        <div>
            <h1 class="display-4 fw-bold">Selamat Datang di <span style="color: #00ffcc;">TemanBaca</span></h1>
            <p class="lead mt-3">Bagikan pikiranmu, tuliskan ceritamu, dan temukan inspirasi.</p>
            <a href="{{ route('register') }}" class="btn btn-outline-light mt-4">Daftar Sekarang</a>
            <a href="{{ route('login') }}" class="btn btn-light mt-4 ms-2">Login</a>
        </div>
    </section>

    <!-- Gambar + Penjelasan Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://source.unsplash.com/600x400/?blog,writing" alt="Blog Image" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Kenapa Memilih TemanBaca?</h2>
                    <ul>
                        <li>✍️ Buat dan kelola posting blogmu sendiri</li>
                        <li>💬 Komentar dan diskusi antar pengguna</li>
                        <li>🔍 Fitur pencarian & filter pintar</li>
                        <li>🔐 Aman, cepat, dan mudah digunakan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Tentang TemanBaca Section -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container text-center">
            <h2 class="mb-4">Apa Itu <span style="color: #00cc99;">TemanBaca</span>?</h2>
            <p class="lead mx-auto" style="max-width: 800px;">
                <strong>TemanBaca</strong> adalah platform menulis dan berbagi cerita bagi siapa saja yang ingin mengekspresikan pikiran, ide, dan pengalaman.
                Di sini, kamu bisa membuat blog, membaca karya pengguna lain, dan berinteraksi melalui komentar.
                Kami percaya bahwa setiap cerita layak untuk didengar dan dibagikan.
            </p>
        </div>
    </section>

    <!-- Carousel Kutipan Tokoh -->
    <section class="py-5 text-dark">
        <div class="container text-center">
            <h2 class="mb-4">Kata Mereka Tentang Membaca</h2>

            <div id="quoteCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <p class="mb-4">"Membaca adalah jendela dunia."</p>
                            <footer class="blockquote-footer text-white-50">Anonim</footer>
                        </blockquote>
                    </div>

                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-4">"Semakin banyak kamu membaca, semakin banyak hal yang kamu ketahui."</p>
                            <footer class="blockquote-footer text-white-50">Dr. Seuss</footer>
                        </blockquote>
                    </div>

                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-4">"Membaca memberi kita tempat untuk pergi ketika kita harus tinggal di tempat kita berada."</p>
                            <footer class="blockquote-footer text-white-50">Mason Cooley</footer>
                        </blockquote>
                    </div>

                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p class="mb-4">"Seorang pembaca hari ini adalah seorang pemimpin esok hari."</p>
                            <footer class="blockquote-footer text-white-50">Margaret Fuller</footer>
                        </blockquote>
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#quoteCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#quoteCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Selanjutnya</span>
                </button>
            </div>
        </div>
    </section>


    <!-- Testimonial Section -->
    <section class="py-5 text-dark" style="background-color: #fff;">
        <div class="container text-center">
            <h2 class="mb-5">Apa Kata Pengguna Kami?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 bg-secondary text-white border-0 shadow">
                        <div class="card-body">
                            <p class="card-text">"TemanBaca telah membantu saya untuk lebih ekspresif dalam berbagi ide!"</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-white-50">— Indah, Blogger</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 bg-secondary text-white border-0 shadow">
                        <div class="card-body">
                            <p class="card-text">"Fitur pencarian dan filter sangat memudahkan saya menemukan posting yang relevan."</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-white-50">— Andi, Developer</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 bg-secondary text-white border-0 shadow">
                        <div class="card-body">
                            <p class="card-text">"Sangat mudah dan cepat membuat blog saya dengan TemanBaca!"</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-white-50">— Rina, Content Creator</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-white pt-5 pb-4" style="background-color: #000;">
        <div class="container text-md-left">
            <div class="row text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">TemanBaca</h5>
                    <p>TemanBaca adalah platform blog modern untuk berbagi cerita, inspirasi, dan ide menarik dari para penulis dan pembaca di seluruh Indonesia.</p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Tautan</h5>
                    <p><a href="#" class="text-white text-decoration-none">Beranda</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Tentang</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Fitur</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Kontak</a></p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Ikuti Kami</h5>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-youtube fa-lg"></i></a>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Kontak</h5>
                    <p><i class="fas fa-home me-2"></i> Bandung, Indonesia</p>
                    <p><i class="fas fa-envelope me-2"></i> info@TemanBaca.id</p>
                    <p><i class="fas fa-phone me-2"></i> +62 899 3706 427</p>
                </div>
            </div>

            <hr class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p>© 2025 TemanBaca. Semua Hak Dilindungi.</p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <p class="text-end">Mohammad Rais Setiadi</p>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>