@extends('layouts.layanan')

@section('title', 'Formulir Pengajuan Layanan — Diskominfo Kota Bogor')

@section('styles')
<style>
  :root {
    --primary: #0284c7;
    --primary-light: #f0f9ff;
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
  
  html { scroll-behavior: smooth; font-family: 'Inter', system-ui, -apple-system, sans-serif; background: var(--slate-50); }
  body { background: var(--slate-50); }

  .form-wrapper {
    background: white;
    border-radius: 24px;
    padding: 3rem;
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.05);
    margin: 40px auto 80px;
    max-width: 800px;
    border: 1px solid var(--slate-100);
  }

  .form-header {
    text-align: center;
    margin-bottom: 2.5rem;
  }
  .form-header h2 {
    font-weight: 800;
    color: var(--slate-900);
    font-size: 2rem;
    margin-bottom: 0.5rem;
  }
  .form-header p {
    color: var(--slate-500);
    font-size: 1.05rem;
  }

  /* Form Elements */
  .form-group-modern {
    position: relative;
    margin-bottom: 1.5rem;
  }
  .form-group-modern label {
    display: block;
    font-weight: 600;
    color: var(--slate-700);
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
  }
  .input-with-icon {
    position: relative;
  }
  .input-with-icon .input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--slate-400);
    display: flex;
    align-items: center;
  }
  .input-with-icon .form-control {
    padding-left: 3rem;
  }
  .form-control {
    width: 100%;
    padding: 0.85rem 1rem;
    border-radius: 14px;
    border: 1px solid var(--slate-200);
    font-size: 1rem;
    color: var(--slate-800);
    background-color: var(--slate-50);
    transition: all 0.2s;
  }
  .form-control:focus {
    background-color: white;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px var(--primary-light);
    outline: none;
  }
  .form-control::placeholder {
    color: var(--slate-400);
  }
  textarea.form-control {
    padding-left: 1.25rem;
  }

  .file-upload-wrapper {
    border: 2px dashed var(--slate-200); 
    border-radius: 16px; 
    padding: 3rem 1.5rem; 
    text-align: center;
    background: var(--slate-50); 
    cursor: pointer; 
    transition: all 0.2s;
  }
  .file-upload-wrapper:hover { 
    border-color: var(--primary); 
    background: var(--primary-light); 
  }

  .btn-submit {
    background: var(--primary);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 14px;
    font-weight: 600;
    font-size: 1.05rem;
    width: 100%;
    transition: all 0.3s;
    box-shadow: 0 10px 20px -5px rgba(2, 132, 199, 0.4);
  }
  .btn-submit:hover {
    background: #0369a1;
    transform: translateY(-2px);
    box-shadow: 0 15px 25px -5px rgba(2, 132, 199, 0.5);
  }
  
  .btn-back {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--slate-500);
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 2rem;
    transition: all 0.2s;
  }
  .btn-back:hover {
    color: var(--slate-900);
  }

  @media (max-width: 768px) {
    .form-wrapper { padding: 2rem 1.5rem; border-radius: 16px; }
    .form-header h2 { font-size: 1.75rem; }
  }
</style>
@endsection

@section('content')
<div class="container py-5">
  <a href="{{ route('layanan.kominfo') }}" class="btn-back">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    Kembali ke Portal
  </a>

  <div class="form-wrapper">
    <div class="form-header">
      <h2>Formulir Pengajuan</h2>
      <p>Lengkapi data di bawah ini untuk mengajukan layanan secara resmi.</p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="form-group-modern">
        <label>Jenis Layanan</label>
        <div class="input-with-icon">
          <span class="input-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg></span>
          <input type="text" class="form-control" name="jenis_layanan" value="{{ request('layanan') }}" readonly style="background: var(--slate-100); font-weight: 700; cursor: not-allowed;">
        </div>
      </div>

      <div class="row g-4 mb-4">
        <div class="col-md-6">
          <div class="form-group-modern m-0">
            <label>Nama Lengkap <span class="text-danger">*</span></label>
            <div class="input-with-icon">
              <span class="input-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
              <input type="text" class="form-control" name="nama" placeholder="Sesuai KTP" required>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="form-group-modern m-0">
            <label>Nomor WhatsApp <span class="text-danger">*</span></label>
            <div class="input-with-icon">
              <span class="input-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></span>
              <input type="text" class="form-control" name="no_hp" placeholder="08xxxx" required>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group-modern m-0">
            <label>Alamat Email <span class="text-danger">*</span></label>
            <div class="input-with-icon">
              <span class="input-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
              <input type="email" class="form-control" name="email" placeholder="nama@email.com" required>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group-modern m-0">
            <label>Instansi/Lembaga <span class="text-slate-400 fw-normal">(Opsional)</span></label>
            <div class="input-with-icon">
              <span class="input-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
              <input type="text" class="form-control" name="instansi" placeholder="Misal: Kampus / Dinas Terkait">
            </div>
          </div>
        </div>
      </div>

      <hr style="border-color: var(--slate-100); margin: 2.5rem 0;">

      <div class="form-group-modern">
        <label>Perihal Pengajuan <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="perihal" placeholder="Tuliskan intisari permohonan Anda" required style="padding-left:1.25rem;">
      </div>
      
      <div class="form-group-modern">
        <label>Deskripsi Kebutuhan <span class="text-danger">*</span></label>
        <textarea class="form-control" name="deskripsi" rows="5" placeholder="Jelaskan secara spesifik apa yang Anda butuhkan..." required></textarea>
      </div>

      <div class="form-group-modern mb-5">
        <label>Surat Pengantar / Dokumen Pendukung <span class="text-danger">*</span></label>
        <div class="file-upload-wrapper" onclick="document.getElementById('fileUpload').click()">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5" class="mb-3"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
          <h5 class="mb-1 fw-bold text-slate-800" id="fileNameDisplay">Klik / Tarik file ke sini</h5>
          <p class="text-slate-400 mb-0">Format: PDF, JPG, PNG (Maks 5MB)</p>
        </div>
        <input type="file" id="fileUpload" name="dokumen" class="d-none" accept=".pdf,.jpg,.jpeg,.png" required onchange="document.getElementById('fileNameDisplay').textContent = this.files[0]?.name || 'Klik / Tarik file ke sini'">
      </div>

      <div class="form-check mb-4">
        <input class="form-check-input" type="checkbox" value="" id="checkSetuju" required style="cursor:pointer;">
        <label class="form-check-label ms-2 text-slate-600" for="checkSetuju" style="cursor:pointer;">
          Saya menjamin kebenaran data ini dan menyetujui ketentuan yang berlaku di lingkungan Diskominfo.
        </label>
      </div>

      <button type="submit" class="btn-submit">
        Kirim Pengajuan
      </button>

    </form>
  </div>
</div>
@endsection
