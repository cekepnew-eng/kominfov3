@extends('layouts.layanan')

@section('title', 'Survei Kepuasan Masyarakat')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .survey-wrapper {
        font-family: 'Outfit', sans-serif;
        background: #f1f5f9;
        min-height: 100vh;
        padding-top: 5rem;
        padding-bottom: 6rem;
        position: relative;
        overflow: hidden;
    }

    /* Animated Mesh Background */
    .survey-wrapper::before, .survey-wrapper::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        z-index: 0;
        animation: floatBlob 15s infinite alternate ease-in-out;
    }

    .survey-wrapper::before {
        top: -10%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: rgba(56, 189, 248, 0.25);
    }
    
    .survey-wrapper::after {
        bottom: -20%;
        right: -10%;
        width: 700px;
        height: 700px;
        background: rgba(52, 211, 153, 0.2);
        animation-delay: -5s;
    }

    @keyframes floatBlob {
        0% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(50px, 30px) scale(1.05); }
        100% { transform: translate(-30px, -50px) scale(0.95); }
    }

    .survey-header-top {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
        z-index: 1;
    }

    .survey-header-top .badge-premium {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.8);
        color: #0284c7;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 800;
        font-size: 0.85rem;
        margin-bottom: 1.5rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        box-shadow: 0 4px 15px rgba(2, 132, 199, 0.05);
    }

    .survey-header-top h1 {
        font-weight: 900;
        font-size: 3.5rem;
        color: #0f172a;
        margin-bottom: 1rem;
        line-height: 1.1;
        letter-spacing: -1px;
    }
    
    .survey-header-top h1 span {
        background: linear-gradient(135deg, #0284c7, #38bdf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .survey-header-top p {
        color: #475569;
        font-size: 1.15rem;
        max-width: 650px;
        margin: 0 auto;
        font-weight: 400;
    }

    /* Layout Grid */
    .survey-grid {
        display: grid;
        grid-template-columns: 1.3fr 0.9fr;
        gap: 3rem;
        max-width: 1280px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
        align-items: start;
    }

    /* FORM CARD - Glassmorphism */
    .form-card-premium {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        border-radius: 28px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.08);
        border: 1px solid rgba(255, 255, 255, 1);
        overflow: hidden;
    }

    .form-card-header {
        background: rgba(255, 255, 255, 0.5);
        padding: 2.5rem 3rem 1.5rem 3rem;
        border-bottom: 1px solid rgba(226, 232, 240, 0.6);
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .form-card-header .icon-box {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, #e0f2fe, #bae6fd);
        color: #0284c7;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        box-shadow: inset 0 2px 4px rgba(255,255,255,0.8);
    }

    .form-card-header h2 {
        color: #0f172a;
        font-weight: 900;
        font-size: 1.5rem;
        margin: 0;
    }

    .form-card-body {
        padding: 2rem 3rem 3rem 3rem;
    }

    .form-group-custom {
        margin-bottom: 2.5rem;
    }

    .form-label-custom {
        font-weight: 800;
        color: #1e293b;
        font-size: 1.1rem;
        margin-bottom: 1.25rem;
        display: block;
        line-height: 1.4;
    }

    /* Emoji Ratings - Pill Style */
    .rating-container {
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    .rating-option { flex: 1; }
    .rating-option input[type="radio"] { display: none; }

    .rating-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.25rem 0.5rem;
        background: rgba(255, 255, 255, 0.5);
        border: 2px solid rgba(226, 232, 240, 0.8);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .rating-emoji {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        filter: grayscale(100%) opacity(0.4);
    }

    .rating-text {
        font-size: 0.85rem;
        font-weight: 800;
        color: #94a3b8;
        text-align: center;
        transition: color 0.3s;
    }

    .rating-option input[type="radio"]:checked + .rating-label {
        background: #ffffff;
        border-color: #38bdf8;
        box-shadow: 0 10px 25px -5px rgba(56, 189, 248, 0.25);
    }

    .rating-option input[type="radio"]:checked + .rating-label .rating-emoji {
        filter: grayscale(0%) opacity(1);
        transform: scale(1.25) translateY(-5px);
    }

    .rating-option input[type="radio"]:checked + .rating-label .rating-text {
        color: #0284c7;
    }

    .rating-label:hover {
        background: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
    }
    
    .rating-label:hover .rating-emoji {
        filter: grayscale(30%) opacity(0.8);
    }

    /* Inputs */
    .input-custom {
        width: 100%;
        padding: 1.25rem 1.5rem;
        background: rgba(255, 255, 255, 0.6);
        border: 1px solid rgba(203, 213, 225, 0.8);
        border-radius: 16px;
        font-family: inherit;
        font-size: 1.05rem;
        color: #334155;
        transition: all 0.3s ease;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.01);
    }

    .input-custom:focus {
        outline: none;
        background: #ffffff;
        border-color: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.15), inset 0 2px 4px rgba(0,0,0,0.01);
    }

    textarea.input-custom {
        resize: vertical;
        min-height: 120px;
    }

    /* Gradient Shine Button */
    .btn-survey {
        width: 100%;
        padding: 1.25rem;
        background: linear-gradient(135deg, #0284c7, #38bdf8);
        color: #ffffff;
        border: none;
        border-radius: 16px;
        font-size: 1.15rem;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        box-shadow: 0 10px 25px rgba(2, 132, 199, 0.4);
        position: relative;
        overflow: hidden;
    }

    .btn-survey::after {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 50%; height: 100%;
        background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
        transform: skewX(-20deg);
        transition: all 0.6s ease;
    }

    .btn-survey:hover::after {
        left: 150%;
    }

    .btn-survey:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(2, 132, 199, 0.5);
    }

    .btn-survey i {
        transition: transform 0.3s ease;
    }

    .btn-survey:hover i {
        transform: translateX(6px);
    }

    /* COMMENTS SECTION - Masonry/Stack style */
    .comments-section {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        position: relative;
    }

    .comments-header {
        margin-bottom: 1rem;
    }

    .comments-header h3 {
        font-weight: 900;
        color: #0f172a;
        font-size: 1.75rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .comments-header p {
        color: #64748b;
        font-size: 1rem;
        font-weight: 500;
    }

    /* Animated floating effect for comments */
    .comment-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(15px);
        border-radius: 24px;
        padding: 1.75rem;
        box-shadow: 0 10px 30px -15px rgba(0,0,0,0.05);
        border: 1px solid rgba(255, 255, 255, 1);
        position: relative;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 1;
    }

    .comment-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1);
        z-index: 2;
        background: rgba(255, 255, 255, 0.95);
    }

    .comment-card::before {
        content: '\f10d';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 2.5rem;
        color: rgba(2, 132, 199, 0.05);
        z-index: 0;
        transition: color 0.3s;
    }
    
    .comment-card:hover::before {
        color: rgba(2, 132, 199, 0.1);
    }

    .comment-user {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 1.25rem;
        position: relative;
        z-index: 1;
    }

    .user-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.5rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        border: 2px solid #fff;
    }

    .user-info h4 {
        margin: 0 0 2px 0;
        font-weight: 800;
        color: #0f172a;
        font-size: 1.1rem;
    }
    
    .user-info .stars {
        color: #fbbf24;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .comment-text {
        color: #334155;
        font-size: 1rem;
        line-height: 1.7;
        margin: 0;
        position: relative;
        z-index: 1;
        font-weight: 500;
    }
    
    .comment-date {
        font-size: 0.8rem;
        font-weight: 700;
        color: #94a3b8;
        margin-top: 1.25rem;
        display: inline-block;
        background: #f1f5f9;
        padding: 4px 12px;
        border-radius: 12px;
    }

    @media (max-width: 992px) {
        .survey-grid {
            grid-template-columns: 1fr;
            gap: 4rem;
        }
        .survey-header-top h1 { font-size: 2.75rem; }
    }

    @media (max-width: 768px) {
        .rating-container { flex-wrap: wrap; }
        .rating-option { flex: 0 0 calc(33.333% - 10px); }
        .form-card-body { padding: 2rem 1.5rem; }
        .form-card-header { padding: 1.5rem; }
    }
    
    @media (max-width: 480px) {
        .rating-option { flex: 0 0 calc(50% - 7.5px); }
    }
