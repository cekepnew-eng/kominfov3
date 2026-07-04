import React, { useState } from 'react';
import './index.css';

function App() {
  const [currentPage, setCurrentPage] = useState('beranda');
  const [activeTabPenelitian, setActiveTabPenelitian] = useState('pengajuan');
  const [activeTabMagang, setActiveTabMagang] = useState('pengajuan');

  const renderPenelitianContent = () => {
    switch (activeTabPenelitian) {
      case 'pengajuan':
        return (
          <div className="form-layout">
            <div className="form-column">
              <div className="form-group">
                <label>Nama Lengkap</label>
                <input type="text" placeholder="" />
              </div>
              
              <div className="form-row">
                <div className="form-group">
                  <label>No Telepon</label>
                  <input type="text" placeholder="" />
                </div>
                <div className="form-group">
                  <label>Alamat Email</label>
                  <input type="email" placeholder="" />
                </div>
              </div>

              <div className="form-group">
                <label>Nama Instansi</label>
                <input type="text" placeholder="" />
              </div>

              <div className="form-group">
                <label>Judul Penelitian</label>
                <input type="text" placeholder="" />
              </div>

              <div className="form-row">
                <div className="form-group">
                  <label>Lokasi Penelitian</label>
                  <select>
                    <option>-- Pilih Lokasi --</option>
                  </select>
                </div>
                <div className="form-group">
                  <label>Bidang Tujuan</label>
                  <select>
                    <option>-- Pilih Bidang --</option>
                  </select>
                </div>
              </div>

              <div className="form-row">
                <div className="form-group">
                  <label>Surat Penelitian</label>
                  <div className="file-upload-wrapper">
                    <button className="file-btn">Choose File</button>
                    <span className="file-name">No file chosen</span>
                  </div>
                  <span className="file-hint">Format file harus .pdf dan ukuran maksimal 2MB</span>
                </div>
                <div className="form-group">
                  <label>Surat Kesbangpol</label>
                  <div className="file-upload-wrapper">
                    <button className="file-btn">Choose File</button>
                    <span className="file-name">No file chosen</span>
                  </div>
                  <span className="file-hint">Format file harus .pdf dan ukuran maksimal 2MB</span>
                </div>
              </div>

              <button className="submit-btn">Kirim Permohonan</button>
            </div>

            <div className="info-column">
              <h3 className="info-title">Informasi Penting!</h3>
              <ol className="info-list">
                <li>Pastikan Data yang anda kirimkan <strong>Valid</strong>.</li>
                <li><strong>Nomor Tiket</strong> Permohonan Pengajuan akan dikirimkan melalui <strong>alamat email anda</strong>.</li>
                <li><strong>Nomor Tiket</strong> Permohonan Pengajuan dapat digunakan <strong>untuk melihat status permohonan anda</strong>.</li>
                <li>Jika disetujui, <strong>surat jawaban</strong> akan dikirimkan melalui alamat email anda.</li>
              </ol>
              <img src="/illustration.png" alt="Medical Research Illustration" className="info-illustration" />
            </div>
          </div>
        );
      case 'status_pengajuan':
        return (
          <div className="form-layout" style={{ justifyContent: 'center', textAlign: 'center', padding: '60px 20px' }}>
            <div style={{ maxWidth: '500px', margin: '0 auto' }}>
              <h3 className="info-title" style={{ justifyContent: 'center' }}>Cek Status Pengajuan</h3>
              <p style={{ marginBottom: '20px', color: 'var(--text-light)' }}>Masukkan nomor tiket pengajuan Anda untuk melihat status saat ini.</p>
              <div className="form-group">
                <input type="text" placeholder="Masukkan Nomor Tiket" style={{ textAlign: 'center' }} />
              </div>
              <button className="submit-btn">Cek Status</button>
            </div>
          </div>
        );
      case 'unggah_jurnal':
        return (
          <div className="form-layout" style={{ justifyContent: 'center', textAlign: 'center', padding: '60px 20px' }}>
            <div style={{ maxWidth: '500px', margin: '0 auto' }}>
              <h3 className="info-title" style={{ justifyContent: 'center' }}>Unggah Jurnal Penelitian</h3>
              <p style={{ marginBottom: '20px', color: 'var(--text-light)' }}>Silakan unggah jurnal hasil penelitian Anda menggunakan nomor tiket pengajuan yang telah disetujui.</p>
              <div className="form-group">
                <input type="text" placeholder="Masukkan Nomor Tiket" style={{ textAlign: 'center' }} />
              </div>
              <button className="submit-btn">Lanjutkan</button>
            </div>
          </div>
        );
      case 'status_jurnal':
        return (
          <div className="form-layout" style={{ justifyContent: 'center', textAlign: 'center', padding: '60px 20px' }}>
            <div style={{ maxWidth: '500px', margin: '0 auto' }}>
              <h3 className="info-title" style={{ justifyContent: 'center' }}>Cek Status Jurnal</h3>
              <p style={{ marginBottom: '20px', color: 'var(--text-light)' }}>Masukkan nomor tiket untuk melihat status persetujuan atau publikasi jurnal Anda.</p>
              <div className="form-group">
                <input type="text" placeholder="Masukkan Nomor Tiket" style={{ textAlign: 'center' }} />
              </div>
              <button className="submit-btn">Cek Status Jurnal</button>
            </div>
          </div>
        );
      default:
        return null;
    }
  };

  const renderMagangContent = () => {
    switch (activeTabMagang) {
      case 'pengajuan':
        return (
          <div className="form-layout">
            <div className="form-column">
              <h2 style={{ fontSize: '1.25rem', fontWeight: 'bold', marginBottom: '1.5rem' }}>Pengajuan Magang</h2>
              <div className="form-row">
                <div className="form-group">
                  <label>Nama Pemohon</label>
                  <input type="text" placeholder="" />
                </div>
                <div className="form-group">
                  <label>Email Pemohon</label>
                  <input type="email" placeholder="" />
                </div>
              </div>
              
              <div className="form-row">
                <div className="form-group">
                  <label>No Telepon</label>
                  <input type="text" placeholder="" />
                </div>
                <div className="form-group">
                  <label>Judul</label>
                  <input type="text" placeholder="" />
                </div>
              </div>

              <div className="form-group">
                <label>Nama Kampus / Sekolah</label>
                <input type="text" placeholder="" />
              </div>

              <div className="form-row">
                <div className="form-group">
                  <label>Lokasi Magang</label>
                  <select>
                    <option>-- Pilih Lokasi --</option>
                  </select>
                </div>
                <div className="form-group">
                  <label>Bidang Tujuan</label>
                  <select>
                    <option>-- Pilih Bidang --</option>
                  </select>
                </div>
              </div>

              <div className="form-group" style={{ width: '48%' }}>
                <label>Lama Magang (Minggu)</label>
                <input type="text" placeholder="" />
              </div>

              <div className="form-group">
                <label>Surat dari Universitas / Sekolah</label>
                <div className="file-upload-wrapper">
                  <button className="file-btn">Choose File</button>
                  <span className="file-name">No file chosen</span>
                </div>
                <span className="file-hint">Format file harus .pdf dan ukuran maksimal 2MB</span>
              </div>

              <button className="submit-btn" style={{ width: '120px', borderRadius: '4px' }}>Submit</button>
            </div>

            <div className="info-column">
              <h3 className="info-title">Informasi Penting!</h3>
              <ol className="info-list">
                <li>Pastikan Data yang anda kirimkan <strong>Valid</strong>.</li>
                <li><strong>Nomor Tiket</strong> Permohonan Pengajuan akan dikirimkan melalui <strong>alamat email anda</strong>.</li>
                <li><strong>Nomor Tiket</strong> Pengajuan dapat digunakan <strong>untuk melihat status permohonan anda</strong>.</li>
                <li>Jika disetujui, <strong>surat jawaban</strong> akan dikirimkan melalui alamat email anda.</li>
              </ol>
              <img src="/magang_illustration.png" alt="Medical Internship Illustration" className="info-illustration" />
            </div>
          </div>
        );
      case 'status_pengajuan':
        return (
          <div className="form-layout" style={{ justifyContent: 'center', textAlign: 'center', padding: '60px 20px' }}>
            <div style={{ maxWidth: '500px', margin: '0 auto' }}>
              <h3 className="info-title" style={{ justifyContent: 'center' }}>Status Pengajuan</h3>
              <p style={{ marginBottom: '20px', color: 'var(--text-light)' }}>Masukkan nomor tiket pengajuan magang Anda untuk melihat status saat ini.</p>
              <div className="form-group">
                <input type="text" placeholder="Masukkan Nomor Tiket" style={{ textAlign: 'center' }} />
              </div>
              <button className="submit-btn" style={{ width: '120px', borderRadius: '4px' }}>Submit</button>
            </div>
          </div>
        );
      default:
        return null;
    }
  };

  const renderJurnalContent = () => {
    const dummyData = [
      { id: 1, title: 'Pengalaman Penderita HIV Pada Lelaki Suka Lelaki (LSL) Analisis Kualitatif tentang Persepsi Diri, Respon Saat Didiagnosis, Perilaku Pencegahan, dan Dukungan Pendamping Sebaya', author: 'Dewi Purnamawati' },
      { id: 2, title: 'SELF-EFFICACY AMONG PEOPLE LIVING WITH HIV AIDS AFTER COVID-19 PANDEMIC', author: 'Dewi Purnamawati' },
      { id: 3, title: 'FAMILY SUPPORT FOR PEOPLE WITH HIV AND AIDS (PLWHA)', author: 'Dewi Purnamawati' },
      { id: 4, title: 'Religiusitas Homoseksual dengan HIV', author: 'Dewi Purnamawati' },
      { id: 5, title: 'Faktor-Faktor Yang Berhubungan Dengan Kepatuhan Minum Obat Pada Pasien Diabetes Melitus Tipe 2 Di Puskesmas Sindang Barang Bogor', author: 'Erina Desy Pramesti' },
      { id: 6, title: 'Hubungan Pengetahuan dan Dukungan Keluarga Terhadap Manajemen Diri Pada Pasien Diabetes Melitus Tipe 2 Di Puskesmas Sindangbarang Bogor', author: 'Maahirah Ichamna Hartanti' },
      { id: 7, title: 'ANALISIS KOMUNIKASI INTERPERSONAL KADER DALAM PROGRAM AKSELERASI GERAKAN ELIMINASI TUBERKULOSIS (AKSI GEULIS) DI KOTA BOGOR', author: 'Hanna Attaya Putri' },
      { id: 8, title: 'Gambaran Epidemiologi Kasus Campak di Wilayah Kota Bogor Tahun 2022-2024', author: 'Siti Setia Hidiyah Wati' },
      { id: 9, title: 'ANALISIS DETERMINAN STUNTING DI KABUPATEN BOGOR DAN KOTA BOGOR : PENDEKATAN SPASIAL UNTUK MENINGKATKAN EFEKTIVITAS INTERVENSI', author: 'LUKMAN PERDANA SOFYAN' },
    ];

    return (
      <div className="jurnal-container">
        <div className="table-wrapper">
          <table className="jurnal-table">
            <thead>
              <tr>
                <th style={{ width: '50px' }}>NO</th>
                <th>JUDUL</th>
                <th>PENULIS</th>
                <th style={{ width: '100px', textAlign: 'center' }}>AKSI</th>
              </tr>
            </thead>
            <tbody>
              {dummyData.map((jurnal) => (
                <tr key={jurnal.id}>
                  <td>{jurnal.id}</td>
                  <td>{jurnal.title}</td>
                  <td>{jurnal.author}</td>
                  <td style={{ textAlign: 'center' }}>
                    <button className="btn-lihat">
                      <svg stroke="currentColor" fill="currentColor" strokeWidth="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 288c-11.4 0-20.8-7.4-23.3-18.4s1.6-22.3 10.7-28.7l232-160c6.6-4.6 15.3-4.6 21.9 0l232 160c9.1 6.3 13.2 17.6 10.7 28.7s-11.9 18.4-23.3 18.4L448 288v160c0 17.7-14.3 32-32 32L96 480c-17.7 0-32-14.3-32-32L64 288 16 288zM400 416V254.9l-144-99.3-144 99.3V416l288 0z"></path>
                      </svg>
                      Lihat
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    );
  };

  return (
    <>
      {/* Contact Bar */}
      {currentPage === 'beranda' ? (
        <>
          {/* Contact Bar */}
          <div className="contact-bar">
            <div className="contact-container">
              <div className="contact-info">
                <span>📞 0251 8331753</span>
                <span>✉️ dinkes@kotabogor.go.id</span>
                <span>Media Sosial : 📱 🐦 📺</span>
              </div>
              <div className="lang-selector">
                <button className="lang-btn">English</button>
                <button className="lang-btn active">Indonesia</button>
              </div>
            </div>
          </div>

          {/* Navigation Header for Beranda */}
          <nav className="main-nav">
            <div className="nav-container">
              <div className="brand">
                <img src="https://dinkes.kotabogor.go.id/logo-smarthealth.png.png" alt="Logo" style={{ height: '40px' }} />
              </div>
              <div className="nav-links">
                <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('beranda'); }} className={currentPage === 'beranda' ? 'active' : ''}>BERANDA</a>
                <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('penelitian'); }} className={currentPage === 'penelitian' ? 'active' : ''}>PENELITIAN</a>
                <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('magang'); }} className={currentPage === 'magang' ? 'active' : ''}>MAGANG</a>
                <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('jurnal'); }} className={currentPage === 'jurnal' ? 'active' : ''}>JURNAL</a>
                <a href="#">LAYANAN</a>
                <a href="#">BERITA</a>
                <a href="#">KONTAK KAMI</a>
              </div>
            </div>
          </nav>
        </>
      ) : (
        /* Original Navigation Header for internal pages */
        <nav className="top-nav">
          <div className="nav-container">
            <div className="nav-logo">
              <img src="https://dinkes.kotabogor.go.id/logo-smarthealth.png.png" alt="Logo" style={{ height: '40px' }} />
            </div>
            <div className="nav-links">
              <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('beranda'); }}>Beranda</a>
              <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('penelitian'); }} style={{ fontWeight: currentPage === 'penelitian' ? 'bold' : 'normal', borderBottom: currentPage === 'penelitian' ? '2px solid white' : 'none', paddingBottom: '5px' }}>Penelitian</a>
              <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('magang'); }} style={{ fontWeight: currentPage === 'magang' ? 'bold' : 'normal', borderBottom: currentPage === 'magang' ? '2px solid white' : 'none', paddingBottom: '5px' }}>Magang</a>
              <a href="#" onClick={(e) => { e.preventDefault(); setCurrentPage('jurnal'); }} style={{ fontWeight: currentPage === 'jurnal' ? 'bold' : 'normal', borderBottom: currentPage === 'jurnal' ? '2px solid white' : 'none', paddingBottom: '5px' }}>Jurnal</a>
              <a href="#" className="has-dropdown">Profil</a>
              <a href="#" className="has-dropdown">Publikasi</a>
              <a href="#">Dokumen</a>
              <a href="#">Kontak</a>
            </div>
          </div>
        </nav>
      )}

      {/* Dynamic Content Based on currentPage */}
      
      {currentPage === 'beranda' && (
        <>
          <div className="hero-section">
            <h1 className="hero-title">Penelitian Kesehatan</h1>
            <p className="hero-subtitle">Perizinan untuk melakukan kegiatan penelitian, magang, dan daftar publikasi jurnal</p>
          </div>

          <div className="beranda-container">
            <div className="beranda-layout">
              <div className="beranda-cards">
                <div className="beranda-card" onClick={() => setCurrentPage('penelitian')}>
                  <div className="beranda-card-icon">🔬</div>
                  <div className="beranda-card-title">Penelitian</div>
                </div>
                <div className="beranda-card" onClick={() => setCurrentPage('magang')}>
                  <div className="beranda-card-icon">💼</div>
                  <div className="beranda-card-title">Magang</div>
                </div>
                <div className="beranda-card" onClick={() => setCurrentPage('jurnal')}>
                  <div className="beranda-card-icon">📔</div>
                  <div className="beranda-card-title">Jurnal</div>
                </div>
              </div>
              <div className="beranda-carousel">
                <img src="/alur_perizinan.png" alt="Alur Perizinan Penelitian" className="carousel-img" />
              </div>
            </div>
          </div>
        </>
      )}

      {currentPage === 'penelitian' && (
        <>
          <div className="hero-section-original">
            <h1 className="hero-title">Penelitian</h1>
            <p className="hero-subtitle">Pengajuan permohonan penelitian dan unggah jurnal</p>
          </div>

          <div className="main-container-original">
            <div className="tabs">
              <button 
                className={`tab-btn ${activeTabPenelitian === 'pengajuan' ? 'active' : ''}`}
                onClick={() => setActiveTabPenelitian('pengajuan')}
              >
                Pengajuan Permohonan
              </button>
              <button 
                className={`tab-btn ${activeTabPenelitian === 'status_pengajuan' ? 'active' : ''}`}
                onClick={() => setActiveTabPenelitian('status_pengajuan')}
              >
                Status Pengajuan
              </button>
              <button 
                className={`tab-btn ${activeTabPenelitian === 'unggah_jurnal' ? 'active' : ''}`}
                onClick={() => setActiveTabPenelitian('unggah_jurnal')}
              >
                Unggah Jurnal
              </button>
              <button 
                className={`tab-btn ${activeTabPenelitian === 'status_jurnal' ? 'active' : ''}`}
                onClick={() => setActiveTabPenelitian('status_jurnal')}
              >
                Status Jurnal
              </button>
            </div>

            <div className="tab-content">
              {renderPenelitianContent()}
            </div>
          </div>
        </>
      )}

      {currentPage === 'magang' && (
        <>
          <div className="hero-section-original">
            <h1 className="hero-title">Magang Kesehatan</h1>
            <p className="hero-subtitle">Pengajuan permohonan magang di lingkungan Dinas Kesehatan Kota Bogor</p>
          </div>

          <div className="main-container-original">
            <div className="tabs">
              <button 
                className={`tab-btn ${activeTabMagang === 'pengajuan' ? 'active' : ''}`}
                onClick={() => setActiveTabMagang('pengajuan')}
              >
                Pengajuan Magang
              </button>
              <button 
                className={`tab-btn ${activeTabMagang === 'status_pengajuan' ? 'active' : ''}`}
                onClick={() => setActiveTabMagang('status_pengajuan')}
              >
                Status Pengajuan
              </button>
            </div>

            <div className="tab-content">
              {renderMagangContent()}
            </div>
          </div>
        </>
      )}

      {currentPage === 'jurnal' && (
        <>
          <div className="hero-section-original">
            <h1 className="hero-title">Jurnal Kesehatan</h1>
          </div>
          {renderJurnalContent()}
        </>
      )}
    </>
  );
}

export default App;
