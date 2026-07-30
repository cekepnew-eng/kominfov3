@extends('layouts.layanan')

@section('title', 'Daftar Hasil Penelitian & Jurnal — Diskominfo Kota Bogor')
@section('description', 'Dinas Komunikasi dan Informatika Kota Bogor — Daftar hasil penelitian, tugas akhir, dan publikasi jurnal mahasiswa.')

@section('styles')
  <style>
    html {
      scroll-behavior: smooth;
    }

    body::after {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 100%; height: 600px;
      background: linear-gradient(180deg, rgba(224, 242, 254, 0.4) 0%, rgba(248, 250, 252, 0) 100%);
      z-index: -1;
      pointer-events: none;
    }

    /* Page specific custom styles */
    .page-container {
      max-width: 1200px;
      margin: 180px auto 80px auto;
      padding: 0 1.5rem;
    }

    .header-section {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-bottom: 2.5rem;
      flex-wrap: wrap;
      gap: 1.5rem;
    }
    
    .header-title h1 {
      color: #0ea5e9;
      font-size: clamp(1.8rem, 2.5vw, 2.4rem);
      font-weight: 800;
      margin-bottom: 0.5rem;
      letter-spacing: -0.02em;
    }
    
    .header-title p {
      color: var(--slate-500);
      font-size: 0.95rem;
      margin: 0;
      max-width: 600px;
      line-height: 1.6;
    }
    
    /* Search Box styling */
    .search-form {
      display: flex;
      align-items: center;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 100px;
      padding: 4px;
      width: 100%;
      max-width: 380px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      transition: all 0.3s ease;
    }
    .search-form:focus-within {
      border-color: #0ea5e9;
      box-shadow: 0 4px 20px rgba(14, 165, 233, 0.1);
    }
    
    .search-form input {
      border: none;
      background: transparent;
      padding: 10px 16px;
      font-size: 0.9rem;
      width: 100%;
      outline: none;
      color: var(--slate-900);
      font-family: inherit;
    }
    
    .search-form input::placeholder {
      color: #94a3b8;
    }
    
    .search-btn {
      background: #0ea5e9;
      color: white;
      border: none;
      border-radius: 50%;
      width: 38px;
      height: 38px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      margin-right: 4px;
      flex-shrink: 0;
      transition: all 0.25s ease;
    }
    
    .search-btn:hover {
      background: #0284c7;
      transform: scale(1.05);
    }

    /* Table & Container */
    .table-container {
      background: white;
      border-radius: 16px;
      border: 1px solid #f1f5f9;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
      overflow: hidden;
    }

    .table-custom th {
      background: #1e293b;
      color: white;
      font-size: 0.8rem;
      font-weight: 700;
      padding: 1.1rem 1.5rem;
      letter-spacing: 0.5px;
    }

    .table-custom td {
      padding: 1.1rem 1.5rem;
      border-bottom: 1px solid #f1f5f9;
      font-size: 0.92rem;
    }

    .row-title {
      font-size: 0.92rem;
      font-weight: 700;
      color: #1e293b;
    }

    .row-author {
      font-size: 0.88rem;
      color: var(--slate-500);
    }

    .btn-lihat {
      background: #e0f2fe;
      color: #0284c7;
      border: none;
      padding: 8px 16px;
      font-size: 0.82rem;
      font-weight: 700;
      border-radius: 8px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-lihat:hover {
      background: #0ea5e9;
      color: white;
    }

    .empty-state {
      padding: 3rem 0;
      text-align: center;
      color: var(--slate-500);
      font-size: 0.95rem;
    }

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

    @media (max-width: 768px) {
      .btn-back-sticky { top: 85px; left: 15px; width: 44px; height: 44px; }
      .page-container { margin-top: 110px; }
      .header-section { flex-direction: column; align-items: stretch; gap: 1rem; }
      .search-form { max-width: 100%; }
      .table-custom th, .table-custom td { padding: 0.85rem 1rem; font-size: 0.85rem; }
      .row-title { font-size: 0.85rem; }
      .row-author { font-size: 0.8rem; }
    }
  </style>
@endsection

@section('content')
  <!-- Back Button -->
  <a href="{{ route('layanan.penelitian') }}" class="btn-back-sticky" title="Kembali ke Penelitian">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
  </a>

  <!-- ═══════════ MAIN CONTENT ═══════════ -->
  <div class="page-container" data-aos="fade-up">

    <div class="header-section">
      <div class="header-title">
        <h1>Daftar Hasil Penelitian &amp; Jurnal</h1>
        <p>Berikut adalah daftar penelitian, tugas akhir, dan jurnal yang telah diselesaikan dan dilaporkan.</p>
      </div>
      
      <form class="search-form" id="searchForm">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 12px;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" id="searchInput" placeholder="Cari judul / penulis...">
        <button type="submit" class="search-btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
      </form>
    </div>

    <div class="table-container">
      <div class="table-responsive-wrapper">
        <table class="table-custom">
          <thead>
            <tr>
              <th class="col-no">NO</th>
              <th class="col-judul">JUDUL</th>
              <th class="col-penulis">PENULIS</th>
              <th class="col-aksi">AKSI</th>
            </tr>
          </thead>
          <tbody id="journalTableBody">
            <!-- Rendered by Javascript -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination Container -->
    <div class="pagination-container" id="paginationContainer">
      <!-- Rendered by Javascript -->
    </div>

  </div>
@endsection

@section('scroll_to_top_script')
  if (history.scrollRestoration) {
    history.scrollRestoration = 'manual';
  }
  window.scrollTo(0, 0);
@endsection

@section('scripts')
  <script>
    // Journal Database loaded dynamically from database
    const allJournals = {!! json_encode($journals) !!};

    let searchQuery = '';
    let currentPage = 1;
    const itemsPerPage = 10;

    const tableBody = document.getElementById('journalTableBody');
    const paginationContainer = document.getElementById('paginationContainer');
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    function renderTable() {
      const filtered = allJournals.filter(j => {
        return j.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
               j.author.toLowerCase().includes(searchQuery.toLowerCase());
      });

      const totalItems = filtered.length;
      const totalPages = Math.max(1, Math.ceil(totalItems / itemsPerPage));
      
      if (currentPage < 1) currentPage = 1;
      if (currentPage > totalPages) currentPage = totalPages;

      const offset = (currentPage - 1) * itemsPerPage;
      const pageItems = filtered.slice(offset, offset + itemsPerPage);

      tableBody.innerHTML = '';

      if (pageItems.length === 0) {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td colspan="4" class="empty-state">
            Pencarian "<b>${escapeHtml(searchQuery)}</b>" tidak ditemukan.
          </td>
        `;
        tableBody.appendChild(row);
        renderPagination(0, 1);
        return;
      }

      pageItems.forEach((j, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td class="col-no row-num">${offset + index + 1}</td>
          <td class="col-judul">
            <h6 class="row-title">${escapeHtml(j.title)}</h6>
          </td>
          <td class="col-penulis row-author">${escapeHtml(j.author)}</td>
          <td class="col-aksi">
            <button type="button" class="btn-lihat" onclick="alert('Abstrak belum tersedia secara publik.')">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              Lihat
            </button>
          </td>
        `;
        tableBody.appendChild(row);
      });

      renderPagination(totalItems, totalPages);
    }

    function renderPagination(totalItems, totalPages) {
      paginationContainer.innerHTML = '';
      if (totalPages <= 1) return;

      const prevBtn = document.createElement('span');
      prevBtn.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
      prevBtn.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>`;
      if (currentPage > 1) {
        prevBtn.addEventListener('click', () => {
          currentPage--;
          renderTable();
          scrollToTable();
        });
      }
      paginationContainer.appendChild(prevBtn);

      for (let i = 1; i <= totalPages; i++) {
        const numBtn = document.createElement('span');
        numBtn.className = `page-item ${currentPage === i ? 'active' : ''}`;
        numBtn.textContent = i;
        numBtn.addEventListener('click', () => {
          currentPage = i;
          renderTable();
          scrollToTable();
        });
        paginationContainer.appendChild(numBtn);
      }

      const nextBtn = document.createElement('span');
      nextBtn.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
      nextBtn.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>`;
      if (currentPage < totalPages) {
        nextBtn.addEventListener('click', () => {
          currentPage++;
          renderTable();
          scrollToTable();
        });
      }
      paginationContainer.appendChild(nextBtn);
    }

    function scrollToTable() {
      const headerSection = document.querySelector('.header-section');
      if (headerSection) {
        headerSection.scrollIntoView({ behavior: 'smooth' });
      }
    }

    function escapeHtml(str) {
      return str
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
    }

    searchForm.addEventListener('submit', (e) => {
      e.preventDefault();
      searchQuery = searchInput.value.trim();
      currentPage = 1;
      renderTable();
    });

    searchInput.addEventListener('input', () => {
      searchQuery = searchInput.value.trim();
      currentPage = 1;
      renderTable();
    });

    renderTable();
  </script>
@endsection
