<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $userId = User::query()->value('id');

        if (! $userId) {
            return;
        }

        $pages = [
            [
                'title' => 'Jasa Edit PDF',
                'slug' => 'jasa-edit-pdf',
                'icon' => '📝',
                'home_order' => 1,
                'is_featured' => true,
                'icon_style' => 'icon-purple',
                'show_on_home' => true,
                'show_in_footer' => true,
                'footer_order' => 1,
                'excerpt' => 'Edit teks, gambar, tanda tangan, nomor halaman, watermark, dan layout dokumen PDF dengan cepat dan rapi.',
                'highlights' => ['Edit Teks', 'Edit Teks Typo', 'Tanda Tangan', 'Layout'],
            ],
            [
                'title' => 'Edit Teks PDF',
                'slug' => 'jasa-edit-teks-pdf',
                'icon' => '✏️',
                'home_order' => 2,
                'show_on_home' => true,
                'excerpt' => 'Ubah atau perbaiki teks di dokumen PDF hasil scan maupun digital dengan rapi dan akurat.',
            ],
            [
                'title' => 'Jasa Scan PDF',
                'slug' => 'jasa-scan-pdf',
                'icon' => '📸',
                'home_order' => 3,
                'show_on_home' => true,
                'show_in_footer' => true,
                'footer_order' => 2,
                'excerpt' => 'Layanan scan dokumen menjadi file PDF berkualitas tinggi, bersih, dan siap pakai.',
            ],
            [
                'title' => 'Scan Foto ke PDF',
                'slug' => 'jasa-scan-foto-ke-pdf',
                'icon' => '🖼️',
                'home_order' => 4,
                'is_featured' => true,
                'icon_style' => 'icon-blue',
                'show_on_home' => true,
                'excerpt' => 'Foto dokumen kamu jadi PDF yang bersih, tajam, dan profesional. Hilangkan bayangan, perbaiki kecerahan & kelurusan.',
                'highlights' => ['Perbaiki Blur', 'Hapus Bayangan', 'OCR Teks', 'Gabung PDF'],
            ],
            [
                'title' => 'Bikin Makalah',
                'slug' => 'jasa-bikin-makalah',
                'icon' => '📚',
                'home_order' => 5,
                'is_featured' => true,
                'icon_style' => 'icon-pink',
                'show_on_home' => true,
                'show_in_footer' => true,
                'footer_order' => 3,
                'excerpt' => 'Makalah, laporan, essay, dan karya tulis dibantu dari awal sampai selesai. Untuk siswa SMP/SMA maupun mahasiswa.',
                'highlights' => ['Makalah', 'Laporan', 'Essay', 'SMP / SMA', 'Kampus'],
            ],
            [
                'title' => 'Makalah Kuliah',
                'slug' => 'jasa-makalah-kuliah',
                'icon' => '🎓',
                'home_order' => 6,
                'show_on_home' => true,
                'excerpt' => 'Jasa pembuatan makalah kuliah sesuai format kampus, lengkap dengan daftar pustaka dan sitasi.',
            ],
            [
                'title' => 'Hapus Watermark',
                'slug' => 'jasa-hapus-watermark-pdf',
                'icon' => '🚫',
                'home_order' => 7,
                'show_on_home' => true,
                'excerpt' => 'Hapus watermark PDF dengan hasil rapi tanpa merusak kualitas dokumen asli.',
            ],
            [
                'title' => 'Tanda Tangan',
                'slug' => 'jasa-tanda-tangan-pdf',
                'icon' => '✍️',
                'home_order' => 8,
                'show_on_home' => true,
                'excerpt' => 'Tambahkan tanda tangan digital ke dokumen PDF dengan penempatan yang presisi dan profesional.',
            ],
            [
                'title' => 'PDF ke Word',
                'slug' => 'jasa-convert-pdf-ke-word',
                'icon' => '📄',
                'home_order' => 9,
                'show_on_home' => true,
                'excerpt' => 'Konversi PDF ke Word tanpa berantakan — format, tabel, dan teks tetap rapi.',
            ],
            [
                'title' => 'Gabung PDF',
                'slug' => 'jasa-gabung-pdf',
                'icon' => '📎',
                'home_order' => 10,
                'show_on_home' => true,
                'excerpt' => 'Gabungkan banyak file PDF menjadi satu dokumen utuh dengan urutan yang kamu inginkan.',
            ],
            [
                'title' => 'Compress PDF',
                'slug' => 'jasa-compress-pdf',
                'icon' => '🗜️',
                'home_order' => 11,
                'show_on_home' => true,
                'excerpt' => 'Perkecil ukuran file PDF tanpa membuat dokumen menjadi buram atau tidak terbaca.',
            ],
            [
                'title' => 'Buat CV',
                'slug' => 'jasa-buat-cv',
                'icon' => '💼',
                'home_order' => 12,
                'show_on_home' => true,
                'excerpt' => 'Jasa pembuatan CV profesional dan ATS-friendly untuk melamar kerja.',
            ],
            [
                'title' => 'Edit Dokumen',
                'slug' => 'jasa-edit-dokumen',
                'icon' => '🗂️',
                'home_order' => 13,
                'show_on_home' => true,
                'excerpt' => 'Layanan edit dokumen digital untuk berbagai kebutuhan administrasi dan akademik.',
            ],
            [
                'title' => 'Edit Dokumen Word',
                'slug' => 'jasa-edit-dokumen-word',
                'icon' => '📝',
                'home_order' => 14,
                'show_on_home' => true,
                'excerpt' => 'Rapikan format, tabel, heading, dan layout dokumen Word agar terlihat profesional.',
            ],
            [
                'title' => 'Harga Layanan',
                'slug' => 'harga-jasa-edit-dokumen',
                'icon' => '💰',
                'home_order' => 15,
                'show_on_home' => true,
                'excerpt' => 'Daftar harga transparan untuk seluruh layanan edit dokumen, PDF, scan, dan makalah.',
            ],
            [
                'title' => 'Pembuatan CV',
                'slug' => 'jasa-pembuatan-cv',
                'icon' => '💼',
                'home_order' => 16,
                'show_on_home' => true,
                'excerpt' => 'CV profesional dibuat sesuai standar rekrutmen modern dan ATS-friendly.',
            ],
            [
                'title' => 'Surat Lamaran',
                'slug' => 'jasa-pembuatan-surat-lamaran',
                'icon' => '📨',
                'home_order' => 17,
                'show_on_home' => true,
                'excerpt' => 'Jasa pembuatan surat lamaran kerja dan cover letter yang menarik perhatian HRD.',
            ],
            [
                'title' => 'Surat Resmi',
                'slug' => 'jasa-pembuatan-surat-resmi',
                'icon' => '📋',
                'home_order' => 18,
                'show_on_home' => true,
                'excerpt' => 'Pembuatan surat resmi, permohonan, dan dokumen administrasi dengan format yang benar.',
            ],
            [
                'title' => 'Daftar Pustaka',
                'slug' => 'jasa-merapikan-daftar-pustaka',
                'icon' => '📚',
                'home_order' => 19,
                'show_on_home' => true,
                'excerpt' => 'Rapikan daftar pustaka skripsi, tesis, dan makalah sesuai gaya sitasi kampus.',
            ],
            [
                'title' => 'Jasa Parafrase',
                'slug' => 'jasa-parafrase',
                'icon' => '🔄',
                'home_order' => 20,
                'show_on_home' => true,
                'excerpt' => 'Parafrase teks akademik dan dokumen dengan bahasa yang natural dan tetap bermakna.',
            ],
            [
                'title' => 'Publikasi Jurnal',
                'slug' => 'jasa-publikasi-jurnal',
                'icon' => '📓',
                'home_order' => 21,
                'show_on_home' => true,
                'show_in_footer' => true,
                'footer_order' => 4,
                'excerpt' => 'Bantuan publikasi jurnal ilmiah dari penyusunan naskah hingga persiapan submit.',
            ],
        ];

        foreach ($pages as $index => $data) {
            $highlights = $data['highlights'] ?? null;
            unset($data['highlights']);

            Page::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, [
                    'user_id' => $userId,
                    'body' => '<p>Selamat datang di halaman <strong>'.$data['title'].'</strong>. '.$data['excerpt'].'</p><p>Chat WhatsApp kami untuk konsultasi gratis dan pemesanan layanan.</p>',
                    'status' => 'published',
                    'highlights' => $highlights,
                    'published_at' => now()->subDays($index),
                ])
            );
        }
    }
}
