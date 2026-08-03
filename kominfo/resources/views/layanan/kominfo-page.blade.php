@extends('layouts.layanan')

@section('title', 'Portal Pengajuan Layanan — Diskominfo Kota Bogor')
@section('description', 'Portal layanan terpadu Dinas Komunikasi dan Informatika Kota Bogor.')

@section('styles')
<style>
  :root {
    --primary: #0284c7;
    --primary-light: #f0f9ff;
    --primary-border: #bae6fd;
    --slate-50: #f8fafc;
    --slate-100: #f1f5f9;
    --slate-200: #e2e8f0;
    --slate-300: #cbd5e1;
    --slate-400: #94a3b8;
    --slate-500: #64748b;
    --slate-600: #475569;
    --slate-700: #334155;
    --slate-800: #1e293b;
    --slate-900: #0f172a;
  }

  html { scroll-behavior: smooth; font-family: 'Inter', system-ui, -apple-system, sans-serif; }

  /* Minimalist Background */
  body::after {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 700px;
    background: linear-gradient(180deg, var(--primary-light) 0%, rgba(248, 250, 252, 0) 100%);
    z-index: -1; pointer-events: none;
  }

  /* Split Hero Section */
  .portal-hero {
    padding: 120px 0 80px;
    position: relative;
  }
  .portal-hero h1 {
    font-size: clamp(2.2rem, 4vw, 3.2rem);
    font-weight: 800;
    color: var(--slate-900);
    letter-spacing: -0.02em;
    margin-bottom: 1.25rem;
    line-height: 1.2;
  }
  .portal-hero h1 span { color: var(--primary); }
  .portal-hero p {
    font-size: 1.1rem;
    color: var(--slate-500);
    max-width: 600px;
    line-height: 1.7;
    margin-bottom: 2.5rem;
  }
  
  .btn-mulai-sekarang {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: var(--primary);
    color: white;
    padding: 1rem 2.25rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.05rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px -5px rgba(2, 132, 199, 0.4);
  }
  .btn-mulai-sekarang:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(2, 132, 199, 0.5);
    color: white;
  }

  .btn-lihat-layanan {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: white;
    color: var(--slate-700);
    border: 1px solid var(--slate-200);
    padding: 1rem 2.25rem;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.05rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0,0,0,0.02);
  }
  .btn-lihat-layanan:hover {
    background: var(--slate-50);
    border-color: var(--slate-300);
    color: var(--slate-900);
    transform: translateY(-3px);
    box-shadow: 0 10px 15px rgba(0,0,0,0.05);
  }

  .hero-image-wrapper {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .hero-image {
    max-width: 90%;
    height: auto;
    filter: drop-shadow(0 20px 30px rgba(2, 132, 199, 0.15));
    animation: float 6s ease-in-out infinite;
  }
  @keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
    100% { transform: translateY(0px); }
  }

  /* Layanan Header & Search */
  .section-layanan {
    padding-top: 2rem;
  }
  .section-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--slate-900);
    margin-bottom: 0.25rem;
  }
  .search-container-layanan {
    position: relative;
    width: 100%;
    max-width: 380px;
  }
  .search-input-layanan {
    width: 100%;
    padding: 0.9rem 1.25rem 0.9rem 3rem;
    border-radius: 16px;
    border: 1px solid var(--slate-200);
    font-size: 1rem;
    color: var(--slate-800);
    background: white;
    transition: all 0.2s;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
  }
  .search-input-layanan:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px var(--primary-light);
  }
  .search-icon-layanan {
    position: absolute;
    left: 1.1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--slate-400);
    transition: color 0.2s;
  }
  .search-input-layanan:focus + .search-icon-layanan {
    color: var(--primary);
  }

  /* Grid Layanan */
  .services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 1.75rem;
  }
  
  .service-item.d-none {
    display: none !important;
  }

  /* Service Cards */
  .service-card {
    background: white;
    border-radius: 24px;
    padding: 2.25rem;
    border: 1px solid var(--slate-200);
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 12px rgba(0,0,0,0.02);
    position: relative;
    overflow: hidden;
  }
  .service-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 4px;
    background: transparent;
    transition: all 0.3s ease;
  }
  .service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px -10px rgba(2, 132, 199, 0.15);
    border-color: var(--primary-border);
  }
  .service-card:hover::before {
    background: var(--primary);
  }
  
  .service-icon-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--slate-50);
    color: var(--primary);
    border: 1px solid var(--slate-100);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
  }
  .service-card:hover .service-icon-wrapper {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
    transform: scale(1.05) rotate(3deg);
  }

  .service-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--slate-900);
    margin-bottom: 0.75rem;
    line-height: 1.3;
  }
  .service-desc {
    font-size: 1rem;
    color: var(--slate-500);
    margin-bottom: 2rem;
    line-height: 1.6;
    flex-grow: 1; /* Mendorong tombol selalu ke bawah */
  }

  .btn-ajukan {
    margin-top: auto; /* Memastikan tombol rata bawah */
    background: var(--slate-50);
    color: var(--slate-700);
    border: 1px solid var(--slate-200);
    padding: 0.85rem 1rem;
    border-radius: 14px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    text-align: center;
    text-decoration: none;
    display: flex; justify-content: center; align-items: center; gap: 0.5rem;
    width: 100%;
  }
  .btn-ajukan svg {
    transition: transform 0.3s ease;
  }
  .service-card:hover .btn-ajukan {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
  }
  .service-card:hover .btn-ajukan svg {
    transform: translateX(4px);
  }

  /* Empty State Responsive */
  #noDataMessage {
    grid-column: 1 / -1;
    padding: 4rem 1rem;
    animation: fadeIn 0.4s ease forwards;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Premium FAQ Accordion matching Penelitian */
  .faq-section {
    padding: 6rem 0 8rem 0;
  }
  .faq-header {
    text-align: center;
    margin-bottom: 3.5rem;
  }
  .faq-header h2 {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--slate-900);
    margin-bottom: 1rem;
  }
  .faq-header p {
    color: var(--slate-500);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
  }
  .faq-container {
    max-width: 1100px;
    margin: 0 auto;
  }
  
  .accordion-premium .accordion-item {
    background: white;
    border-radius: 16px !important;
    margin-bottom: 16px !important;
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02) !important;
    transition: all 0.3s ease;
  }
  .accordion-premium .accordion-item:hover {
    border-color: var(--primary-border) !important;
    box-shadow: 0 10px 20px -5px rgba(2, 132, 199, 0.05) !important;
  }
  .accordion-premium .accordion-button {
    position: relative !important;
    padding: 24px !important;
    font-weight: 600 !important;
    color: #0f172a !important;
    font-size: 16px !important;
    background: transparent !important;
    border: none !important;
    width: 100% !important;
    text-align: left !important;
    cursor: pointer;
  }
  .accordion-premium .accordion-button:focus { outline: none; }
  .accordion-premium .accordion-button::after {
    content: "" !important;
    position: absolute !important;
    right: 24px !important;
    top: 50% !important;
    margin-top: -1px !important;
    width: 14px !important;
    height: 2px !important;
    background-color: #0f172a !important;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    border: none !important;
    transform: none !important;
  }
  .accordion-premium .accordion-button::before {
    content: "" !important;
    position: absolute !important;
    right: 30px !important;
    top: 50% !important;
    margin-top: -7px !important;
    width: 2px !important;
    height: 14px !important;
    background-color: #0f172a !important;
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease !important;
  }
  .accordion-premium .accordion-button:not(.collapsed) {
    color: #0284c7 !important;
  }
  .accordion-premium .accordion-button:not(.collapsed)::before {
    transform: rotate(90deg) !important;
    opacity: 0 !important;
  }
  .accordion-premium .accordion-button:not(.collapsed)::after {
    transform: rotate(180deg) !important;
    background-color: #0284c7 !important;
  }
  .accordion-premium .accordion-collapse {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease;
  }
  .accordion-premium .accordion-collapse.show {
    /* height is handled in JS */
  }
  .accordion-premium .accordion-body {
    padding: 0 24px 24px !important;
    font-size: 14px !important;
    color: #64748b !important;
    line-height: 1.6 !important;
  }

  /* Media Queries Responsive */
  @media (max-width: 992px) {
    .portal-hero { text-align: center; }
    .portal-hero p { margin: 0 auto 2.5rem; }
    .hero-image-wrapper { margin-top: 3rem; }
  }
  @media (max-width: 768px) {
    .portal-hero h1 { font-size: 2.2rem; }
    .services-grid { grid-template-columns: 1fr; }
    .search-container-layanan { max-width: 100%; margin-top: 1.5rem; }
    .section-title { font-size: 1.75rem; }
    .faq-section { padding: 4rem 1.5rem; }
    .faq-header h2 { font-size: 1.8rem; }
    .accordion-premium .accordion-button { font-size: 15px !important; padding: 20px !important; }
    .accordion-premium .accordion-button::before { right: 26px !important; }
    .accordion-premium .accordion-button::after { right: 20px !important; }
    .accordion-premium .accordion-body { padding: 0 20px 20px !important; }
  }