</style>
@endsection

@section('content')
<div class="survey-wrapper">
    <div class="container">
        
        <div class="survey-header-top" data-aos="fade-down">
            <span class="badge-premium"><i class="fas fa-star text-warning"></i> Suara Anda Berarti</span>
            <h1>Survei <span>Kepuasan</span> Masyarakat</h1>
            <p>Bantu kami membangun layanan digital yang lebih baik untuk Kota Bogor dengan membagikan pengalaman Anda.</p>
        </div>

        <div class="survey-grid">
            <!-- LEFT: FORM -->
            <div class="form-column" data-aos="fade-right">
                <div class="form-card-premium">
                    <div class="form-card-header">
                        <div class="icon-box"><i class="fas fa-pen-nib"></i></div>
                        <h2>Formulir Penilaian</h2>
                    </div>
                    
                    <div class="form-card-body">
                        @if(session('success'))
                            <div class="survey-success mb-4 p-4" style="background:rgba(236, 253, 245, 0.8); backdrop-filter:blur(10px); border:1px solid #6ee7b7; border-radius:20px; color:#064e3b; text-align:center; box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);">
                                <i class="fas fa-check-circle" style="font-size:2.5rem; color:#10b981; margin-bottom:10px;"></i>
                                <h4 style="font-weight:900; margin:0;">Terima Kasih!</h4>
                                <p style="margin:0; font-size:1rem; font-weight:500;">{{ session('success') }}</p>
                            </div>
                        @endif

                        <form action="{{ route('layanan.survei.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group-custom">
                                <label class="form-label-custom">1. Seberapa puas Anda dengan tampilan & kemudahan navigasi website?</label>
                                <div class="rating-container">
                                    <label class="rating-option">
                                        <input type="radio" name="rating_tampilan" value="Sangat Buruk" required>
                                        <div class="rating-label">
                                            <span class="rating-emoji">😞</span>
                                            <span class="rating-text">Sangat Buruk</span>
                                        </div>
                                    </label>
                                    <label class="rating-option">
                                        <input type="radio" name="rating_tampilan" value="Buruk">
                                        <div class="rating-label">
                                            <span class="rating-emoji">🙁</span>
                                            <span class="rating-text">Buruk</span>
                                        </div>
                                    </label>
                                    <label class="rating-option">
                                        <input type="radio" name="rating_tampilan" value="Cukup">
                                        <div class="rating-label">
                                            <span class="rating-emoji">😐</span>
                                            <span class="rating-text">Cukup</span>
                                        </div>
                                    </label>
                                    <label class="rating-option">
                                        <input type="radio" name="rating_tampilan" value="Puas">
                                        <div class="rating-label">
                                            <span class="rating-emoji">🙂</span>
                                            <span class="rating-text">Puas</span>
                                        </div>
                                    </label>
                                    <label class="rating-option">
                                        <input type="radio" name="rating_tampilan" value="Sangat Puas">
                                        <div class="rating-label">
                                            <span class="rating-emoji">😍</span>
                                            <span class="rating-text">Sangat Puas</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group-custom">
                                <label class="form-label-custom">2. Apakah informasi yang Anda cari mudah ditemukan?</label>
                                <div class="rating-container" style="justify-content: flex-start; gap: 1rem;">
                                    <label class="rating-option" style="flex: 0 1 200px;">
                                        <input type="radio" name="mudah_ditemukan" value="Ya" required>
                                        <div class="rating-label" style="padding: 1rem; flex-direction:row; gap:12px;">
                                            <span class="rating-emoji" style="font-size:1.6rem; margin:0; filter:none;">👍</span>
                                            <span class="rating-text" style="font-size: 1.05rem;">Ya, Mudah</span>
                                        </div>
                                    </label>
                                    <label class="rating-option" style="flex: 0 1 200px;">
                                        <input type="radio" name="mudah_ditemukan" value="Tidak">
                                        <div class="rating-label" style="padding: 1rem; flex-direction:row; gap:12px;">
                                            <span class="rating-emoji" style="font-size:1.6rem; margin:0; filter:none;">👎</span>
                                            <span class="rating-text" style="font-size: 1.05rem;">Tidak</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group-custom">
                                <label class="form-label-custom" for="saran">3. Kritik, Saran, atau Testimoni Anda</label>
                                <textarea class="input-custom" id="saran" name="saran" placeholder="Bagikan pengalaman Anda... Komentar terpilih akan ditampilkan di halaman ini! (Opsional)"></textarea>
                            </div>

                            <div class="form-group-custom">
                                <label class="form-label-custom" for="nama">Nama Anda (Opsional)</label>
                                <input type="text" class="input-custom" id="nama" name="nama" placeholder="Contoh: Budi Santoso">
                            </div>

                            <button type="submit" class="btn-survey">
                                Kirim Penilaian <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- RIGHT: COMMENTS / TESTIMONIALS -->
            <div class="comments-section" data-aos="fade-left" data-aos-delay="200">
                <div class="comments-header">
                    <h3><i class="fas fa-heart text-danger"></i> Apa Kata Mereka?</h3>
                    <p>Testimoni asli dari masyarakat yang telah menggunakan layanan portal kami.</p>
                </div>

                <!-- Comment 1 -->
                <div class="comment-card">
                    <div class="comment-user">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">A</div>
                        <div class="user-info">
                            <h4>Andi Pratama</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="comment-text">"Sangat membantu! Tampilan websitenya bersih, modern, dan loadingnya juga cepat. Informasi soal perizinan penelitian jadi gampang banget dicari tanpa harus datang langsung."</p>
                    <span class="comment-date"><i class="far fa-clock"></i> 2 hari yang lalu</span>
                </div>

                <!-- Comment 2 -->
                <div class="comment-card">
                    <div class="comment-user">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #10b981, #34d399);">S</div>
                        <div class="user-info">
                            <h4>Siti Nurhaliza</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="comment-text">"Keren banget Diskominfo Bogor. Layanan digitalnya sudah terintegrasi dan responsif di HP. Sedikit saran, moga ada fitur live chat ke depannya biar makin interaktif."</p>
                    <span class="comment-date"><i class="far fa-clock"></i> 5 hari yang lalu</span>
                </div>

                <!-- Comment 3 -->
                <div class="comment-card">
                    <div class="comment-user">
                        <div class="user-avatar" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">D</div>
                        <div class="user-info">
                            <h4>Dimas Anggara</h4>
                            <div class="stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="comment-text">"Baru pertama kali nyoba fitur verifikasi PDF untuk tanda tangan digital. Hasilnya sangat praktis dan instan. Maju terus smart city Bogor, pelayanannya memuaskan!"</p>
                    <span class="comment-date"><i class="far fa-clock"></i> 1 minggu yang lalu</span>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
