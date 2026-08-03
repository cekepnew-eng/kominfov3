<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Layanan Diskominfo Kota Bogor</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <style>
        /* ═══════════ DESIGN TOKENS (LIGHT THEME) ═══════════ */
        :root {
            --bg-color: #f8fafc;
            --surface-color: #ffffff;
            --surface-hover: #ffffff;
            --border-color: #e2e8f0;
            --border-highlight: #cbd5e1;
            --text-main: #0f172a;
            --text-muted: #64748b;
            
            /* Accent Colors */
            --accent-blue: #2563eb;
            --accent-blue-light: #eff6ff;
            --accent-emerald: #059669;
            --accent-emerald-light: #ecfdf5;
            --accent-purple: #7c3aed;
            --accent-purple-light: #f5f3ff;
            --accent-amber: #d97706;
            --accent-amber-light: #fffbeb;
            --accent-rose: #e11d48;
            --accent-rose-light: #fff1f2;
        }
        
        body {
            margin: 0;
            font-family: 'Inter', -apple-system, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ═══════════ BACKGROUND ═══════════ */
        .ambient-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: -1;
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 50%, #e0f2fe 100%);
        }

        /* ═══════════ NAVIGATION ═══════════ */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 2rem;
            border-bottom: 1px solid var(--border-color);
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .brand img {
            height: 36px;
        }

        .brand-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-info h1 {
            font-size: 0.95rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.01em;
            color: var(--text-main);
        }

        .brand-info span {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
            margin-top: 2px;
        }

        .sys-status {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .status-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 0.75rem;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--text-main);
            transition: all 0.2s;
            font-variant-numeric: tabular-nums;
        }
        
        .status-pill i {
            font-size: 1rem;
            color: var(--text-muted);
        }

        .status-pill.primary {
            background: var(--accent-blue);
            color: #ffffff;
            border-color: var(--accent-blue);
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
        }
        
        .status-pill.primary i {
            color: #ffffff;
        }
        
        .status-pill.primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.3);
        }

        /* ═══════════ HERO SECTION ═══════════ */
        .hero {
            padding: 3rem 2rem 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        .hero h2 {
            font-size: 2.2rem;
            font-weight: 300;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.04em;
            color: var(--text-main);
        }
        
        .hero h2 strong {
            font-weight: 700;
            color: var(--accent-blue);
        }

        .hero p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin: 0;
            max-width: 600px;
            line-height: 1.5;
        }

        /* ═══════════ BENTO GRID CARDS ═══════════ */
        .grid-container {
            padding: 0 2rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1.25rem;
        }

        .bento-card {
            position: relative;
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: var(--text-main);
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px -2px rgba(0,0,0,0.05);
        }

        .bento-card:hover {
            background: var(--surface-hover);
            border-color: var(--border-highlight);
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.08);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 2;
        }

        .icon-wrapper {
            width: 40px; height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .bento-card:hover .icon-wrapper {
            transform: scale(1.05);
        }

        .icon-wrapper i {
            font-size: 1.25rem;
        }

        .card-action {
            width: 28px; height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: var(--text-muted);
            border: 1px solid transparent;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
        }

        .bento-card:hover .card-action {
            background: var(--text-main);
            color: #fff;
        }

        .card-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .card-title {
            font-size: 0.95rem;
            font-weight: 700;
            margin: 0 0 0.35rem 0;
            letter-spacing: -0.01em;
            color: var(--text-main);
        }

        .card-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
            line-height: 1.4;
            margin: 0;
        }

        /* ═══════════ SUB-LIST (MENUS) ═══════════ */
        .op-list {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            margin: 0.75rem 0 0 0;
            flex-grow: 1;
        }

        .op-item {
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 0.5rem;
            border-radius: 8px;
            background: transparent;
            transition: all 0.2s;
            color: var(--text-muted);
            font-weight: 500;
            text-decoration: none;
        }

        .op-item i {
            color: var(--text-muted);
            font-size: 1rem;
            transition: color 0.2s;
        }

        .bento-card:hover .op-item {
            background: #f8fafc;
        }

        /* Hovering the list item dynamically uses the card's accent color via CSS vars */
        .op-item:hover {
            color: var(--card-accent);
            background: var(--card-accent-light) !important;
            transform: translateX(4px);
        }
        
        .op-item:hover i {
            color: var(--card-accent);
        }

        /* ═══════════ RESPONSIVE ═══════════ */
        @media (max-width: 1200px) {
            .grid-container { grid-template-columns: repeat(3, 1fr); }
            .hero { padding: 3rem 3rem 2rem; }
        }

        @media (max-width: 900px) {
            .grid-container { grid-template-columns: repeat(2, 1fr); padding: 0 2rem 4rem; }
            .hero { padding: 2rem 2rem 1.5rem; }
            nav { padding: 1rem 2rem; flex-wrap: wrap; }
            .sys-status { margin-top: 1rem; width: 100%; justify-content: space-between; }
        }
        
        @media (max-width: 600px) {
            .grid-container { grid-template-columns: 1fr; }
            .sys-status { flex-wrap: wrap; }
            .status-pill { flex: 1 1 auto; justify-content: center; }
        }

        /* ═══════════ ANIMATIONS ═══════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); filter: blur(4px); }
            to { opacity: 1; transform: translateY(0); filter: blur(0); }
        }

        .animate-up {
            animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }
        
        .d-1 { animation-delay: 0.05s; }
        .d-2 { animation-delay: 0.1s; }
        .d-3 { animation-delay: 0.15s; }
        .d-4 { animation-delay: 0.2s; }
        .d-5 { animation-delay: 0.25s; }

        /* ═══════════ MODAL ═══════════ */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .modal-overlay.show {
            opacity: 1;
            pointer-events: auto;
        }
        .modal-content {
            position: relative;
            background: white;
            padding: 10px;
            border-radius: 12px;
            max-width: 90vw;
            max-height: 90vh;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: scale(0.9);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .modal-overlay.show .modal-content {
            transform: scale(1);
        }
        .modal-close {
            position: absolute;
            top: -15px; right: -15px;
            background: var(--text-main);
            color: white;
            border: none;
            width: 32px; height: 32px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        .modal-content img {
            max-width: 100%;
            max-height: calc(90vh - 20px);
            border-radius: 8px;
            display: block;
        }
        
        /* ═══════════ FOOTER ═══════════ */
        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.85rem;
            color: #f1f5f9;
            background: #0f172a;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <div class="ambient-bg"></div>

    <nav>
        <div class="brand">
            <img src="{{ asset('layanan-publik/images/logo2.png') }}" alt="Bogor Logo">
            <div class="brand-info">
                <h1>Portal Layanan Diskominfo</h1>
                <span>Pemerintah Kota Bogor</span>
            </div>
        </div>
        
        <div class="sys-status">
            <div class="status-pill">
                <i class="ph ph-clock"></i>
                <span id="clock">00:00:00</span>
            </div>
            <div class="status-pill">
                <i class="ph ph-calendar-blank"></i>
                <span id="date">Memuat...</span>
            </div>
            <div class="status-pill">
                <i class="ph ph-cloud-sun"></i>
                <span>28°C Cerah</span>
            </div>
        </div>
    </nav>

    <header class="hero animate-up">
        <h2><strong>Portal Layanan</strong> Diskominfo</h2>
        <p>Akses cepat ke dashboard, data statistik, peta digital, command center, CCTV, call center, serta berbagai aplikasi dan layanan publik Pemerintah Kota Bogor melalui satu portal yang terintegrasi.</p>
    </header>

    <main class="grid-container">
        
        <!-- Card 1 -->
        <div class="bento-card animate-up d-1" style="--card-accent: var(--accent-blue); --card-accent-light: var(--accent-blue-light);">
            <div class="card-header">
                <div class="icon-wrapper" style="background-color: var(--accent-blue-light); color: var(--accent-blue);">
                    <i class="ph-fill ph-globe"></i>
                </div>
            </div>
            <div class="card-content">
                <h3 class="card-title">Portal & Informasi</h3>
                <p class="card-desc">Menyediakan akses ke portal resmi Pemerintah Kota Bogor dan media informasi publik yang dikelola oleh Diskominfo.</p>
                <div class="op-list">
                    <a href="https://kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-globe-hemisphere-west"></i> Website Kota Bogor <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://kominfo.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-info"></i> Website Diskominfo <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://ppid.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-folder-open"></i> PPID <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bento-card animate-up d-2" style="--card-accent: var(--accent-emerald); --card-accent-light: var(--accent-emerald-light);">
            <div class="card-header">
                <div class="icon-wrapper" style="background-color: var(--accent-emerald-light); color: var(--accent-emerald);">
                    <i class="ph-fill ph-headset"></i>
                </div>
            </div>
            <div class="card-content">
                <h3 class="card-title">Layanan & Pengaduan</h3>
                <p class="card-desc">Memfasilitasi masyarakat dalam mengakses layanan publik serta menyampaikan pengaduan, aspirasi, dan masukan kepada Pemerintah Kota Bogor.</p>
                <div class="op-list">
                    <a href="https://bsw.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-app-window"></i> Bogor Single Window (BSW) <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://sibadra.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-chat-circle-dots"></i> SIBADRA <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bento-card animate-up d-3" style="--card-accent: var(--accent-purple); --card-accent-light: var(--accent-purple-light);">
            <div class="card-header">
                <div class="icon-wrapper" style="background-color: var(--accent-purple-light); color: var(--accent-purple);">
                    <i class="ph-fill ph-chart-pie-slice"></i>
                </div>
            </div>
            <div class="card-content">
                <h3 class="card-title">Data & Statistik</h3>
                <p class="card-desc">Menyediakan data sektoral, statistik, dan informasi pembangunan sebagai dasar pengambilan keputusan serta keterbukaan data pemerintah.</p>
                <div class="op-list">
                    <a href="https://data.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-database"></i> Portal Data Kota Bogor <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bento-card animate-up d-4" style="--card-accent: var(--accent-amber); --card-accent-light: var(--accent-amber-light);">
            <div class="card-header">
                <div class="icon-wrapper" style="background-color: var(--accent-amber-light); color: var(--accent-amber);">
                    <i class="ph-fill ph-buildings"></i>
                </div>
            </div>
            <div class="card-content">
                <h3 class="card-title">Aplikasi Internal</h3>
                <p class="card-desc">Mendukung pelaksanaan administrasi, tata kelola, dan operasional internal Pemerintah Kota Bogor agar lebih efektif dan efisien.</p>
                <div class="op-list">
                    <a href="https://tnd.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-file-text"></i> TNDE <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://presensimetting.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-users"></i> Presensi Meeting <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://digitaloffice.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-briefcase"></i> TPTK <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="bento-card animate-up d-5" style="--card-accent: var(--accent-rose); --card-accent-light: var(--accent-rose-light);">
            <div class="card-header">
                <div class="icon-wrapper" style="background-color: var(--accent-rose-light); color: var(--accent-rose);">
                    <i class="ph-fill ph-cpu"></i>
                </div>
            </div>
            <div class="card-content">
                <h3 class="card-title">Platform Digital</h3>
                <p class="card-desc">Menyediakan platform pendukung transformasi digital, inovasi, serta layanan dasar yang mendukung ekosistem aplikasi Pemerintah Kota Bogor.</p>
                <div class="op-list">
                    <a href="https://smartcity.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-device-mobile"></i> Website Smart City <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://lab-kms.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-book-open"></i> Manajemen Pengetahuan <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                    <a href="https://sso.kotabogor.go.id/" target="_blank" class="op-item"><i class="ph-fill ph-key"></i> SSO-TP2DD <i class="ph ph-arrow-up-right" style="margin-left: auto;"></i></a>
                </div>
            </div>
        </div>

    </main>

    <footer>
        &copy; 2026 Diskominfo Kota Bogor
    </footer>

    <!-- Modal 1 -->
    <div class="modal-overlay" id="welcomeModal1">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal(1)">
                <i class="ph ph-x"></i>
            </button>
            <img src="{{ asset('images/modal1.png') }}" alt="Maklumat Diskominfo">
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal-overlay" id="welcomeModal2">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal(2)">
                <i class="ph ph-x"></i>
            </button>
            <img src="{{ asset('images/modal2.png') }}" alt="Survei Kepuasan Masyarakat">
        </div>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            
            // Time
            const timeStr = now.toLocaleTimeString('id-ID', { 
                hour12: false, 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit' 
            }).replace(/\./g, ':');
            document.getElementById('clock').textContent = timeStr;
            
            // Date
            const dateStr = now.toLocaleDateString('id-ID', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
            document.getElementById('date').textContent = dateStr;
        }
        
        function closeModal(step) {
            if (step === 1) {
                document.getElementById('welcomeModal1').classList.remove('show');
                // Setelah modal 1 tertutup, tampilkan modal 2
                setTimeout(() => {
                    document.getElementById('welcomeModal2').classList.add('show');
                }, 300);
            } else if (step === 2) {
                document.getElementById('welcomeModal2').classList.remove('show');
            }
        }
        
        setTimeout(() => {
            document.getElementById('welcomeModal1').classList.add('show');
        }, 10);
        
        setInterval(updateDateTime, 1000);
        updateDateTime(); // Initial call
    </script>
</body>
</html>