</style>
@endsection

@section('content')

<main>
  <!-- 1. Header (Split Layout) -->
  <section class="portal-hero" data-aos="fade-in">
    <div class="container">
      <div class="row align-items-center">
        <!-- Kiri: Teks dan Tombol -->
        <div class="col-lg-6 text-start mb-4 mb-lg-0">
          <h1>Portal Layanan<br><span>Diskominfo Kota Bogor</span></h1>
          <p>Sistem pelayanan terpadu untuk memfasilitasi kebutuhan administrasi, penyediaan jaringan, pengembangan sistem, hingga permohonan informasi publik secara cepat dan transparan.</p>
          
          <div class="d-flex flex-wrap gap-3 mt-2" data-aos="fade-up" data-aos-delay="50">
            <a href="#daftar-layanan" class="btn-mulai-sekarang">
              Mulai Sekarang
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a href="#daftar-layanan" class="btn-lihat-layanan">
              Lihat Layanan
            </a>
          </div>
        </div>
        
        <!-- Kanan: Ilustrasi Animasi -->
        <div class="col-lg-6">
          <div class="hero-image-wrapper">
            <img src="{{ asset('images/submit_illustration.png') }}" alt="Ilustrasi Layanan Diskominfo" class="img-fluid hero-image">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. Daftar Layanan -->
  <section id="daftar-layanan" class="section-layanan mb-5 pb-5">
    <div class="container">
      <!-- Header Layanan & Search -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
        <div>
          <h2 class="section-title">Layanan Kami</h2>
          <p class="text-slate-500 mb-0">Pilih layanan yang Anda butuhkan di bawah ini.</p>
        </div>
        
        <div class="search-container-layanan">
          <input type="text" id="searchInput" class="search-input-layanan" placeholder="Cari layanan (contoh: magang, zoom)..." autocomplete="off">
          <svg class="search-icon-layanan" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
      </div>

      <!-- Grid Cards -->
      <div class="services-grid" id="servicesGrid">
        
        <!-- Magang & PKL -->
        <div class="service-item" data-title="magang pkl mahasiswa siswa pendaftaran">
          <div class="service-card" data-aos="fade-up" data-aos-delay="100">
            <div class="service-icon-wrapper">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
            </div>
            <h3 class="service-title">Magang & PKL</h3>
            <p class="service-desc">Pendaftaran program praktik kerja lapangan (PKL) dan magang bagi siswa SMK serta mahasiswa.</p>
            <a href="{{ route('layanan.magang') }}" class="btn-ajukan">
              Ajukan Pendaftaran
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
          </div>
        </div>

        <!-- Izin Penelitian -->
        <div class="service-item" data-title="izin penelitian riset skripsi tesis wawancara">
          <div class="service-card" data-aos="fade-up" data-aos-delay="150">
            <div class="service-icon-wrapper">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
            </div>
            <h3 class="service-title">Izin Penelitian</h3>
            <p class="service-desc">Permohonan izin riset atau pengambilan data untuk keperluan penyusunan skripsi, tesis, dan tugas akhir.</p>
            <a href="{{ route('layanan.penelitian') }}" class="btn-ajukan">
              Ajukan Izin
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
          </div>
        </div>

        <!-- Publikasi Jurnal -->
        <div class="service-item" data-title="publikasi jurnal ilmiah riset upload daftar">
          <div class="service-card" data-aos="fade-up" data-aos-delay="200">
            <div class="service-icon-wrapper">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            </div>
            <h3 class="service-title">Publikasi Jurnal</h3>
            <p class="service-desc">Layanan untuk mengunggah serta mendokumentasikan hasil riset dan jurnal ilmiah mahasiswa.</p>
            <a href="{{ route('layanan.jurnal') }}" class="btn-ajukan">
              Upload Jurnal
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
          </div>
        </div>

        <!-- Fasilitasi Zoom -->
        <div class="service-item" data-title="fasilitasi zoom meeting rapat video conference online">
          <div class="service-card" data-aos="fade-up" data-aos-delay="250">
            <div class="service-icon-wrapper">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
            </div>
            <h3 class="service-title">Fasilitasi Zoom</h3>
            <p class="service-desc">Peminjaman akun atau fasilitasi teknis Zoom Premium untuk rapat resmi perangkat daerah.</p>
            <a href="{{ route('layanan.form', ['layanan' => 'Fasilitasi Zoom Meeting']) }}" class="btn-ajukan">
              Isi Formulir
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
          </div>
        </div>

        <!-- Verifikasi PDF / TTE -->
        <div class="service-item" data-title="verifikasi tanda tangan elektronik tte sertifikat pdf bsre">
          <div class="service-card" data-aos="fade-up" data-aos-delay="300">
            <div class="service-icon-wrapper">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
            </div>
            <h3 class="service-title">Verifikasi PDF / TTE</h3>
            <p class="service-desc">Layanan verifikasi keaslian Tanda Tangan Elektronik (TTE) tersertifikasi pada dokumen resmi PDF.</p>
            <a href="{{ route('layanan.tanda-tangan') }}" class="btn-ajukan">
              Cek Dokumen
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
          </div>
        </div>

        <!-- Data not found state -->
        <div id="noDataMessage" class="text-center d-none">
          <div style="width: 72px; height: 72px; background: var(--slate-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--slate-400)" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </div>
          <h4 class="text-slate-800 fw-bold mb-2">Layanan tidak ditemukan</h4>
          <p class="text-slate-500 mb-0">Coba gunakan kata kunci lain (seperti: magang, zoom).</p>
        </div>

      </div>
    </div>
  </section>

  <!-- 3. FAQ Section -->
  <section class="faq-section bg-slate-50" data-aos="fade-up">
    <div class="container">
      <div class="faq-header">
        <h2>Pertanyaan yang Sering Diajukan</h2>
        <p>Temukan jawaban cepat mengenai prosedur, syarat, dan ketentuan layanan di Diskominfo Kota Bogor.</p>
      </div>
      
      <div class="faq-container">
        <div class="accordion-premium" id="faqAccordion">
          <!-- FAQ 1 -->
          <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-target="collapseOne">
                Apakah seluruh layanan di Diskominfo ini berbayar?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse">
              <div class="accordion-body">
                <strong>Tentu tidak.</strong> Seluruh layanan yang disediakan oleh Diskominfo Kota Bogor (mulai dari Pendaftaran Magang, Izin Penelitian, hingga Fasilitasi Zoom) adalah 100% <strong>gratis</strong> dan tidak dipungut biaya apa pun.
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-target="collapseTwo">
                Berapa lama estimasi proses permohonan layanan?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse">
              <div class="accordion-body">
                Estimasi waktu pemrosesan sangat bergantung pada jenis layanan yang Anda ajukan:
                <ul class="mt-2 mb-0" style="padding-left: 1.25rem;">
                  <li><strong>Verifikasi Dokumen PDF:</strong> Berlangsung instan pada saat itu juga melalui sistem.</li>
                  <li><strong>Pendaftaran Magang & PKL:</strong> Bergantung pada ketersediaan kuota dan peninjauan oleh tim, biasanya maksimal 3-5 hari kerja.</li>
                  <li><strong>Fasilitasi Zoom & Penelitian:</strong> Diproses dalam 1-3 hari kerja sejak surat permohonan diterima.</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-target="collapseThree">
                Siapa saja yang boleh mengajukan Pendaftaran Magang / PKL?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse">
              <div class="accordion-body">
                Layanan magang / Praktik Kerja Lapangan (PKL) ditujukan untuk <strong>Siswa/i jenjang SMK/Sederajat</strong> dan <strong>Mahasiswa/i jenjang Perguruan Tinggi (D3/D4/S1)</strong> yang memiliki Surat Pengantar atau Rekomendasi Resmi dari instansi pendidikannya.
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-target="collapseFour">
                Bagaimana saya tahu bahwa dokumen/surat pengajuan saya sudah disetujui?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse">
              <div class="accordion-body">
                Admin kami akan menghubungi Anda melalui kontak <strong>WhatsApp</strong> atau <strong>Email</strong> yang telah Anda isi pada formulir pengajuan. Pastikan nomor kontak dan email yang Anda cantumkan dalam keadaan aktif. Jika terdapat kekurangan dokumen, tim kami juga akan meminta perbaikan via kontak tersebut.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection

