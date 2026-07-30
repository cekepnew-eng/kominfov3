<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $journals = [
            [ 'title' => 'Pengalaman Penderita HIV Pada Lelaki Suka Lelaki (LSL): Analisis Kualitatif Tentang Persepsi Diri...', 'author' => 'Dewi Purnamawati' ],
            [ 'title' => 'SELF-EFFICACY AMONG PEOPLE LIVING WITH HIV/AIDS AFTER COVID-19 PANDEMIC', 'author' => 'Dewi Purnamawati' ],
            [ 'title' => 'FAMILY SUPPORT FOR PEOPLE WITH HIV AND AIDS (PLWHA)', 'author' => 'Dewi Purnamawati' ],
            [ 'title' => 'Religiusitas Homoseksual dengan HIV', 'author' => 'Dewi Purnamawati' ],
            [ 'title' => 'Faktor-Faktor Yang Berhubungan Dengan Kepatuhan Minum Obat Pada Pasien Diabetes Melitus Tipe 2...', 'author' => 'Erina Dewy Pramesti' ],
            [ 'title' => 'Hubungan Pengetahuan dan Dukungan Keluarga Terhadap Manajemen Diri Pada Pasien Diabetes...', 'author' => 'Mashiroh Irchanna Hartanti' ],
            [ 'title' => 'ANALISIS KOMUNIKASI INTERPERSONAL KADER DALAM PROGRAM AKSELERASI GERAKAN ELIMINASI...', 'author' => 'Hanna Attaya Putri' ],
            [ 'title' => 'Gambaran Epidemiologi Kasus Campak di Wilayah Kota Bogor Tahun 2022-2024', 'author' => 'Siti Setia Hidiyah Wati' ],
            [ 'title' => 'ANALISIS DETERMINAN STUNTING DI KABUPATEN BOGOR DAN KOTA BOGOR: PENDEKATAN SPASIAL...', 'author' => 'LUKMAN PERDANA SOFYAN' ],
            [ 'title' => 'Efektifitas Buku Audio dalam Meningkatkan Pengetahuan Kesehatan Reproduksi bagi Perempuan...', 'author' => 'Novita Dewi Pramanik' ],
            [ 'title' => 'Hubungan Pola Makan dan Kejadian Hipertensi pada Lansia', 'author' => 'Budi Santoso' ],
            [ 'title' => 'Pemanfaatan Teknologi Informasi Dalam Manajemen Pelayanan Rumah Sakit', 'author' => 'Ahmad Rinaldi' ],
            [ 'title' => 'Tingkat Kepatuhan Penggunaan Masker di Lingkungan Sekolah', 'author' => 'Rina Wijayanti' ],
            [ 'title' => 'Analisis Kebijakan Vaksinasi COVID-19 Pada Anak', 'author' => 'Dwi Handayani' ],
            [ 'title' => 'Dampak Karantina Wilayah Terhadap Kesehatan Mental Remaja', 'author' => 'Arie Pratama' ]
        ];

        foreach ($journals as $j) {
            \App\Models\Journal::create($j);
        }
    }
}
