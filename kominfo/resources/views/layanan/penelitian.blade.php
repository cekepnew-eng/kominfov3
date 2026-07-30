@extends('layouts.layanan')

@section('title', 'Pusat Riset & Magang — Diskominfo Kota Bogor')
@section('description', 'Dinas Komunikasi dan Informatika Kota Bogor — Portal layanan digital, informasi publik, dan pengaduan masyarakat.')

@section('styles')
  <style>
    html {
      scroll-behavior: smooth;
    }

    /* Page specific styles */
    body::after {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 100%; height: 600px;
      background: linear-gradient(180deg, rgba(224, 242, 254, 0.4) 0%, rgba(248, 250, 252, 0) 100%);
      z-index: -1;
      pointer-events: none;
    }

    .title-oversized {
      font-size: clamp(1.8rem, 2.8vw, 2.8rem);
      font-weight: 800;
      line-height: 1.2;
      letter-spacing: -0.02em;
      color: #0ea5e9;
      margin-bottom: 0.75rem;
    }
    .title-oversized .text-dark {
      color: #0f172a;
    }
    
    .subtitle-premium {
      font-size: 0.95rem;
      line-height: 1.6;
      color: var(--slate-500);
      font-weight: 400;
      max-width: 95%;
      margin-bottom: 12px;
    }

    .badge-premium {
      background: #e0f2fe;
      color: #0284c7;
      padding: 0.4rem 1rem;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.8rem;
      display: inline-block;
    }

    /* Bento Grid Layout */
    .bento-grid {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .bento-card {
      background: #ffffff;
      border: 1px solid #f1f5f9;
      border-radius: 16px;
      padding: 1.1rem 0.8rem;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.03);
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .bento-card:hover {
      transform: translateY(-5px);
      border-color: #bae6fd;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.06);
    }

    .bento-icon-wrapper {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 0.75rem;
      transition: all 0.3s ease;
    }

    .bento-icon-wrapper svg {
      width: 20px;
      height: 20px;
    }

    .icon-blue { background: #e0f2fe; color: #0284c7; }
    .icon-green { background: #dcfce7; color: #16a34a; }
    .icon-orange { background: #fef3c7; color: #d97706; }

    .bento-title {
      color: var(--slate-900);
      font-weight: 800;
      font-size: 0.9rem;
      margin-bottom: 0.3rem;
    }
    
    .bento-desc {
      color: var(--slate-500);
      font-size: 0.7rem;
      line-height: 1.4;
      margin-bottom: 0;
    }


    /* Premium Image Section */
    .premium-media-container {
      position: relative;
      max-width: 440px;
      margin: 3.5rem auto 0 auto;
      filter: drop-shadow(0 15px 30px rgba(124, 58, 237, 0.15));
    }
    .premium-img-main {
      width: 100%; height: auto; object-fit: contain; display: block;
    }

    .hero-section {
      padding-top: 135px !important;
      padding-bottom: 5rem !important;
    }

    .workflow-step-col {
      position: relative;
      z-index: 2;
    }

    /* Workflow Steps Card Styling */
    .workflow-step {
      background: #ffffff;
      border-radius: 16px;
      padding: 2.5rem 1.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
      transition: all 0.3s ease;
      text-align: center;
      position: relative;
      z-index: 2;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .workflow-step:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(14, 165, 233, 0.08);
    }
    .step-icon {
      width: 80px; height: 80px;
      background: #f8fafc; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 1.5rem auto;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      color: var(--accent);
      position: relative;
      z-index: 2;
    }
    .workflow-connector-line {
      position: absolute;
      top: 80px;
      left: 12.5%;
      width: 75%;
      height: 4px;
      background-image: linear-gradient(to right, #94a3b8 62.5%, rgba(255,255,255,0) 0%);
      background-size: 8px 4px;
      background-repeat: repeat-x;
      z-index: 1;
      pointer-events: none;
    }
    @media (max-width: 991px) {
      .workflow-connector-line {
        display: none;
      }
    }
    
    /* CTA layout */
    .cta-card {
      background: linear-gradient(135deg, #0ea5e9, #0284c7);
      border-radius: 24px;
      padding: 4rem 3rem;
      text-align: center;
      color: white;
      box-shadow: var(--shadow-lg);
      position: relative;
      overflow: hidden;
    }
    
    .cta-card h3 {
      color: white;
      font-size: 1.8rem;
      margin-bottom: 1rem;
    }
    
    .cta-card p {
      max-width: 600px;
      margin: 0 auto 2rem auto;
      font-size: 1.05rem;
      line-height: 1.8;
      opacity: 0.9;
    }
    
    .btn-light {
      background: #ffffff;
      color: #0284c7;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.95rem;
      padding: 0.8rem 2rem;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s ease;
      display: inline-block;
    }
    
    .btn-light:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
      background: #f8fafc;
    }
    
    .cta-decor-1 {
      position: absolute;
      border-radius: 50%;
      background: white;
      width: 250px; height: 250px; top: -100px; left: -50px; opacity: 0.1;
      pointer-events: none;
    }
    
    .cta-decor-2 {
      position: absolute;
      border-radius: 50%;
      background: white;
      width: 350px; height: 350px; bottom: -150px; right: -50px; opacity: 0.1;
      pointer-events: none;
    }

    .workflow-step h5 {
      font-size: 20px !important;
      color: #334155 !important;
      margin-bottom: 12px !important;
    }
    .workflow-step p {
      font-size: 14px !important;
    }

    /* FAQ Accordion Premium Overrides to match reference */
    .accordion-premium .accordion-item {
      border-radius: 8px !important;
      margin-bottom: 16px !important;
      border: 1px solid rgba(0, 0, 0, 0.05) !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02) !important;
    }
    .accordion-premium .accordion-button {
      position: relative !important;
      padding: 24px !important;
      font-weight: 600 !important;
      color: #0f172a !important;
      font-size: 16px !important;
    }
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
      font-size: unset !important;
      color: unset !important;
      font-weight: unset !important;
      margin: 0 !important;
      width: 14px !important;
      height: 2px !important;
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
      color: #0f172a !important;
    }
    .accordion-premium .accordion-button:not(.collapsed)::before {
      transform: rotate(90deg) !important;
      opacity: 0 !important;
    }
    .accordion-premium .accordion-button:not(.collapsed)::after {
      transform: rotate(180deg) !important;
    }
    .accordion-premium .accordion-body {
      padding: 24px !important;
      font-size: 14px !important;
      color: #64748b !important;
      line-height: 1.6 !important;
      border-top: 1px solid rgba(0,0,0,0.05);
    }

    @media (max-width: 991px) {
      .premium-media-container { height: auto !important; max-width: 280px !important; margin-top: 2rem; }
      .bento-grid { flex-direction: column; }
      .workflow-line { display: none; }
    }

    .section-gray-bg {
      background: #f1f5f9 !important;
    }
  </style>
@endsection

@section('content')
  <!-- ═══════════ HERO SECTION ═══════════ -->
  <section class="section hero-section d-flex align-items-center" style="overflow: hidden;">
    <div class="container position-relative z-1">
      <div class="row align-items-center justify-content-between g-4">
        
        <!-- Bagian Kiri: Typografi & Bento Grid -->
        <div class="col-lg-6 pe-lg-5" data-aos="fade-up" data-aos-duration="1000">
          <div class="mb-4">
            <span class="badge-premium mb-3">Layanan KOMINFO</span>
            <h1 class="title-oversized"><span class="text-dark">Pusat</span> Penelitian, Magang <br>& Publikasi Jurnal</h1>
            <p class="subtitle-premium">
              Diskominfo Kota Bogor memfasilitasi para mahasiswa, peneliti, dan akademisi untuk melaksanakan berbagai kegiatan akademik. Mulai dari pengajuan izin penelitian, program magang profesional (PKL), hingga pengumpulan berkas jurnal atau karya tulis ilmiah Anda secara terintegrasi.
            </p>
            <p class="subtitle-premium">Silakan pilih layanan yang Anda butuhkan di bawah ini.</p>
          </div>

          <div class="bento-grid">
            <a href="{{ route('layanan.penelitian.submit') }}" class="bento-card">
              <div class="bento-icon-wrapper icon-blue">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><circle cx="10" cy="13" r="2"></circle><line x1="11.4" y1="14.4" x2="15" y2="18"></line></svg>
              </div>
              <h3 class="bento-title">Penelitian</h3>
              <p class="bento-desc">Pengajuan Izin Riset & Data</p>
            </a>
            
            <a href="{{ route('layanan.magang') }}" class="bento-card">
              <div class="bento-icon-wrapper icon-green">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
              </div>
              <h3 class="bento-title">Magang</h3>
              <p class="bento-desc">Pendaftaran Program PKL</p>
            </a>

            <a href="{{ route('layanan.jurnal') }}" class="bento-card">
              <div class="bento-icon-wrapper icon-orange">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path><line x1="12" y1="6" x2="16" y2="6"></line><line x1="12" y1="10" x2="16" y2="10"></line></svg>
              </div>
              <h3 class="bento-title">Jurnal</h3>
              <p class="bento-desc">Publikasi Karya Hasil Akhir</p>
            </a>
          </div>
        </div>

        <!-- Bagian Kanan: Static Poster -->
        <div class="col-lg-5 offset-lg-1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
          <div class="premium-media-container">
            <img src="{{ asset('layanan-publik/images/research_illustration.png') }}" class="premium-img-main" alt="Ilustrasi Penelitian">
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ═══════════ ALUR KERJA SECTION ═══════════ -->
  <section class="section section-gray-bg" style="padding: 6rem 0;">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold mb-3">Alur Proses Pelaksanaan</h2>
        <p class="text-muted">Langkah mudah untuk memulai magang or riset Anda di Diskominfo Kota Bogor</p>
      </div>
      
      <div class="row position-relative">
        <!-- Connector line -->
        <div class="workflow-connector-line" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="500"></div>
        <div class="col-md-3 col-sm-6 mb-4 workflow-step-col" data-aos="fade-up" data-aos-delay="100">
          <div class="workflow-step">
            <div class="step-icon">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5c-2.2 0-4 1.8-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            </div>
            <h5 class="fw-bold mb-2">1. Registrasi</h5>
            <p class="small text-muted mb-0">Isi form pengajuan secara online dengan melampirkan berkas dari Universitas/Sekolah.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 workflow-step-col" data-aos="fade-up" data-aos-delay="200">
          <div class="workflow-step">
            <div class="step-icon">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
            <h5 class="fw-bold mb-2">2. Verifikasi</h5>
            <p class="small text-muted mb-0">Tim SDM akan meninjau ketersediaan kuota dan kesesuaian jurusan Anda.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 workflow-step-col" data-aos="fade-up" data-aos-delay="300">
          <div class="workflow-step">
            <div class="step-icon">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
            <h5 class="fw-bold mb-2">3. Pelaksanaan</h5>
            <p class="small text-muted mb-0">Melaksanakan magang/penelitian sesuai durasi dan arahan mentor pembimbing.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4 workflow-step-col" data-aos="fade-up" data-aos-delay="400">
          <div class="workflow-step">
            <div class="step-icon">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            </div>
            <h5 class="fw-bold mb-2">4. Laporan Akhir</h5>
            <p class="small text-muted mb-0">Mengumpulkan jurnal/laporan akhir ke sistem untuk diarsipkan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════ FAQ SECTION ═══════════ -->
  <section class="section position-relative" style="padding: 6rem 0 8rem 0; z-index: 2;">
    <div class="container position-relative z-1">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3">Pertanyaan Umum</h2>
            <p class="text-muted">Informasi yang sering ditanyakan seputar magang dan riset</p>
          </div>

          <div class="accordion-premium" id="faqAccordion">
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-target="collapseOne">
                  Berapa lama durasi magang yang diperbolehkan?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse">
                <div class="accordion-body">
                  Durasi pelaksanaan magang dapat disesuaikan dengan kebutuhan kurikulum kampus atau sekolah Anda, dengan jangka waktu umum berkisar antara 1 hingga 3 bulan. Kami juga terbuka untuk perpanjangan waktu magang jika kuota divisi masih tersedia dan disetujui oleh mentor pembimbing.
                </div>
              </div>
            </div>
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-target="collapseTwo">
                  Apakah ada kompensasi finansial (gaji) selama magang?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse">
                <div class="accordion-body">
                  Saat ini, program magang (PKL) di Diskominfo Kota Bogor tidak memberikan kompensasi finansial (gaji). Fokus utama dari program ini adalah memberikan pengalaman kerja nyata secara profesional di lingkungan pemerintahan daerah, bimbingan proyek digital, serta pemenuhan kebutuhan nilai akademik akademis Anda.
                </div>
              </div>
            </div>
            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-target="collapseThree">
                  Bagaimana cara mengetahui pengajuan saya diterima?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse">
                <div class="accordion-body">
                  Pengumuman dan status pengajuan magang atau riset Anda akan dikirimkan secara resmi melalui email yang telah Anda daftarkan di pendaftaran online. Proses verifikasi berkas oleh Tim SDM biasanya memakan waktu maksimal 7 hari kerja setelah semua dokumen lengkap kami terima.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════ CTA SECTION ═══════════ -->
  <section class="section" style="padding-bottom: 10rem;">
    <div class="container">
      <div class="cta-card" data-aos="fade-up" data-aos-duration="1000">
        <div class="position-relative z-1">
          <h3 class="fw-bold mb-3">Siap Memulai Kolaborasi?</h3>
          <p class="mb-4 opacity-75">Pilih layanan magang atau penelitian yang sesuai dengan kebutuhan akademik Anda dan jadilah bagian dari transformasi digital Kota Bogor.</p>
          <button onclick="window.scrollTo({top: 0, behavior: 'smooth'});" class="btn-light">
            Pilih Layanan Sekarang
          </button>
        </div>
        <!-- Decorative Background Elements -->
        <div class="cta-decor-1"></div>
        <div class="cta-decor-2"></div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    // Custom Vanilla Accordion FAQ
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
  </script>
@endsection