@section('scripts')
<script>
  // Logika Fitur Pencarian Interaktif
  document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const serviceItems = document.querySelectorAll('.service-item');
    const noDataMessage = document.getElementById('noDataMessage');

    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        let visibleCount = 0;

        serviceItems.forEach(item => {
          // Ambil kata kunci dari atribut data-title
          const titleWords = item.getAttribute('data-title').toLowerCase();
          
          if (titleWords.includes(query)) {
            item.classList.remove('d-none');
            visibleCount++;
          } else {
            item.classList.add('d-none');
          }
        });

        // Tampilkan pesan jika tidak ada yang cocok
        if (visibleCount === 0) {
          if (noDataMessage) noDataMessage.classList.remove('d-none');
        } else {
          if (noDataMessage) noDataMessage.classList.add('d-none');
        }
      });
    }
  });

  // Logika Custom Vanilla Accordion FAQ (Sesuai dengan Penelitian)
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.accordion-button').forEach(button => {
      button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        const targetCollapse = document.getElementById(targetId);
        const isCollapsed = button.classList.contains('collapsed');
        
        // Close all accordion items
        document.querySelectorAll('.accordion-button').forEach(btn => {
          btn.classList.add('collapsed');
        });
        document.querySelectorAll('.accordion-collapse').forEach(collapse => {
          collapse.classList.remove('show');
          collapse.style.maxHeight = null;
        });

        if (isCollapsed) {
          button.classList.remove('collapsed');
          targetCollapse.classList.add('show');
          targetCollapse.style.maxHeight = targetCollapse.scrollHeight + "px";
        }
      });
    });
  });
</script>
@endsection
