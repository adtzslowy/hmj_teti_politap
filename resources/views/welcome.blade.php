<!DOCTYPE html>
<html lang="id" x-data="{ mobileMenuOpen: false }" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HMJ TETI POLITAP | Himpunan Mahasiswa Jurusan Teknik Elektro & Teknik Informatika</title>
  <link rel="icon" type="image/png" href="{{ url('source') }}/assets/images/logos/favicon.png">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2a3547', // biru politap
            secondary: '#2a3547',
          }
        }
      }
    }
  </script>

  <!-- Alpine.js -->
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <!-- Animasi Scroll -->
  <style>
    [x-cloak] { display: none !important; }
    .fade-up {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.8s ease;
    }
    .fade-up.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body class="bg-white text-gray-800 antialiased" x-data x-init="
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('show');
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
">

  <!-- Navbar -->
  <header class="fixed w-full bg-white shadow z-50">
  <nav class="container mx-auto flex items-center justify-between px-4 py-3">
    <!-- Logo -->
    <a href="#" class="flex items-center space-x-2">
      <img src="{{ asset('source/assets/images/logo.png') }}" alt="HMJ TETI" class="w-auto h-10">
    </a>

    <!-- Desktop Menu (tengah) -->
    <div class="hidden md:flex flex-1 justify-center">
      <ul class="flex space-x-8 font-semibold">
        <li><a href="#home" class="hover:text-red-500 transition-all duration-300">Beranda</a></li>
        <li><a href="#about" class="hover:text-red-500 transition-all duration-300 ">Tentang</a></li>
        <li><a href="#activities" class="hover:text-red-500 transition-all duration-300 ">Kegiatan</a></li>
        <li><a href="#news" class="hover:text-red-500 transition-all duration-300 ">Berita</a></li>
        <li><a href="#complaints" class="hover:text-red-500 transition-all duration-300 ">Pengaduan</a></li>
        <li><a href="#contact" class="hover:text-red-500 transition-all duration-300 ">Kontak</a></li>
      </ul>
    </div>

    <!-- Tombol Login -->
    <div class="hidden md:block">
        @if (!Auth::guard('admin')->check() && !Auth::guard('mahasiswa')->check())
            <a href="{{ route('login_mhs') }}" class="bg-primary text-white px-4 py-2 rounded-xl font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">Masuk</a>
        @else
            @if (Auth::guard('admin')->check())
                <a href="{{ route('dashboard_admin') }}" class="bg-primary text-white px-4 py-2 rounded-xl font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">Dashboard</a>
            @elseif (Auth::guard('mahasiswa')->check())
                <a href="{{ route('dashboard_mahasiswa') }}" class="bg-primary text-white px-4 py-2 rounded-xl font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">Dashboard</a>
            @endif
        @endif
    </div>

    <!-- Tombol Mobile -->
    <button class="md:hidden focus:outline-none" @click="mobileMenuOpen = !mobileMenuOpen">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </nav>

  <!-- Mobile Menu -->
  <div x-show="mobileMenuOpen" x-transition x-cloak class="md:hidden bg-gray-100 shadow-inner">
    <ul class="flex flex-col items-center space-y-4 py-4 font-medium">
      <li><a href="#home" class="hover:text-red-500 transition-all duration-300" @click="mobileMenuOpen=false">Beranda</a></li>
      <li><a href="#about" class="hover:text-red-500 transition-all duration-300" @click="mobileMenuOpen=false">Tentang</a></li>
      <li><a href="#activities" class="hover:text-red-500 transition-all duration-300" @click="mobileMenuOpen=false">Kegiatan</a></li>
      <li><a href="#news" class="hover:text-red-500 transition-all duration-300" @click="mobileMenuOpen=false">Berita</a></li>
      <li><a href="#complaints" class="hover:text-red-500 transition-all duration-300" @click="mobileMenuOpen=false">Pengaduan</a></li>
      <li><a href="#contact" class="hover:text-red-500 transition-all duration-300" @click="mobileMenuOpen=false">Kontak</a></li>
    </ul>

  <div class="pb-6 text-center">
    <a href="{{ route('login_mhs') }}"
      class="bg-primary text-white px-6 py-3 rounded font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">
      Login
    </a>
  </div>





  </div>
