<nav class="navbar" id="siteNav">
  <div class="navbar-container">
    <a class="navbar-brand" href="../user/index.php">
      <img src="{{ asset('layanan-publik/images/logo2.png') }}" alt="Logo 2">
      <div class="brand-divider"></div>
      <img src="{{ asset('layanan-publik/images/kominfo.jpg') }}" alt="Logo Kominfo">
    </a>
    <button class="navbar-toggler" id="navbarToggler" aria-label="Toggle navigation">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0f172a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </button>
    <div class="navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="../user/index.php">Beranda</a></li>
        <li class="nav-item dropdown" id="dropdownProfil">
          <a class="nav-link" href="#">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            Profil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../user/visi-misi.php">Visi &amp; Misi Kota Bogor</a></li>
            <li><a class="dropdown-item" href="../user/sejarah.php">Sejarah</a></li>
            <li><a class="dropdown-item" href="../user/struktur.php">Struktur</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown" id="dropdownPublikasi">
          <a class="nav-link" href="#">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            Publikasi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Galeri</a></li>
            <li><a class="dropdown-item" href="../user/berita.php">Berita</a></li>
          </ul>
        </li>
        
        @php
          $isLayananActive = request()->routeIs('layanan.*');
        @endphp
        <li class="nav-item dropdown {{ $isLayananActive ? 'active' : '' }}" id="dropdownLayanan">
          <a class="nav-link {{ $isLayananActive ? 'active' : '' }}" href="#">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            Layanan Publik
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ request()->routeIs('layanan.kominfo') ? 'active' : '' }}" href="{{ route('layanan.kominfo') }}">Portal Layanan Diskominfo</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('layanan.penelitian') || request()->routeIs('layanan.penelitian.submit') ? 'active' : '' }}" href="{{ route('layanan.penelitian') }}">Penelitian</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('layanan.jurnal') ? 'active' : '' }}" href="{{ route('layanan.jurnal') }}">Daftar Jurnal</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('layanan.magang') ? 'active' : '' }}" href="{{ route('layanan.magang') }}">Magang &amp; PKL</a></li>
            <li><a class="dropdown-item {{ request()->routeIs('layanan.survei') ? 'active' : '' }}" href="{{ route('layanan.survei') }}">Survei Kepuasan</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Dokumen</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="../user/komitmen.php">Daftar Komitmen</a></li>
        
        <!-- Tombol Verifikasi PDF -->
        <li class="nav-item d-flex align-items-center" style="margin-left: 10px;">
          <a class="btn-verify-pdf" href="{{ route('layanan.tanda-tangan') }}" style="background-color: #1a73e8; color: #ffffff !important; padding: 8px 16px; border-radius: 8px; display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 14px; text-decoration: none; box-shadow: 0 2px 4px rgba(26, 115, 232, 0.2); transition: background-color 0.2s;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              <polyline points="9 12 11 14 15 10"></polyline>
            </svg>
            Verifikasi PDF
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
