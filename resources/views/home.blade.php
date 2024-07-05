<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nagatami Motor </title>
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
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                    <li><a href="#kategori-service">Kategori Servis</a></li>
                    <li><a href="#services">Servis</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="profile-dropdown">
                @if(Auth::check() && Auth::user()->profile)
                    <img src="{{ Storage::url('public/profile/' . Auth::user()->profile->image) }}" class="profile-icon" alt="Profile Picture">
                    <div class="dropdown-content">
                        <a href="#" data-toggle="modal" data-target="#editProfileModal">Edit Profile</a>
                        <a href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#createProfileModal">Create Profile</a>
                @endif
            </div>

        </div>
    </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <img src="{{ asset('Landing/img/home-1.jpeg') }}" alt="" data-aos="fade-in">
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
              <h3>Tentang Kami</h3>
              <h2>Bengkel Motor Terlengkap dan Terpercaya</h2>
              <p>Kami menyediakan layanan perbaikan dan perawatan motor dengan kualitas terbaik. Didukung oleh mekanik berpengalaman dan peralatan modern, kami siap menangani berbagai masalah motor Anda dengan cepat dan efisien.</p>
              <a href="#services" class="read-more"><span>Reservasi Sekarang</span><i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="col-xl-7">
              <div class="row gy-4 icon-boxes">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-tools"></i>
                    <h3>Layanan Perbaikan</h3>
                    <p>Kami menawarkan berbagai layanan perbaikan motor, mulai dari mesin, kelistrikan, hingga bodi motor.</p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-gear"></i>
                    <h3>Servis Berkala</h3>
                    <p>Jaga performa motor Anda dengan servis berkala di bengkel kami. Kami memastikan motor Anda tetap dalam kondisi prima.</p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box">
                    <i class="bi bi-shield-check"></i>
                    <h3>Penggantian Suku Cadang</h3>
                    <p>Kami menyediakan suku cadang asli dan berkualitas untuk menjamin keamanan dan kenyamanan berkendara Anda.</p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <i class="bi bi-calendar-check"></i>
                    <h3>Konsultasi dan Reservasi</h3>
                    <p>Dapatkan konsultasi gratis mengenai masalah motor Anda dan buat reservasi secara online untuk layanan yang lebih cepat.</p>
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
        <div class="container section-title" data-aos="fade-up">
          <h2>Barang</h2>
      </div>
        <div class="row gy-4">
          @foreach($barang as $item)
          <div class="col-3">
            <div class="card">
              <img src="{{ Storage::url('public/barang/'.$item->image) }}" class="card-img-top" alt="{{ $item->nama_brg }}">
              <div class="card-body">
                <h5 class="card-title"><b>{{ $item->nama_brg }}</b></h5>
                <p class="card-text">{{ $item->deskripsi }}</p>
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
        <div class="container section-title" data-aos="fade-up">
          <h2>Kategori Servis</h2>
      </div>
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
            <h2>Servis</h2>
            <p>Reservasi servis motor kesayanganmu dengan isi form di bawah inix`!</p>
        </div>

        <div class="container d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
                <div class="card" style="background-color: #f8f9fa;"> <!-- Card with grey background -->
                    <div class="card-body">
                        <form action="{{ route('servis.store') }}" method="POST" role="form" class="php-email-form">
                            @csrf
                            <input type="hidden" name="id_service" value="1"> <!-- Assume a fixed service ID -->
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <select name="id_kategori" id="id_kategori_1" class="form-control" required onchange="calculateTotal(1)">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategoriservices as $kategori)
                                        <option value="{{ $kategori->id }}" data-biaya="{{ $kategori->biaya }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="id_profil" class="form-label">Profile</label>
                                    @auth
                                        @if(Auth::user()->profile)
                                            <input type="hidden" name="id_profil" value="{{ Auth::user()->profile->id }}">
                                            <input type="text" class="form-control" value="{{ Auth::user()->profile->user->name }}" readonly>
                                        @else
                                            <input type="text" class="form-control" value="Lengkapi Profil Terlebih Dahulu" readonly>
                                        @endif
                                    @else
                                        <input type="text" class="form-control" value="Lengkapi Profil Terlebih Dahulu" readonly>
                                    @endauth
                                </div>

                                <div class="col-md-12">
                                    <label for="id_barang" class="form-label">Barang</label>
                                    <select name="id_barang" id="id_barang_1" class="form-control" required onchange="calculateTotal(1)">
                                        <option value="">Pilih Barang</option>
                                        @foreach($barang as $item)
                                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama_brg }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                                    <input type="number" id="jumlah_bayar_1" name="jumlah_bayar" class="form-control" required readonly>
                                </div>

                                <div class="col-md-12">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control" required>
                                </div>
                                <div class="col-md-12 text-center">
                                  <button class="btn btn-danger" type="submit">Kirim Reservasi </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                  <button class="btn btn-danger" type="submit">Send Message </button>
                  {{-- <button type="submit">Send Message</button> --}}
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

    <!-- Modal for Creating Profile -->
  <div class="modal fade" id="createProfileModal" tabindex="-1" role="dialog" aria-labelledby="createProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createProfileModalLabel">Create Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Foto Profile</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="Masukkan foto Profile">
                @error('image')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama User</label>
                <select class="form-control form-select @error('id_user') is-invalid @enderror" name="id_user" id="floatingSelect" aria-label="Floating label select example">
                    <option selected="selected">Pilih User</option>
                    @foreach ($user as $user)
                    <option value="{{ $user->id }}"> {{ $user->name }} </option>
                    @endforeach
                </select>
                @error('id_user')
                <span class="invalid-feedback alert-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Nomor Plat</label>
                <input type="text" name="no_plat" value="{{ old('no_plat') }}" class="form-control @error('no_plat') is-invalid @enderror" placeholder="Masukkan no_plat Barang">
                @error('no_plat')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Merek</label>
                <input type="text" name="merek" value="{{ old('merek') }}" class="form-control @error('merek') is-invalid @enderror" placeholder="Masukkan merek Barang">
                @error('merek')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat">
                @error('alamat')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="number" name="hp" value="{{ old('hp') }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan nomor HP">
                @error('hp')
                <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Kembali</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

      <!-- Modal for Editing Profile -->
      @if(Auth::check() && Auth::user()->profile)
      <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('profile.update', Auth::user()->profile->id ?? '') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label>Foto Profile</label>
                  <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="Masukkan foto Profile">
                  @error('image')
                  <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" disabled>
            </div>

              <div class="form-group">
                  <label>Nomor Plat</label>
                  <input type="text" name="no_plat" value="{{ old('no_plat', Auth::user()->profile->no_plat ?? '') }}" class="form-control @error('no_plat') is-invalid @enderror" placeholder="Masukkan no_plat Barang">
                  @error('no_plat')
                  <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Merek</label>
                  <input type="text" name="merek" value="{{ old('merek', Auth::user()->profile->merek ?? '') }}" class="form-control @error('merek') is-invalid @enderror" placeholder="Masukkan merek Barang">
                  @error('merek')
                  <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" value="{{ old('alamat', Auth::user()->profile->alamat ?? '') }}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat">
                  @error('alamat')
                  <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                  @enderror
              </div>

              <div class="form-group">
                  <label>No Hp</label>
                  <input type="number" name="hp" value="{{ old('hp', Auth::user()->profile->hp ?? '') }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan nomor HP">
                  @error('hp')
                  <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                  @enderror
              </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif


  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Nagatami Motor</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
</script>
  <script>
    function calculateTotal(serviceId) {
        const kategoriSelect = document.getElementById(`id_kategori_${serviceId}`);
        const barangSelect = document.getElementById(`id_barang_${serviceId}`);
        const jumlahBayarInput = document.getElementById(`jumlah_bayar_${serviceId}`);

        const selectedKategori = kategoriSelect.options[kategoriSelect.selectedIndex];
        const selectedBarang = barangSelect.options[barangSelect.selectedIndex];

        const kategoriBiaya = selectedKategori.getAttribute('data-biaya') || 0;
        const barangHarga = selectedBarang.getAttribute('data-harga') || 0;

        const totalBiaya = parseInt(kategoriBiaya) + parseInt(barangHarga);

        jumlahBayarInput.value = totalBiaya;
    }
    </script>
  <!-- Vendor JS Files -->
  <script src="{{ asset('Landing/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Landing/aos/aos.js') }}"></script>
  <script src="{{ asset('Landing/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('Landing/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('Landing/js/main.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}"
                });
            </script>
        @endif

</body>

</html>
