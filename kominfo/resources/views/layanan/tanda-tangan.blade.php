@extends('layouts.layanan')

@section('title', 'Verifikasi Dokumen PDF')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Reset & Base Fonts */
    .cekdokumen-wrapper {
        font-family: 'Nunito', sans-serif;
        color: #1e293b;
        background: linear-gradient(180deg, #fffbeb 0%, #ffffff 40%, #ffffff 100%);
        min-height: 100vh;
        padding-bottom: 4rem;
        margin-top: -2rem; 
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
        width: 100%;
        max-width: 1200px;
        text-align: center;
        padding: 4rem 1rem 2rem 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .brand-logo {
        font-size: 2.5rem;
        font-weight: 900;
        color: #0f172a;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
        font-style: italic;
    }

    .brand-logo span {
        color: #eab308;
    }

    .brand-subtitle {
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
    }

    /* Upload Bar */
    .upload-bar {
        background: #facc15;
        border-radius: 50px;
        padding: 0.5rem 0.5rem 0.5rem 2.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        max-width: 650px;
        box-shadow: 0 10px 25px rgba(250, 204, 21, 0.3);
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 2px solid transparent;
        position: relative;
    }

    .upload-bar:hover, .upload-bar.dragover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(250, 204, 21, 0.4);
        border-color: #ca8a04;
    }

    .upload-bar-text {
        font-weight: 700;
        color: #422006;
        font-size: 0.95rem;
    }

    .upload-bar-btn {
        background: #0f172a;
        color: #facc15;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 40px;
        font-weight: 800;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .upload-bar-btn:hover {
        background: #1e293b;
    }

    /* Trust Badges */
    .trust-badges {
        display: flex;
        gap: 2.5rem;
        margin-top: 1.5rem;
        font-size: 0.85rem;
        font-weight: 700;
        color: #475569;
    }

    .trust-badges span i {
        color: #eab308;
        margin-right: 6px;
    }

    /* --- NEW RESULT UI CSS --- */
    #resultContainer {
        width: 100%;
        max-width: 1200px;
        margin-top: 1rem;
        display: none;
        text-align: left;
    }

    .alert-success-modern {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-error-modern {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-icon-modern {
        width: 55px;
        height: 55px;
        background: #10b981;
        border-radius: 50%;
        color: white;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .alert-error-modern .alert-icon-modern {
        background: #ef4444;
    }

    .alert-content-modern h3 {
        margin: 0 0 0.25rem 0;
        font-weight: 800;
        color: #064e3b;
        font-size: 1.25rem;
    }
    .alert-error-modern .alert-content-modern h3 { color: #7f1d1d; }

    .alert-content-modern p {
        margin: 0;
        color: #047857;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }
    .alert-error-modern .alert-content-modern p { color: #991b1b; }

    .alert-content-modern p span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .divider-modern {
        display: flex;
        align-items: center;
        margin: 2rem 0;
    }

    .divider-modern::before, .divider-modern::after {
        content: '';
        flex: 1;
        border-bottom: 2px solid #fef08a;
    }

    .divider-modern span {
        padding: 0.35rem 1.5rem;
        background: #fff;
        border: 2px solid #fef08a;
        border-radius: 20px;
        color: #ca8a04;
        font-weight: 800;
        font-size: 0.85rem;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .summary-card {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .summary-card-header {
        background: #f8fafc;
        padding: 0.85rem 1.25rem;
        font-weight: 800;
        color: #0f172a;
        font-size: 0.8rem;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-transform: uppercase;
    }

    .summary-card-header i { margin-right: 6px; color: #64748b; }

    .btn-lihat-dokumen {
        background: white;
        border: 1px solid #cbd5e1;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        color: #334155;
        cursor: pointer;
    }

    .summary-card-body {
        padding: 1.25rem;
        flex: 1;
    }

    .circle-badge {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 0.9rem;
        flex-shrink: 0;
    }
    .bg-green { background: #10b981; }
    .bg-red { background: #ef4444; }

    .info-doc-row {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 1.25rem;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.85rem;
    }
    .info-doc-row:last-child { border-bottom: none; }
    .info-doc-label { color: #64748b; font-weight: 600; }
    .info-doc-val { color: #0f172a; font-weight: 800; text-align: right; }
    .text-truncate-custom { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 140px; display: inline-block; vertical-align: bottom; }

    .signer-card {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        overflow: hidden;
    }

    .signer-card-body {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1.25rem;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .signer-col {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #475569;
    }

    .signer-col i { color: #94a3b8; }

    .user-col .circle-badge { width: 36px; height: 36px; }
    .badge-tt {
        background: #eff6ff;
        color: #3b82f6;
        border: 1px solid #bfdbfe;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 0.7rem;
        margin-left: 8px;
        font-weight: 800;
    }

    .btn-lihat-detil {
        background: white;
        border: 1px solid #cbd5e1;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 800;
        color: #334155;
        cursor: pointer;
        margin-left: 1rem;
    }

    .btn-reset {
        background: #facc15;
        color: #422006;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 40px;
        font-weight: 800;
        cursor: pointer;
        display: block;
        margin: 2rem auto 0 auto;
        box-shadow: 0 4px 10px rgba(250, 204, 21, 0.3);
        transition: background 0.2s;
    }
    .btn-reset:hover { background: #eab308; }


    /* PSrE Section */
    .psre-section {
        width: 100%;
        max-width: 900px;
        margin-top: 4rem; 
        padding-top: 2rem;
    }

    .psre-divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #94a3b8;
        font-weight: 800;
        font-size: 0.75rem;
        letter-spacing: 1px;
        margin-bottom: 2rem;
    }

    .psre-divider::before, .psre-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #fde047;
    }

    .psre-divider span {
        padding: 0 1rem;
    }

    .psre-logos {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .psre-badge {
        background: white;
        border: 1px solid #e2e8f0;
        color: #475569;
        font-weight: 800;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
    }

    /* 3 Langkah Section */
    .steps-section {
        width: 100%;
        background: #f8fafc;
        padding: 4rem 1rem;
        margin-top: 4rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .steps-title {
        font-weight: 900;
        font-size: 1.5rem;
        color: #0f172a;
        margin-bottom: 3rem;
    }

    .steps-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        max-width: 1000px;
        width: 100%;
    }

    .step-card {
        background: white;
        border: 2px solid #fefce8;
        border-radius: 16px;
        padding: 2rem 1.5rem;
        text-align: center;
        flex: 1;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }

    .step-icon {
        width: 50px;
        height: 50px;
        background: #facc15;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: #422006;
        margin: 0 auto 1rem auto;
    }

    .step-card h4 {
        font-weight: 800;
        color: #0f172a;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .step-card p {
        color: #64748b;
        font-size: 0.85rem;
        line-height: 1.5;
        margin: 0;
    }

    .step-arrow {
        color: #facc15;
        font-size: 1.25rem;
        background: #fefce8;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    @media (max-width: 992px) {
        .summary-grid { grid-template-columns: 1fr; }
        .signer-card-body { flex-direction: column; align-items: flex-start; }
        .btn-lihat-detil { margin-left: 0; margin-top: 10px; }
    }

    @media (max-width: 768px) {
        .steps-wrapper {
            flex-direction: column;
            gap: 2rem;
        }
        .step-arrow {
            transform: rotate(90deg);
        }
        .upload-bar {
            flex-direction: column;
            border-radius: 20px;
            padding: 1.5rem;
            gap: 1rem;
        }
        .upload-bar-btn {
            width: 100%;
        }
        .alert-success-modern, .alert-error-modern {
            flex-direction: column;
            text-align: center;
        }
        .alert-content-modern p { justify-content: center; }
    }
</style>
@endsection

@section('content')
<div class="cekdokumen-wrapper">
    
    <!-- Hero Section -->
    <div class="hero-section">
        <h1 class="brand-logo">Cek<span>Dokumen</span>.id</h1>
        <p class="brand-subtitle">Verifikasi tanda tangan digital PDF kamu.</p>

        <!-- Upload Bar -->
        <div class="upload-bar" id="uploadArea">
            <div class="upload-bar-text">
                Pilih atau Drag & Drop PDF kamu (max 5 PDF)
            </div>
            <button class="upload-bar-btn" id="btnBrowse">
                + Pilih File
            </button>
            <form id="verifyForm" style="display:none;">
                <input type="file" id="pdfFileInput" name="documents[]" accept="application/pdf" multiple>
            </form>
        </div>

        <!-- Trust Badges -->
        <div class="trust-badges" id="trustBadges">
            <span><i class="fas fa-check"></i> Gratis</span>
            <span><i class="fas fa-shield-alt"></i> 100% Terpercaya</span>
            <span><i class="fas fa-bolt"></i> Instan</span>
        </div>

        <!-- Result Container -->
        <div id="resultContainer"></div>
    </div>

    <!-- PSrE Logos Area -->
    <div class="psre-section" id="psreSection">
        <div class="psre-divider">
            <span>DIDUKUNG OLEH PSrE RESMI INDONESIA</span>
        </div>
        <div class="psre-logos">
            <div class="psre-badge"><span style="color:#d32f2f; font-weight:900;">B</span>SrE</div>
            <div class="psre-badge"><span style="color:#2e7d32; font-weight:900;">V</span>IDA</div>
            <div class="psre-badge"><span style="color:#1565c0; font-weight:900;">P</span>rivyID</div>
            <div class="psre-badge"><span style="color:#f57c00; font-weight:900;">P</span>eruri</div>
            <div class="psre-badge"><span style="color:#0284c7; font-weight:900;">D</span>igiSign</div>
        </div>
    </div>

    <!-- 3 Langkah -->
    <div class="steps-section" id="stepsSection">
        <h2 class="steps-title">Verifikasi dalam 3 langkah mudah</h2>
        <div class="steps-wrapper">
            <div class="step-card">
                <div class="step-icon"><i class="fas fa-upload"></i></div>
                <h4>Upload PDF</h4>
                <p>Pilih file PDF yang ingin kamu verifikasi dari perangkatmu.</p>
            </div>
            <div class="step-arrow"><i class="fas fa-chevron-right"></i></div>
            <div class="step-card">
                <div class="step-icon"><i class="fas fa-shield-alt"></i></div>
                <h4>Verifikasi Otomatis</h4>
                <p>Sistem akan memeriksa tanda tangan digital, sertifikat, dan integritas dokumen kamu.</p>
            </div>
            <div class="step-arrow"><i class="fas fa-chevron-right"></i></div>
            <div class="step-card">
                <div class="step-icon"><i class="fas fa-file-signature"></i></div>
                <h4>Hasil Instan</h4>
                <p>Lihat hasil verifikasi lengkap — siapa yang menandatangani dan apakah valid.</p>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('pdfFileInput');
        const btnBrowse = document.getElementById('btnBrowse');
        const resultContainer = document.getElementById('resultContainer');
        const trustBadges = document.getElementById('trustBadges');
        
        const verifyRoute = '{{ route("layanan.tanda-tangan.verify") }}';
        const csrfToken = '{{ csrf_token() }}';

        btnBrowse.addEventListener('click', (e) => {
            e.stopPropagation();
            fileInput.click();
        });
        
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Drag and drop mechanics
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => uploadArea.classList.add('dragover'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => uploadArea.classList.remove('dragover'), false);
        });

        uploadArea.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            if(dt.files.length > 0) {
                fileInput.files = dt.files;
                processFiles(dt.files);
            }
        }, false);

        fileInput.addEventListener('change', function() {
            if(this.files.length > 0) {
                processFiles(this.files);
            }
        });

        function processFiles(files) {
            if(files.length > 5) {
                Swal.fire({ icon: 'warning', title: 'Maksimal 5 File', text: 'Hanya bisa memproses hingga 5 file PDF sekaligus.', confirmButtonColor: '#0f172a' });
                fileInput.value = '';
                return;
            }

            let formData = new FormData();
            formData.append('_token', csrfToken);
            let valid = true;

            for(let i=0; i<files.length; i++) {
                if(files[i].type !== 'application/pdf') {
                    valid = false; break;
                }
                formData.append('documents[]', files[i]);
            }

            if(!valid) {
                Swal.fire({ icon: 'error', title: 'Format Tidak Sesuai', text: 'Pastikan semua file yang diunggah berformat PDF.', confirmButtonColor: '#0f172a' });
                fileInput.value = '';
                return;
            }

            Swal.fire({
                title: 'Sedang Memverifikasi...',
                html: 'Mohon tunggu sebentar...',
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading(); }
            });

            fetch(verifyRoute, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: formData
            })
            .then(async response => {
                if(!response.ok) {
                    const errText = await response.text();
                    let errJson;
                    try { errJson = JSON.parse(errText); } catch(e) { throw new Error('Terjadi kesalahan koneksi.'); }
                    if(response.status === 422 && errJson.errors) {
                        throw new Error(Object.values(errJson.errors).flat().join('\n'));
                    }
                    throw new Error(errJson.message || 'Verifikasi Gagal.');
                }
                return response.json();
            })
            .then(data => {
                Swal.close();
                if(data.success && data.data) {
                    showResults(data.data);
                } else {
                    throw new Error(data.message || 'Respons API tidak valid.');
                }
            })
            .catch(error => {
                console.error(error);
                Swal.fire({ icon: 'error', title: 'Gagal', text: error.message, confirmButtonColor: '#0f172a' });
            })
            .finally(() => {
                fileInput.value = '';
            });
        }

        function showResults(results) {
            uploadArea.style.display = 'none';
            trustBadges.style.display = 'none';
            resultContainer.innerHTML = '';
            resultContainer.style.display = 'block';

            results.forEach(item => {
                const sizeKb = (item.file_size / 1024).toFixed(1);
                
                let cardHtml = `
                <div style="margin-bottom: 4rem;">
                    <!-- Success/Error Banner -->
                    <div class="${item.is_valid ? 'alert-success-modern' : 'alert-error-modern'}">
                        <div class="alert-icon-modern">
                            <i class="fas ${item.is_valid ? 'fa-shield-alt' : 'fa-times-circle'}"></i>
                        </div>
                        <div class="alert-content-modern">
                            <h3>${item.is_valid ? 'Dokumen ini memiliki Tanda Tangan Digital' : 'Dokumen Tidak Valid / Tidak Bertanda Tangan'}</h3>
                            <p>
                                <span><i class="fas ${item.is_valid ? 'fa-check-circle' : 'fa-times-circle'}"></i> ${item.is_valid ? 'Dokumen belum dimodifikasi' : item.message}</span>
                                ${item.is_valid ? '<span><i class="fas fa-check-circle"></i> 1 tanda tangan ditemukan</span>' : ''}
                            </p>
                        </div>
                    </div>

                    <!-- Ringkasan Dokumen -->
                    <div class="divider-modern">
                        <span>Ringkasan Dokumen</span>
                    </div>

                    <div class="summary-grid">
                        <!-- Informasi Tanda Tangan -->
                        <div class="summary-card">
                            <div class="summary-card-header">
                                <span><i class="far fa-user"></i> INFORMASI TANDA TANGAN</span>
                            </div>
                            <div class="summary-card-body d-flex align-items-center gap-3">
                                <div class="circle-badge ${item.is_valid ? 'bg-green' : 'bg-red'}">${item.is_valid ? '1' : '0'}</div>
                                <span style="font-weight: 800; color: #1e293b; font-size: 0.9rem;">
                                    ${item.is_valid ? 'Tanda tangan dengan identitas terverifikasi' : 'Tidak ada tanda tangan yang valid'}
                                </span>
                            </div>
                        </div>

                        <!-- Informasi PSrE -->
                        <div class="summary-card">
                            <div class="summary-card-header">
                                <span><i class="fas fa-shield-alt"></i> INFORMASI PSrE</span>
                            </div>
                            <div class="summary-card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas ${item.is_valid ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'} me-2"></i> 
                                    <span style="font-weight: 800; color: #1e293b; font-size: 0.9rem;">
                                        ${item.is_valid ? 'Badan Siber dan Sandi Negara' : '-'}
                                    </span>
                                </div>
                                <span style="font-weight: 900; font-size: 1.25rem; color: #0f172a;">${item.is_valid ? '1' : '0'}</span>
                            </div>
                        </div>

                        <!-- Informasi Dokumen -->
                        <div class="summary-card">
                            <div class="summary-card-header">
                                <span><i class="far fa-file-alt"></i> INFORMASI DOKUMEN</span>
                                <button class="btn-lihat-dokumen">Lihat Dokumen</button>
                            </div>
                            <div class="summary-card-body" style="padding: 0;">
                                <div class="info-doc-row">
                                    <span class="info-doc-label">Nama File</span>
                                    <span class="info-doc-val text-truncate-custom" title="${item.filename}">${item.filename}</span>
                                </div>
                                <div class="info-doc-row">
                                    <span class="info-doc-label">Ukuran</span>
                                    <span class="info-doc-val">${sizeKb} KB</span>
                                </div>
                                <div class="info-doc-row">
                                    <span class="info-doc-label">Halaman</span>
                                    <span class="info-doc-val">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Penandatangan -->
                    <div class="divider-modern" style="${item.is_valid ? '' : 'display:none;'}">
                        <span>Informasi Penandatangan</span>
                    </div>
                    
                    <div class="signer-card" style="${item.is_valid ? '' : 'display:none;'}">
                        <div class="summary-card-header">
                            <span><i class="far fa-user"></i> PENANDATANGAN</span>
                        </div>
                        <div class="signer-card-body">
                            <div class="signer-col user-col">
                                <div class="circle-badge bg-green"><i class="fas fa-user"></i></div>
                                <div>
                                    <div style="font-weight: 900; color: #0f172a; font-size: 0.95rem;">
                                        ${item.signer} <span class="badge-tt">Tanda Tangan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="signer-col">
                                <i class="far fa-calendar-alt"></i> Saat ini
                            </div>
                            <div class="signer-col">
                                <i class="far fa-building"></i> Instansi Pemerintah
                            </div>
                            <div class="signer-col status-col">
                                <i class="fas fa-check-circle text-success"></i> BSrE
                                <button class="btn-lihat-detil">Lihat Detil</button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                resultContainer.innerHTML += cardHtml;
            });

            const resetBtnHtml = `
                <div style="text-align: center; margin-top: 1rem;">
                    <button class="btn-reset" id="btnReset">
                        <i class="far fa-file-pdf"></i> Verifikasi Dokumen Lain
                    </button>
                </div>
            `;
            resultContainer.innerHTML += resetBtnHtml;

            document.getElementById('btnReset').addEventListener('click', () => {
                resultContainer.style.display = 'none';
                uploadArea.style.display = 'flex';
                trustBadges.style.display = 'flex';
                resultContainer.innerHTML = '';
            });
        }
    });
</script>
@endsection