</header>


  <!-- Hero Section -->
  <br>
  <br>
  <section id="home" class="pt-40 pb-40 bg-gradient-to-r from-primary to-secondary text-white text-center">
    <div class="container mx-auto px-6">
      <h1 class="text-4xl md:text-6xl font-bold mb-6 fade-up"><span class="text-red-500">HMJ TETI</span> POLITAP</h1>
      <p class="text-lg md:text-xl mb-8 fade-up">Himpunan Mahasiswa Jurusan Teknik Elektro dan Teknik Informatika<br>Politeknik Negeri Ketapang</p>
      <a href="#about" class="bg-white text-primary px-6 py-3 rounded-full font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">Pelajari Lebih Lanjut</a>
    </div>
  </section>

  <!-- Tentang Kami -->
  <section id="about" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-6 fade-up">Tentang Kami</h2>
      <p class="max-w-3xl mx-auto text-gray-600 leading-relaxed fade-up">
        HMJ TETI POLITAP adalah organisasi mahasiswa yang menjadi wadah aspirasi, pengembangan potensi, dan solidaritas mahasiswa Jurusan Teknik Elektro & Informatika di Politeknik Negeri Ambon.
      </p>
    </div>
  </section>

  <!-- Statistik -->
  <section id="stats" class="py-16 bg-white">
    <div class="container mx-auto grid md:grid-cols-3 gap-8 text-center">
      <div class="fade-up">
        <h3 class="text-5xl font-bold text-primary">{{$mahasiswa}}</h3>
        <p>Mahasiswa Aktif</p>
      </div>
      <div class="fade-up">
        <h3 class="text-5xl font-bold text-primary">{{ $anggota }}</h3>
        <p>Anggota Aktif</p>
      </div>
      <div class="fade-up">
        <h3 class="text-5xl font-bold text-primary">{{$beritaPost}}</h3>
        <p>Postingan Berita</p>
      </div>
    </div>
  </section>

  <!-- Kegiatan -->
  <section id="activities" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-10 fade-up">Kegiatan Kami</h2>
      <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-white rounded-xl shadow-lg p-6 hover:-translate-y-2 transition-transform fade-up">
          <div class="text-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
          </div>
          <h3 class="font-semibold text-xl mb-3">Pelatihan & Workshop</h3>
          <p class="text-gray-600">Pelatihan teknologi, jaringan, dan elektro untuk meningkatkan kemampuan anggota.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 hover:-translate-y-2 transition-transform fade-up">
          <div class="text-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 7h-4m4 0a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <h3 class="font-semibold text-xl mb-3">Pengabdian Masyarakat</h3>
          <p class="text-gray-600">Kegiatan sosial untuk mengimplementasikan ilmu teknologi dalam kehidupan masyarakat.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6 hover:-translate-y-2 transition-transform fade-up">
          <div class="text-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21h8M12 17v4m0-8a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
          </div>
          <h3 class="font-semibold text-xl mb-3">Penelitian & Inovasi</h3>
          <p class="text-gray-600">Anggota HMJ aktif berinovasi dalam pengembangan teknologi dan penelitian mandiri.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- Berita Terbaru -->
  <section id="news" class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-10 fade-up">Berita Terbaru</h2>
      <div class="grid md:grid-cols-3 gap-8">
        @forelse($berita as $item)
          <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow fade-up">
            <img src="{{ asset('storage/' . $item->dokumentasi) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
            <div class="p-6">
              <h3 class="font-semibold text-xl mb-3">{{ $item->judul }}</h3>
              <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal_post)->format('d M Y') }}</span>
                <a href="#news" class="text-primary hover:text-secondary font-semibold">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-span-3 text-center py-10">
            <p class="text-gray-500">Belum ada berita terbaru.</p>
          </div>
        @endforelse
      </div>
      <div class="text-center mt-10">
        <a href="{{ route('login_mhs') }}" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">Lihat Semua Berita</a>
      </div>
    </div>
  </section>

  <!-- Pengaduan -->
  <section id="complaints" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-6 fade-up">Pengaduan Mahasiswa</h2>
      <p class="max-w-2xl mx-auto text-gray-600 mb-8 fade-up">
        Platform untuk mahasiswa menyampaikan aspirasi, keluhan, dan saran terkait kegiatan HMJ TETI POLITAP.
      </p>
      <a href="{{ route('login_mhs') }}" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-red-500 hover:text-white transition fade-up inline-block">Ajukan Pengaduan</a>
    </div>
  </section>

  <!-- Footer -->
  <footer id="contact" class="bg-primary text-white py-10">
    <div class="container mx-auto text-center">
      <h3 class="text-xl font-semibold mb-2">HMJ TETI POLITAP</h3>
      <p>Politeknik Negeri Ketapang</p>
      <p class="mt-2 text-sm">Jl. Rangge Sentap, Dalong, Ketapang, Kalimantan Barat</p>
      <div class="flex justify-center space-x-6 mt-4">
        <a href="https://www.instagram.com/hmjteti_teknologiinformasi/" class="hover:text-gray-300">Instagram</a>
        <a href="https://www.youtube.com/@prodi-teknologi-informasi/" class="hover:text-gray-300">YouTube</a>
      </div>
      <p class="mt-6 text-sm text-gray-200">© {{ date('Y') }} HMJ TETI POLITAP. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
