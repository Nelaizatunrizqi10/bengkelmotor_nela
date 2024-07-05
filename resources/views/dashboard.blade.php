<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bengkel Motor XYZ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
    .profile-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .profile-dropdown:hover .dropdown-content {
            display: block;
        }
</style>
  <!-- Favicons -->
  <link href="{{ asset('Landing/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('Landing/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('Landing/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Landing/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('Landing/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('Landing/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('Landing/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('Landing/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Bengkel Motor</h1><span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#barang">Barang</a></li>
                    <li><a href="#kategori-service">Kategori Service</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="profile-dropdown">
                @if(Auth::check() && Auth::user()->profile)
                    <img src="{{ Storage::url('public/profile/' . Auth::user()->profile->image) }}" class="profile-icon" alt="Profile Picture">
                    <div class="dropdown-content">
                        <a href="{{ route('profile.edit', Auth::user()->profile->id) }}">Edit Profile</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="{{ route('profile.create') }}" class="btn btn-outline-primary">Create Profile</a>
                @endif
            </div>

        </div>
    </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <img src="{{ asset('Landing/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang, {{ Auth::user()->name }}</h2>
            <p data-aos="fade-up" data-aos-delay="200">Kami siap menerima servis motor Anda</p>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">
          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>Ducimus rerum libero reprehenderit cumque</h2>
            <p>Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias maxime. Enim reiciendis minus et rerum hic non. Dicta quas cum quia maiores iure. Quidem nulla qui assumenda incidunt voluptatem tempora deleniti soluta.</p>
            <a href="#" class="read-more"><span>Reservasi Sekarang</span><i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Eius provident</h3>
                  <p>Magni repellendus vel ullam hic officia accusantium ipsa dolor omnis dolor voluptatem</p>
                </div>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Rerum aperiam</h3>
                  <p>Autem saepe animi et aut aspernatur culpa facere. Rerum saepe rerum voluptates quia</p>
                </div>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Veniam omnis</h3>
                  <p>Omnis perferendis molestias culpa sed. Recusandae quas possimus. Quod consequatur corrupti</p>
                </div>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Delares sapiente</h3>
                  <p>Sint et dolor voluptas minus possimus nostrum. Reiciendis commodi eligendi omnis quideme lorenda</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Barang Section -->
    <section id="barang" class="barang section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>Barang</h2>
        <div class="row gy-4">
          @foreach($barang as $item)
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <img src="{{ Storage::url('public/barang/'.$item->image) }}" class="card-img-top" alt="{{ $item->nama_brg }}">
              <div class="card-body">
                <h5 class="card-title">{{ $item->nama_brg }}</h5>
                <p class="card-text">{{ $item->deskripsi }}</p>
                <p class="card-text">Stok: {{ $item->stok }}</p>
                <p class="card-text">Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Kategori Service Section -->
    <section id="kategori-service" class="kategori-service section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>Kategori Service</h2>
        <div class="row gy-4">
          @foreach($kategoriservices as $kategori)
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $kategori->nama_kategori }}</h5>
                <p class="card-text">{{ $kategori->deskripsi }}</p>
                <p class="card-text">Biaya: Rp {{ number_format($kategori->biaya, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          @foreach($servis as $service)
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <img src="{{ Storage::url('public/service/'.$service->image) }}" class="card-img-top" alt="{{ $service->nama_service }}">
              <div class="card-body">
                <h5 class="card-title">{{ $service->nama_service }}</h5>
                <p class="card-text">{{ $service->deskripsi }}</p>
                <p class="card-text">Biaya: Rp {{ number_format($service->biaya, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>Contact Us</h2>
        <div class="row gy-4">
          <div class="col-lg-6">
            <form action="#" method="post" role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-6">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Sudirman No.123, Jakarta</p>
              </div>
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+62 812 3456 7890</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=..." frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bengkel Motor XYZ</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('Landing/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Landing/aos/aos.js') }}"></script>
  <script src="{{ asset('Landing/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('Landing/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('Landing/js/main.js') }}"></script>

</body>

</html>
