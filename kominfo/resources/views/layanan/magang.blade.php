@extends('layouts.layanan')

@section('title', 'Pendaftaran Magang (PKL) — Diskominfo Kota Bogor')
@section('description', 'Dinas Komunikasi dan Informatika Kota Bogor — Pendaftaran program magang dan PKL secara online.')

@section('styles')
  <style>
    html { scroll-behavior: smooth; }

    body::after {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 100%; height: 600px;
      background: linear-gradient(180deg, rgba(224, 242, 254, 0.4) 0%, rgba(248, 250, 252, 0) 100%);
      z-index: -1;
      pointer-events: none;
    }

    .modern-hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding-top: 72px;
      z-index: 2;
      text-align: center;
    }

    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(2, 132, 199, 0.1);
      border: 1px solid rgba(2, 132, 199, 0.2);
      padding: 6px 20px;
      border-radius: 50px;
      color: var(--primary);
      font-weight: 600;
      font-size: 0.85rem;
      margin-bottom: 20px;
    }

    .hero-badge-dot {
      width: 8px; height: 8px; background: var(--primary); border-radius: 50%;
      animation: pulseBlue 2s infinite;
    }

    @keyframes pulseBlue {
      0% { box-shadow: 0 0 0 0 rgba(2, 132, 199, 0.4); }
      70% { box-shadow: 0 0 0 10px rgba(2, 132, 199, 0); }
      100% { box-shadow: 0 0 0 0 rgba(2, 132, 199, 0); }
    }

    .modern-hero h1 {
      font-size: clamp(1.8rem, 3.5vw, 3rem);
      font-weight: 800;
      color: var(--slate-900);
      letter-spacing: -0.02em;
      margin-bottom: 16px;
      line-height: 1.2;
    }

    .modern-hero h1 span { color: var(--accent); }

    .modern-hero p.hero-desc {
      font-size: 0.95rem;
      color: var(--slate-500);
      max-width: 600px;
      margin: 0 auto 28px;
      line-height: 1.7;
    }

    .btn-hero-primary {
      background: var(--accent);
      border: none; color: #ffffff;
      font-weight: 700; padding: 10px 24px;
      border-radius: 50px;
      box-shadow: 0 4px 14px rgba(14,165,233,0.35);
      transition: all 0.3s ease;
      display: inline-flex; align-items: center; justify-content: center; gap: 8px;
      text-decoration: none; font-size: 0.9rem; cursor: pointer; font-family: inherit;
    }
    .btn-hero-primary:hover {
      transform: translateY(-2px); box-shadow: 0 6px 20px rgba(14,165,233,0.4);
      color: #ffffff; background: var(--accent-dark);
    }
    .btn-hero-secondary {
      background: #ffffff; border: 1.5px solid #e2e8f0; color: var(--slate-700);
      font-weight: 600; padding: 10px 24px;
      border-radius: 50px;
      transition: all 0.3s ease;
      display: inline-flex; align-items: center; justify-content: center;
      text-decoration: none; font-size: 0.9rem; cursor: pointer; font-family: inherit;
    }
    .btn-hero-secondary:hover {
      border-color: var(--primary); color: var(--primary);
      transform: translateY(-2px); box-shadow: 0 4px 12px rgba(14,165,233,0.1);
    }

    /* Posisi Magang Cards */
    .posisi-wrapper { position: relative; z-index: 10; }

    .posisi-card {
      background: var(--surface);
      border-radius: 16px;
      padding: 2rem 1rem;
      height: 100%;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      border: 1px solid #f1f5f9;
    }
    .posisi-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.10);
      background: var(--primary);
      border-color: var(--primary);
    }
    .posisi-card-front {
      transition: all 0.3s ease;
      width: 100%;
      display: flex; flex-direction: column; align-items: center;
    }
    .posisi-card-back {
      position: absolute; top: 0; left: 0; right: 0; bottom: 0;
      padding: 1.25rem;
      display: flex; align-items: center; justify-content: center; text-align: center;
      color: #ffffff; opacity: 0; transform: translateY(20px);
      transition: all 0.3s ease; pointer-events: none;
    }
    .posisi-card-back p { margin: 0; font-size: 0.88rem; line-height: 1.6; font-weight: 500; }
    .posisi-card:hover .posisi-card-front { opacity: 0; transform: translateY(-20px); }
    .posisi-card:hover .posisi-card-back { opacity: 1; transform: translateY(0); }
    .posisi-icon {
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 1rem; transition: all 0.3s ease;
    }
    .posisi-icon svg { width: 50px; height: 50px; stroke-width: 1.5; }
    .posisi-icon.icon-blue { color: #1e3a8a; }
    .posisi-icon.icon-pink { color: #ec4899; }
    .posisi-icon.icon-green { color: #10b981; }
    .posisi-card:hover .posisi-icon { color: #ffffff; transform: scale(1.1); }
    .posisi-card h4 {
      font-weight: 700; color: var(--primary); font-size: 0.95rem;
      text-transform: uppercase; letter-spacing: 0.5px;
      transition: color 0.3s ease; margin-bottom: 0; line-height: 1.4;
    }
    .posisi-card:hover h4 { color: #ffffff; }

    /* Back button */
    .btn-back-sticky {
      position: fixed; top: 100px; left: 24px;
      width: 50px; height: 50px;
      background: rgba(255,255,255,0.85); backdrop-filter: blur(10px);
      border: 2px solid #e2e8f0; color: var(--primary-dark);
      border-radius: 50%; display: flex; align-items: center; justify-content: center;
      z-index: 1050; transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .btn-back-sticky:hover {
      background: #ffffff; border-color: var(--primary); color: var(--primary);
      transform: scale(1.1); box-shadow: 0 8px 25px rgba(14,165,233,0.2);
    }

    /* Premium Illustration */
    .premium-media-container {
      position: relative; max-width: 440px; margin: 0 auto;
      filter: drop-shadow(0 15px 30px rgba(124,58,237,0.15));
    }
    .premium-img-main { width: 100%; height: auto; object-fit: contain; display: block; }

    /* Form overrides */
    .form-card { padding: 2.5rem 3rem; border-radius: 20px; box-shadow: none; }
    .form-label { font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; }
    .form-control, .form-select { padding: 0.75rem 1rem; font-size: 0.9rem; border-radius: 8px; }
    .form-text { font-size: 0.72rem; }
    .btn-submit { padding: 11px 28px; font-size: 0.95rem; border-radius: 8px; }
    .info-box { padding: 1.75rem; border-radius: 14px; }
    .info-box h5 { font-size: 1rem; margin-bottom: 1rem; }
    .info-box ol { font-size: 0.85rem; }
    .custom-nav-pills .nav-link { padding: 9px 18px; font-size: 0.88rem; }

    @media (max-width: 768px) {
      .btn-back-sticky { top: 85px; left: 15px; width: 44px; height: 44px; }
      body::after { height: 900px; }
      .modern-hero { padding: 110px 0 40px 0; text-align: center !important; }
      .modern-hero h1 { font-size: 1.8rem !important; }
      .form-card { padding: 1.5rem; border-radius: 16px; }
      .custom-nav-pills { flex-direction: column; width: 100%; }
      .custom-nav-pills .nav-link { text-align: center; width: 100%; }
      .info-box { padding: 1.5rem; margin-top: 2rem; }
      .btn-submit { width: 100%; }
      .premium-media-container { max-width: 280px !important; margin: 0 auto 2rem auto; }
      .posisi-card { padding: 1.5rem 1rem; }
      .posisi-icon svg { width: 40px; height: 40px; }
    }
  </style>
@endsection

@section('content')
  <!-- Back Button -->
  <a href="{{ route('layanan.penelitian') }}" class="btn-back-sticky" title="Kembali ke Penelitian">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
  </a>

  <!-- ═══════════ HERO SECTION ═══════════ -->
  <div class="modern-hero" data-aos="fade-up">
    <div class="container">
      <div class="hero-badge">
        <div class="hero-badge-dot"></div>
        Program Magang Batch 2026
      </div>
      <h1>Program Magang <span>Profesional</span></h1>
      <p class="hero-desc">Bangun karier masa depan Anda bersama Diskominfo Kota Bogor. Dapatkan pengalaman nyata dalam mengembangkan ekosistem digital cerdas berskala kota dengan standar tinggi.</p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="#form-daftar" class="btn-hero-primary">
          Daftar Sekarang
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
        <a href="#posisi" class="btn-hero-secondary">Lihat Posisi Tersedia</a>
      </div>
    </div>
  </div>

  <!-- ═══════════ POSISI TERSEDIA ═══════════ -->
  <section class="section position-relative" style="padding: 3rem 0 2rem 0; z-index: 2;">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up">
        <h2 class="fw-bold" style="font-size: 1.4rem; color: #1e293b;">Posisi Tersedia</h2>
        <p class="text-muted" style="font-size: 0.9rem;">Hover kartu untuk melihat deskripsi posisi</p>
      </div>
      <div id="posisi" class="posisi-wrapper" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 justify-content-center">
          <div class="col-md-4 col-sm-6">
            <div class="posisi-card">
              <div class="posisi-card-front">
                <div class="posisi-icon icon-blue">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h4>Web / App<br>Developer</h4>
              </div>
              <div class="posisi-card-back">
                <p>Membangun dan mengembangkan aplikasi web cerdas (Smart City) dengan teknologi modern untuk pelayanan publik.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="posisi-card">
              <div class="posisi-card-front">
                <div class="posisi-icon icon-pink">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                </div>
                <h4>Network &amp;<br>SysAdmin</h4>
              </div>
              <div class="posisi-card-back">
                <p>Mengelola jaringan fiber optik kota, pemeliharaan server, dan memastikan keamanan infrastruktur IT daerah.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="posisi-card">
              <div class="posisi-card-front">
                <div class="posisi-icon icon-green">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                </div>
                <h4>Multimedia &amp;<br>Sosmed</h4>
              </div>
              <div class="posisi-card-back">
                <p>Mendesain grafis, memproduksi video kreatif, dan mengelola media sosial resmi pemerintah kota.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════ FORM SECTION ═══════════ -->
  <section class="section position-relative" style="padding: 3rem 0 8rem 0; z-index: 2;">
    <div class="container position-relative z-1">
      <div class="form-card" id="form-daftar" data-aos="fade-up">
        <!-- TABS -->
        <div class="mb-5">
          <ul class="nav custom-nav-pills" id="magangTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="pengajuan-tab" data-bs-target="#pengajuan" type="button">Pengajuan Magang</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="status-tab" data-bs-target="#status" type="button">Cek Status Pengajuan</button>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="magangTabsContent">

          <!-- TAB 1: PENGAJUAN -->
          <div class="tab-pane show active" id="pengajuan" role="tabpanel">
            <div class="row g-4 align-items-start">
              <div class="col-lg-8">
                <h4 class="fw-bold mb-4" style="font-size: 1.3rem; color: #1e293b;">Formulir Pendaftaran Magang / PKL</h4>
                
                @if ($errors->any())
                  <div class="alert alert-danger" style="background-color: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem;">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form action="{{ route('layanan.magang.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row g-3 mb-3">
                    <div class="col-md-6">
                      <label class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" required placeholder="Sesuai Identitas" value="{{ old('nama_lengkap') }}">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Email Aktif</label>
                      <input type="email" name="email" class="form-control" required placeholder="email@domain.com" value="{{ old('email') }}">
                    </div>
                  </div>
                  <div class="row g-3 mb-3">
                    <div class="col-md-6">
                      <label class="form-label">No. WhatsApp</label>
                      <input type="tel" name="no_whatsapp" class="form-control" required placeholder="08xxxxxxxxxx" value="{{ old('no_whatsapp') }}">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Posisi Diminati</label>
                      <select name="posisi_diminati" class="form-select" required>
                        <option value="" disabled {{ old('posisi_diminati') == '' ? 'selected' : '' }}>-- Pilih Posisi --</option>
                        <option value="web-app-developer" {{ old('posisi_diminati') == 'web-app-developer' ? 'selected' : '' }}>Web / App Developer</option>
                        <option value="network-sysadmin" {{ old('posisi_diminati') == 'network-sysadmin' ? 'selected' : '' }}>Network / SysAdmin</option>
                        <option value="multimedia-sosmed" {{ old('posisi_diminati') == 'multimedia-sosmed' ? 'selected' : '' }}>Multimedia &amp; Sosmed</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Asal Kampus / Sekolah</label>
                    <input type="text" name="asal_kampus_sekolah" class="form-control" required placeholder="Nama Universitas atau Sekolah Tinggi" value="{{ old('asal_kampus_sekolah') }}">
                  </div>
                  <div class="row g-3 mb-3">
                    <div class="col-md-6">
                      <label class="form-label">Lokasi Magang</label>
                      <select name="lokasi_magang" class="form-select" required>
                        <option value="" disabled {{ old('lokasi_magang') == '' ? 'selected' : '' }}>-- Penempatan --</option>
                        <option value="Diskominfo" {{ old('lokasi_magang') == 'Diskominfo' ? 'selected' : '' }}>Diskominfo Kota Bogor</option>
                        <option value="Kecamatan" {{ old('lokasi_magang') == 'Kecamatan' ? 'selected' : '' }}>Kecamatan/Kelurahan</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Bidang Tujuan</label>
                      <select name="bidang_tujuan" class="form-select" required>
                        <option value="" disabled {{ old('bidang_tujuan') == '' ? 'selected' : '' }}>-- Pilih Bidang --</option>
                        <option value="Aplikasi" {{ old('bidang_tujuan') == 'Aplikasi' ? 'selected' : '' }}>Aplikasi / e-Government</option>
                        <option value="IKP" {{ old('bidang_tujuan') == 'IKP' ? 'selected' : '' }}>Informasi &amp; Komunikasi Publik</option>
                        <option value="Infrastruktur" {{ old('bidang_tujuan') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur &amp; Jaringan</option>
                      </select>
                    </div>
                  </div>
                  <div class="row g-3 mb-4">
                    <div class="col-md-6">
                      <label class="form-label">Lama Magang (Minggu)</label>
                      <input type="number" name="lama_magang" class="form-control" min="4" max="24" required placeholder="Cth: 12" value="{{ old('lama_magang') }}">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Surat Pengantar &amp; CV (PDF)</label>
                      <input class="form-control" name="surat_cv" type="file" accept=".pdf" required>
                      <div class="form-text mt-1">Maks 5MB, format .pdf</div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <button type="submit" class="btn-submit">Kirim Permohonan Magang</button>
                  </div>
                </form>
              </div>

              <!-- Info Box -->
              <div class="col-lg-4">
                <div class="info-box sticky-top" style="top: 100px;">
                  <h5 style="display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:#ea580c;flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    Informasi Penting!
                  </h5>
                  <ol>
                    <li>Pastikan data yang Anda kirimkan <strong>Valid dan Sesuai Dokumen</strong>.</li>
                    <li><strong>Nomor Tiket</strong> akan dikirimkan ke <strong>email Anda</strong> secara otomatis.</li>
                    <li>Gunakan Nomor Tiket untuk <strong>memantau status permohonan</strong> di tab Cek Status.</li>
                    <li>Jika disetujui, <strong>surat balasan resmi</strong> akan dikirim via email.</li>
                  </ol>
                  <div class="text-center mt-4">
                    <img src="{{ asset('layanan-publik/images/magang_illustration.png') }}" alt="Ilustrasi Magang" class="rounded-3" style="max-height: 220px; width: 100%; object-fit: contain; margin: 0 auto;">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 2: STATUS -->
          <div class="tab-pane" id="status" role="tabpanel">
            <div class="row g-4">
              <div class="col-lg-8">
                <div class="text-center" style="padding: 2rem 0;">
                  <div class="mb-4 d-inline-flex justify-content-center align-items-center" style="width: 72px; height: 72px; background: #e0f2fe; border-radius: 50%; color: var(--primary);">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  </div>
                  <h4 class="fw-bold mb-3">Lacak Pengajuan Magang</h4>
                  <p class="text-secondary mb-4" style="max-width: 500px; margin: 0 auto 1.5rem auto;">Masukkan Nomor Tiket yang telah dikirimkan ke email Anda untuk mengetahui status terkini pengajuan magang.</p>
                  <form style="max-width: 400px; margin: 0 auto;" onsubmit="event.preventDefault(); checkMagangStatus();">
                    <div class="mb-4">
                      <input type="text" id="checkMagangTicket" class="form-control fw-bold text-center" placeholder="TKT-MAG-XXXXX" required style="letter-spacing: 2px; font-size: 1.2rem;">
                    </div>
                    <button type="button" class="btn-submit" onclick="checkMagangStatus()">Cek Status</button>
                  </form>
                </div>
              </div>
              <div class="col-lg-4 d-none d-lg-block">
                <div class="info-box sticky-top" style="top: 100px;">
                  <h5 style="display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:#ea580c;flex-shrink:0;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    Lacak Cepat
                  </h5>
                  <p class="text-muted" style="line-height: 1.8;">Gunakan nomor tiket yang Anda terima di email untuk melihat status proses seleksi magang. Pengumuman atau panggilan wawancara akan dikirim via WhatsApp &amp; email resmi kami.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  @if(session('success_magang'))
    <script>
      alert("{{ session('success_magang') }}");
    </script>
  @endif

  <script>
    // Custom Vanilla Tabs Toggle
    document.querySelectorAll('#magangTabs button').forEach(button => {
      button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-bs-target');
        document.querySelectorAll('#magangTabs button').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
        button.classList.add('active');
        const targetPane = document.querySelector(targetId);
        if (targetPane) {
          targetPane.classList.add('show', 'active');
        }
      });
    });

    // AJAX checks
    function checkMagangStatus() {
      const ticket = document.getElementById('checkMagangTicket').value.trim();
      if (!ticket) {
        alert('Masukkan nomor tiket Anda.');
        return;
      }
      fetch('{{ route("layanan.magang.status") }}?ticket=' + encodeURIComponent(ticket))
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert("Status Pengajuan: " + data.status);
          } else {
            alert(data.message || "Nomor Tiket tidak ditemukan.");
          }
        })
        .catch(err => {
          console.error(err);
          alert('Terjadi kesalahan saat memeriksa status.');
        });
    }
  </script>
@endsection
