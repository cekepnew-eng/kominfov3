<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bogor Smart City - Command Center</title>
    
    <!-- Fonts: Inter (Standar profesional industri) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Phosphor Icons: Ikon garis yang bersih -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style>
        :root {
            /* Palette Terang (Light Mode) - Enterprise Grade */
            --bg-body: #f8fafc; /* Latar belakang halaman abu-abu sangat terang */
            --bg-surface: #ffffff; /* Latar belakang kartu putih bersih */
            
            --border-light: #e2e8f0;
            --border-hover: #cbd5e1;
            
            --text-main: #0f172a; /* Hitam kebiruan untuk teks utama */
            --text-muted: #64748b; /* Abu-abu untuk teks deskripsi */
            
            --accent-primary: #2563eb; /* Biru utama */
            --accent-primary-bg: #eff6ff; /* Latar biru sangat muda */
            
            --accent-emerald: #059669;
            --accent-emerald-bg: #ecfdf5;
            
            --accent-amber: #d97706;
            --accent-amber-bg: #fffbeb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ══════════ HEADER ══════════ */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 3rem;
            background: var(--bg-surface);
            border-bottom: 1px solid var(--border-light);
            /* Bayangan super halus */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .header-brand img {
            height: 45px;
            width: auto;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-text h1 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.2px;
        }

        .brand-text span {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--accent-primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 2px;
        }

        .header-tools {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .status-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent-emerald-bg);
            border: 1px solid #d1fae5;
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--accent-emerald);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background-color: var(--accent-emerald);
            border-radius: 50%;
        }

        .clock-widget {
            text-align: right;
            border-left: 1px solid var(--border-light);
            padding-left: 2rem;
        }

        .clock-time {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--text-main);
            font-variant-numeric: tabular-nums;
        }

        .clock-date {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .btn-login {
            background: var(--bg-surface);
            color: var(--text-main);
            padding: 0.5rem 1.25rem;
            border: 1px solid var(--border-light);
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .btn-login:hover {
            background: #f1f5f9;
            border-color: var(--border-hover);
        }

        /* ══════════ MAIN CONTENT ══════════ */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            width: 100%;
        }

        /* Grid 5 Kolom */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1.5rem;
            width: 100%;
            max-width: 1500px;
            align-items: stretch;
        }

        /* Desain Kartu Profesional Tanpa Gambar/Kaca */
        .module-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            text-decoration: none;
            color: var(--text-main);
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        /* Garis atas (Top Border) sebagai aksen struktural */
        .module-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            height: 4px;
            background-color: transparent;
            border-radius: 12px 12px 0 0;
            transition: background-color 0.2s;
        }

        .module-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            border-color: var(--border-hover);
        }
        
        .module-card:hover::before {
            background-color: var(--accent-primary);
        }

        .icon-container {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: var(--accent-primary-bg);
            color: var(--accent-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            transition: transform 0.2s;
        }

        .icon-container i {
            font-size: 1.75rem;
        }

        .module-card:hover .icon-container {
            transform: scale(1.05);
        }

        .module-title {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            color: var(--text-main);
        }

        .module-desc {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1; /* Mendorong panah ke bawah */
        }

        /* ══════════ DAFTAR SUB-MENU CITY OPERATION ══════════ */
        .sub-module-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            width: 100%;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .sub-module-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-align: left;
            padding: 0.5rem 0.25rem;
        }

        .sub-module-item i {
            font-size: 1.25rem;
            color: var(--text-muted);
        }

        .sub-module-item span {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-main);
            line-height: 1.3;
        }

        /* Tombol Panah Fungsional */
        .action-arrow {
            margin-top: auto;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--bg-body);
            border: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            transition: all 0.2s;
        }

        .module-card:hover .action-arrow {
            background: var(--accent-primary);
            color: #ffffff;
            border-color: var(--accent-primary);
        }

        /* ══════════ FOOTER ══════════ */
        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.75rem;
            color: var(--text-muted);
            background: var(--bg-surface);
            border-top: 1px solid var(--border-light);
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .dashboard-grid { grid-template-columns: repeat(3, 1fr); }
            main { padding: 3rem 2rem; align-items: flex-start; }
        }
        
        @media (max-width: 900px) {
            .dashboard-grid { grid-template-columns: repeat(2, 1fr); }
            .header-tools { display: none; }
            header { justify-content: center; }
        }

        @media (max-width: 600px) {
            .dashboard-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Professional Dashboard Header -->
    <header>
        <div class="header-brand">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Lambang_Kota_Bogor.png/431px-Lambang_Kota_Bogor.png" alt="Logo">
            <div class="brand-text">
                <h1>Bogor Command Center</h1>
                <span>Pemerintah Kota Bogor</span>
            </div>
        </div>
        
        <div class="header-tools">
            <div class="status-badge">
                <div class="status-dot"></div>
                System Online
            </div>
            
            <div class="clock-widget">
                <div class="clock-time" id="current-time">00:00:00</div>
                <div class="clock-date" id="current-date">Memuat...</div>
            </div>

            <a href="#" class="btn-login">
                <i class="ph-bold ph-sign-in"></i> Admin Login
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Standard 5 Column Horizontal Grid -->
        <div class="dashboard-grid">
            
            <!-- 1. Data & Statistic -->
            <a href="#" class="module-card">
                <div class="icon-container">
                    <i class="ph ph-chart-line-up"></i>
                </div>
                <h3 class="module-title">Data & Statistic Bogor</h3>
                <p class="module-desc">Monitoring statistik kota, data penduduk, ekonomi, dan metrik layanan publik.</p>
                <div class="action-arrow">
                    <i class="ph-bold ph-arrow-right"></i>
                </div>
            </a>

            <!-- 2. Geo Spasial -->
            <a href="#" class="module-card">
                <div class="icon-container" style="background: var(--accent-emerald-bg); color: var(--accent-emerald);">
                    <i class="ph ph-map-trifold"></i>
                </div>
                <h3 class="module-title">Geo Spasial Bogor</h3>
                <p class="module-desc">Menampilkan data peta digital, GIS, dan analisis tata ruang Kota Bogor.</p>
                <div class="action-arrow">
                    <i class="ph-bold ph-arrow-right"></i>
                </div>
            </a>

            <!-- 3. Call Center -->
            <a href="#" class="module-card">
                <div class="icon-container" style="background: #f3e8ff; color: #9333ea;">
                    <i class="ph ph-headset"></i>
                </div>
                <h3 class="module-title">Call Center</h3>
                <p class="module-desc">Dashboard pemantauan layanan pengaduan masyarakat dan pelayanan terpadu.</p>
                <div class="action-arrow">
                    <i class="ph-bold ph-arrow-right"></i>
                </div>
            </a>

            <!-- 4. City Operation (Vertical List for narrow column) -->
            <a href="#" class="module-card">
                <div class="icon-container" style="background: var(--accent-amber-bg); color: var(--accent-amber);">
                    <i class="ph ph-buildings"></i>
                </div>
                <h3 class="module-title">City Operation</h3>
                <p class="module-desc" style="margin-bottom: 1rem;">Pemantauan operasional kota terpusat secara langsung.</p>
                
                <div class="sub-module-list">
                    <div class="sub-module-item">
                        <i class="ph-fill ph-car-profile"></i>
                        <span>Transportation & Traffic</span>
                    </div>
                    <div class="sub-module-item">
                        <i class="ph-fill ph-recycle"></i>
                        <span>Bogor Smart Waste</span>
                    </div>
                    <div class="sub-module-item">
                        <i class="ph-fill ph-drop"></i>
                        <span>Drinking Water System</span>
                    </div>
                    <div class="sub-module-item">
                        <i class="ph-fill ph-blueprint"></i>
                        <span>Infrastructure Planning</span>
                    </div>
                </div>

                <div class="action-arrow">
                    <i class="ph-bold ph-arrow-right"></i>
                </div>
            </a>

            <!-- 5. Monitoring & Surveillance -->
            <a href="#" class="module-card">
                <div class="icon-container" style="background: #fee2e2; color: #dc2626;">
                    <i class="ph ph-video-camera"></i>
                </div>
                <h3 class="module-title">Monitoring & Surveillance</h3>
                <p class="module-desc">Akses pantauan CCTV keamanan kota dan operasional surveillance center.</p>
                <div class="action-arrow">
                    <i class="ph-bold ph-arrow-right"></i>
                </div>
            </a>

        </div>
    </main>

    <footer>
        &copy; <span id="year"></span> Dinas Komunikasi dan Informatika Kota Bogor
    </footer>

    <script>
        // Update Time & Date
        function updateDateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            
            const timeEl = document.getElementById('current-time');
            if(timeEl) {
                // Keep tabular format stable
                timeEl.textContent = `${hours}:${minutes}:${seconds}`;
            }
            
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const dateEl = document.getElementById('current-date');
            if(dateEl) {
                dateEl.textContent = `${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            }
        }
        
        setInterval(updateDateTime, 1000);
        updateDateTime();
        
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>
