@extends('layouts.layanan')

@section('title', 'Pengajuan Penelitian — Diskominfo Kota Bogor')
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

    .modern-hero {
      position: relative;
      padding: 135px 0 50px 0;
      z-index: 2;
    }
    
    .stat-box {
      background: rgba(255, 255, 255, 0.7);
      border: 1px solid rgba(226, 232, 240, 0.8);
      border-radius: 12px;
      padding: 1rem 0;
      text-align: center;
      min-width: 90px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    
    .stat-box h3 {
      color: #0ea5e9;
      font-weight: 800;
      margin-bottom: 0.2rem;
      font-size: 1.35rem;
    }
    
    .stat-box p {
      color: #64748b;
      margin: 0;
      font-size: 0.8rem;
      font-weight: 600;
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

    .modern-hero h1 {
      font-size: clamp(1.8rem, 2.8vw, 2.8rem);
      font-weight: 800;
      color: #0ea5e9;
      letter-spacing: -0.02em;
      margin-bottom: 1rem;
      line-height: 1.2;
    }

    .modern-hero p.lead-text {
      font-size: 0.95rem;
      line-height: 1.6;
      color: var(--slate-500);
      font-weight: 400;
      max-width: 95%;
      margin-bottom: 12px;
    }

    .btn-back-sticky {
      position: fixed;
      top: 100px;
      left: 24px;
      width: 50px;
      height: 50px;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border: 2px solid #e2e8f0;
      color: var(--primary-dark);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1050;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    
    .btn-back-sticky:hover {
      background: #ffffff;
      border-color: var(--primary);
      color: var(--primary);
      transform: scale(1.1);
      box-shadow: 0 8px 25px rgba(14, 165, 233, 0.2);
    }

    /* Premium Image Section */
    .premium-media-container {
      position: relative;
      max-width: 440px;
      margin: 0 auto;
      filter: drop-shadow(0 15px 30px rgba(124, 58, 237, 0.15));
    }
    .premium-img-main {
      width: 100%; height: auto; object-fit: contain; display: block;
    }

    @media (max-width: 768px) {
      .btn-back-sticky {
        top: 85px;
        left: 15px;
        width: 44px;
        height: 44px;
      }
      body::after {
        height: 900px;
      }
      .modern-hero {
        padding: 110px 0 40px 0;
        text-align: center !important;
      }
      .modern-hero h1 {
        font-size: 1.8rem !important;
      }
      .form-card {
        padding: 1.5rem;
        border-radius: 16px;
      }
      .custom-nav-pills {
        flex-direction: column;
        width: 100%;
      }
      .custom-nav-pills .nav-link {
        text-align: center;
        width: 100%;
      }
      .info-box {
        padding: 1.5rem;
        margin-top: 2rem;
      }
      .btn-submit {
        width: 100%;
      }
      .premium-media-container {
        max-width: 280px !important;
        margin: 0 auto 2rem auto;
      }
    }

    /* ── Form sizing overrides ── */
    .form-card {
      padding: 2.5rem 3rem;
      border-radius: 20px;
      box-shadow: none;
    }

    .form-label {
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 0.4rem;
    }

    .form-control, .form-select {
      padding: 0.75rem 1rem;
      font-size: 0.9rem;
      border-radius: 8px;
    }

    .form-text {
      font-size: 0.72rem;
    }

    .btn-submit {
      padding: 11px 28px;
      font-size: 0.95rem;
      border-radius: 8px;
    }

    .info-box {
      padding: 1.75rem;
      border-radius: 14px;
    }

    .info-box h5 {
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .info-box ol {
      font-size: 0.85rem;
    }

    .custom-nav-pills .nav-link {
      padding: 9px 18px;
      font-size: 0.88rem;
    }
  </style>
@endsection

@section('content')
  <!-- ─── BACK BUTTON ─── -->
  <a href="{{ route('layanan.penelitian') }}" class="btn-back-sticky" title="Kembali ke Penelitian">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
  </a>
  
  <section class="modern-hero">
    <div class="container">
      <div class="row align-items-center justify-content-between g-4">
        <div class="col-lg-6 pe-lg-5" data-aos="fade-up" data-aos-duration="1000">
          <span class="badge-premium mb-3">Layanan KOMINFO</span>
          <h1>Portal Pengajuan Penelitian</h1>
          <p class="lead-text">
            Diskominfo Kota Bogor membuka kesempatan bagi akademisi, peneliti, dan mahasiswa untuk melakukan penelitian di lingkungan Diskominfo. Ajukan permohonan Anda secara online, pantau status, dan unggah hasil penelitian melalui portal ini.
          </p>
          <p class="lead-text">Isi formulir di bawah dan kirimkan berkas yang diperlukan.</p>
          <div class="d-flex gap-3 mt-4">
            <div class="stat-box flex-fill">
              <h3>4</h3>
              <p>Bidang</p>
            </div>
            <div class="stat-box flex-fill">
              <h3>50+</h3>
              <p>Penelitian</p>
            </div>
            <div class="stat-box flex-fill">
              <h3>100%</h3>
              <p>Digital</p>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
          <div class="premium-media-container">
            <img src="{{ asset('layanan-publik/images/submit_illustration.png') }}" class="premium-img-main" alt="Ilustrasi Pengajuan Penelitian">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ─── KONTEN UTAMA ─── -->
  <section class="section position-relative" style="padding: 5rem 0 8rem 0; z-index: 2;">
    <div class="container position-relative z-1">

      <div class="form-card" data-aos="fade-up">
        <!-- TABS -->
        <div class="mb-5">
          <ul class="nav custom-nav-pills" id="penelitianTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="pengajuan-tab" data-bs-target="#pengajuan" type="button">Pengajuan Permohonan</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="status-tab" data-bs-target="#status" type="button">Cek Status</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="unggah-tab" data-bs-target="#unggah" type="button">Unggah Jurnal</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="status-jurnal-tab" data-bs-target="#status-jurnal" type="button">Status Jurnal</button>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="penelitianTabsContent">
          
          <!-- TAB 1: PENGAJUAN PERMOHONAN -->
          <div class="tab-pane show active" id="pengajuan" role="tabpanel">
            <div class="row g-4 align-items-start">
              <!-- Kolom Form (Kiri) -->
              <div class="col-lg-8">
                <h4 class="fw-bold mb-4" style="font-size: 1.3rem; color: #1e293b;">Formulir Pengajuan Permohonan Penelitian</h4>
                
                @if ($errors->any())
                  <div class="alert alert-danger" style="background-color: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.85rem;">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <form action="{{ route('layanan.penelitian.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap Anda" value="{{ old('nama_lengkap') }}">
                  </div>

                  <div class="row g-3 mb-4">
                    <div class="col-md-6">
                      <label class="form-label">No Telepon / WhatsApp</label>
                      <input type="tel" name="no_telepon" class="form-control" required placeholder="08xxxxxxxxxx" value="{{ old('no_telepon') }}">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Alamat Email</label>
                      <input type="email" name="email" class="form-control" required placeholder="email@domain.com" value="{{ old('email') }}">
                    </div>
                  </div>

                  <div class="mb-4">
                    <label class="form-label">Nama Instansi / Universitas</label>
                    <input type="text" name="instansi" class="form-control" required placeholder="Nama Sekolah / Kampus" value="{{ old('instansi') }}">
                  </div>

                  <div class="mb-4">
                    <label class="form-label">Judul Penelitian</label>
                    <input type="text" name="judul_penelitian" class="form-control" required placeholder="Topik atau Judul Riset" value="{{ old('judul_penelitian') }}">
                  </div>

                  <div class="row g-3 mb-4">
                    <div class="col-md-6">
                      <label class="form-label">Lokasi Penelitian</label>
                      <select name="lokasi_penelitian" class="form-select" required>
                        <option value="" disabled {{ old('lokasi_penelitian') == '' ? 'selected' : '' }}>-- Pilih Lokasi --</option>
                        <option value="Diskominfo" {{ old('lokasi_penelitian') == 'Diskominfo' ? 'selected' : '' }}>Diskominfo Kota Bogor</option>
                        <option value="Kecamatan" {{ old('lokasi_penelitian') == 'Kecamatan' ? 'selected' : '' }}>Kecamatan/Kelurahan</option>
                        <option value="Publik" {{ old('lokasi_penelitian') == 'Publik' ? 'selected' : '' }}>Ruang Publik / Masyarakat</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Bidang Tujuan</label>
                      <select name="bidang_tujuan" class="form-select" required>
                        <option value="" disabled {{ old('bidang_tujuan') == '' ? 'selected' : '' }}>-- Pilih Bidang --</option>
                        <option value="Aplikasi" {{ old('bidang_tujuan') == 'Aplikasi' ? 'selected' : '' }}>Aplikasi / e-Government</option>
                        <option value="IKP" {{ old('bidang_tujuan') == 'IKP' ? 'selected' : '' }}>Informasi & Komunikasi Publik</option>
                        <option value="Infrastruktur" {{ old('bidang_tujuan') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur & Jaringan</option>
                        <option value="Statistik" {{ old('bidang_tujuan') == 'Statistik' ? 'selected' : '' }}>Statistik Sektoral</option>
                      </select>
                    </div>
                  </div>

                  <div class="row g-3 mb-5">
                    <div class="col-md-6">
                      <label class="form-label">Surat Penelitian (PDF)</label>
                      <input type="file" name="surat_penelitian" class="form-control" accept=".pdf" required>
                      <div class="form-text mt-1">Maks 2MB, format .pdf</div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Surat Kesbangpol (PDF)</label>
                      <input type="file" name="surat_kesbangpol" class="form-control" accept=".pdf">
                      <div class="form-text mt-1">Maks 2MB, format .pdf</div>
                    </div>
                  </div>

                  <div class="mt-4">
                    <button type="submit" class="btn-submit">
                      Submit Pengajuan
                    </button>
                  </div>
                </form>
              </div>

              <!-- Kolom Info (Kanan) -->
              <div class="col-lg-4">
                <div class="info-box sticky-top" style="top: 100px;">
                  <h5 style="display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:#ea580c;flex-shrink:0;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    Informasi Penting!
                  </h5>
                  <ol>
                    <li>Pastikan data yang Anda kirimkan <strong>Valid</strong>.</li>
                    <li><strong>Nomor Tiket</strong> pengajuan akan dikirimkan melalui <strong>email Anda</strong>.</li>
                    <li>Nomor Tiket dapat digunakan untuk <strong>memantau status permohonan</strong>.</li>
                    <li>Jika disetujui, <strong>surat jawaban</strong> akan dikirim via email.</li>
                  </ol>
                  
                  <div class="text-center mt-4">
                    <img src="{{ asset('layanan-publik/images/submit_illustration.png') }}" alt="Ilustrasi Pengajuan Penelitian" class="rounded-3" style="max-height: 220px; width: 100%; object-fit: contain; margin: 0 auto;">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 2: STATUS PENGAJUAN -->
          <div class="tab-pane" id="status" role="tabpanel">
            <div class="row g-4">
              <div class="col-lg-8">
                <div class="text-center" style="padding: 2rem 0;">
                  <div class="mb-4 d-inline-flex justify-content-center align-items-center" style="width: 72px; height: 72px; background: #e0f2fe; border-radius: 50%; color: var(--primary);">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  </div>
                  <h4 class="fw-bold mb-3">Lacak Pengajuan Penelitian</h4>
                  <p class="text-secondary mb-4" style="max-width: 500px; margin: 0 auto 1.5rem auto;">Masukkan Nomor Tiket yang telah dikirimkan ke email Anda untuk mengetahui apakah izin penelitian Anda sudah diterbitkan.</p>
                  
                  <form style="max-width: 400px; margin: 0 auto;" onsubmit="event.preventDefault(); checkStatus();">
                    <div class="mb-4">
                      <input type="text" id="checkStatusTicket" class="form-control fw-bold text-center" placeholder="TKT-PEN-XXXXX" required style="letter-spacing: 2px; font-size: 1.2rem;">
                    </div>
                    <button type="button" class="btn-submit" onclick="checkStatus()">Cek Status</button>
                  </form>
                </div>
              </div>
              <div class="col-lg-4 d-none d-lg-block">
                <div class="info-box sticky-top" style="top: 100px;">
                  <h5 style="display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:#ea580c;flex-shrink:0;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    Lacak Cepat
                  </h5>
                  <p class="text-muted" style="line-height: 1.8;">Gunakan nomor tiket yang Anda terima di email untuk melihat apakah surat balasan atau izin dari dinas sudah diterbitkan. Proses review biasanya membutuhkan waktu 1-3 hari kerja.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 3: UNGGAH JURNAL -->
          <div class="tab-pane" id="unggah" role="tabpanel">
            <div class="row g-4">
              <div class="col-lg-8">
                <div>
                  <h4 class="fw-bold mb-4">Unggah Laporan Akhir / Jurnal</h4>
                  <p class="text-muted mb-4">Sesuai peraturan, Anda wajib menyerahkan laporan hasil akhir penelitian setelah riset selesai dilakukan.</p>
                  
                  <form action="{{ route('layanan.penelitian.jurnal.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                      <div class="col-md-12">
                        <label class="form-label">Nomor Tiket Pengajuan</label>
                        <input type="text" name="ticket_number" class="form-control" placeholder="Masukkan nomor tiket Anda" required>
                      </div>
                      <div class="col-md-12">
                        <label class="form-label">Link Publikasi Jurnal (Opsional)</label>
                        <input type="url" name="jurnal_link" class="form-control" placeholder="https://jurnal.universitas.ac.id/...">
                      </div>
                      <div class="col-md-12">
                        <label class="form-label">File Dokumen Final / Jurnal (PDF)</label>
                        <input type="file" name="file_jurnal" class="form-control" style="padding: 1.5rem 1rem; border-style: dashed;" accept=".pdf" required>
                        <div class="form-text mt-2">Format dokumen PDF (Maks 10MB).</div>
                      </div>
                    </div>
                    
                    <div class="mt-4">
                      <button type="submit" class="btn-submit">Unggah Dokumen</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-4 d-none d-lg-block">
                <div class="info-box sticky-top" style="top: 100px;">
                  <h5 style="display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:#ea580c;flex-shrink:0;"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    Kontribusi Riset
                  </h5>
                  <p class="text-muted" style="line-height: 1.8;">Kami sangat menghargai kontribusi penelitian Anda. Laporan akhir atau Jurnal yang Anda unggah akan menjadi salah satu referensi berharga bagi pembangunan ekosistem digital cerdas di Kota Bogor.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 4: STATUS JURNAL -->
          <div class="tab-pane" id="status-jurnal" role="tabpanel">
            <div class="row g-4">
              <div class="col-lg-8">
                <div class="text-center" style="padding: 2rem 0;">
                  <div class="mb-4 d-inline-flex justify-content-center align-items-center" style="width: 72px; height: 72px; background: #e0f2fe; border-radius: 50%; color: var(--primary);">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                  </div>
                  <h4 class="fw-bold mb-3">Status Verifikasi Laporan</h4>
                  <p class="text-secondary mb-4" style="max-width: 500px; margin: 0 auto 1.5rem auto;">Pastikan dokumen akhir Anda telah diverifikasi dan diterima dengan baik oleh tim Diskominfo Kota Bogor.</p>
                  
                  <form style="max-width: 400px; margin: 0 auto;" onsubmit="event.preventDefault(); checkJurnalStatus();">
                    <div class="mb-4">
                      <input type="text" id="checkJurnalTicket" class="form-control fw-bold text-center" placeholder="Nomor Tiket" required style="letter-spacing: 2px; font-size: 1.2rem;">
                    </div>
                    <button type="button" class="btn-submit" onclick="checkJurnalStatus()">Lihat Status</button>
                  </form>
                </div>
              </div>
              <div class="col-lg-4 d-none d-lg-block">
                <div class="info-box sticky-top" style="top: 100px;">
                  <h5 style="display:flex;align-items:center;gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="color:#ea580c;flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    Validasi Berkas
                  </h5>
                  <p class="text-muted" style="line-height: 1.8;">Proses verifikasi dokumen akhir biasanya memakan waktu beberapa hari kerja setelah diunggah. Pastikan nomor tiket yang Anda masukkan sesuai dengan tiket permohonan awal.</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div> <!-- END FORM CARD -->
    </div>
  </section>
@endsection

@section('scripts')
  <!-- Flash message script blocks to trigger alert alerts -->
  @if(session('success_penelitian'))
    <script>
      alert("{{ session('success_penelitian') }}");
    </script>
  @endif

  @if(session('success_jurnal'))
    <script>
      alert("{{ session('success_jurnal') }}");
    </script>
  @endif

  @if(session('error_jurnal'))
    <script>
      alert("{{ session('error_jurnal') }}");
    </script>
  @endif

  <script>
    // Custom Vanilla Tabs Toggle
    document.querySelectorAll('#penelitianTabs button').forEach(button => {
      button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-bs-target');
        
        // Remove active class from all buttons
        document.querySelectorAll('#penelitianTabs button').forEach(btn => {
          btn.classList.remove('active');
        });
        
        // Hide all tab content panes
        document.querySelectorAll('.tab-pane').forEach(pane => {
          pane.classList.remove('show', 'active');
        });

        // Add active class to clicked button
        button.classList.add('active');
        
        // Show target tab pane
        const targetPane = document.querySelector(targetId);
        if (targetPane) {
          targetPane.classList.add('show', 'active');
        }
      });
    });

    // AJAX checks
    function checkStatus() {
      const ticket = document.getElementById('checkStatusTicket').value.trim();
      if (!ticket) {
        alert('Masukkan nomor tiket Anda.');
        return;
      }
      fetch('{{ route("layanan.penelitian.status") }}?ticket=' + encodeURIComponent(ticket))
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

    function checkJurnalStatus() {
      const ticket = document.getElementById('checkJurnalTicket').value.trim();
      if (!ticket) {
        alert('Masukkan nomor tiket Anda.');
        return;
      }
      fetch('{{ route("layanan.penelitian.jurnal.status") }}?ticket=' + encodeURIComponent(ticket))
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert("Status Jurnal: " + data.status);
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
