# AA Parfum: Aplikasi Web E-commerce Parfum (PHP Native)

[![GitHub license](https://img.shields.io/badge/license-Hak%20Cipta%20Sepenuhnya%20Dilindungi-red.svg)](./LICENSE)

## Pendahuluan

Repositori ini menyajikan kode sumber untuk **AA Parfum**, sebuah aplikasi web e-commerce yang dirancang khusus untuk penjualan produk parfum. Sistem ini dikembangkan secara fundamental menggunakan PHP *native*, tanpa dependensi pada *framework* eksternal. Pendekatan ini dipilih untuk menonjolkan arsitektur inti PHP, memberikan kendali granular atas logika aplikasi, serta mendemonstrasikan kapabilitas pengembangan web mandiri yang optimal.

AA Parfum didedikasikan untuk menyediakan produk parfum berkualitas tinggi dengan aksesibilitas harga, memberdayakan individu untuk mengekspresikan identitas melalui esensi aroma yang memikat dan tahan lama. Komitmen kami terhadap kualitas global dengan akar lokal menjadi landasan filosofi pengembangan ini.

## Fitur Fungsional

Aplikasi ini mengintegrasikan serangkaian fitur esensial untuk sebuah platform e-commerce yang komprehensif:

* **Antarmuka Pengguna Responsif:** Implementasi desain adaptif untuk pengalaman pengguna yang konsisten di berbagai perangkat.
* **Manajemen Katalog Produk:** Tampilan produk yang terstruktur dengan detail deskriptif yang komprehensif.
* **Sistem Keranjang Belanja:** Mekanisme penambahan, penghapusan, dan pengelolaan item dalam keranjang belanja yang intuitif.
* **Proses Pembayaran Streamlined:** Alur *checkout* yang efisien, meminimalkan friksi dalam konversi pembelian.
* **Modul Komunikasi Real-time (Mini Chat):** Fungsionalitas *chat* terintegrasi untuk interaksi langsung antara pengguna dan administrasi.
* **Arsitektur PHP Native:** Pembangunan dari dasar yang memungkinkan optimasi kinerja dan pemahaman menyeluruh terhadap setiap lapisan kode.

## Struktur Direktori

Struktur proyek diorganisir secara logis untuk modularitas dan kemudahan pemeliharaan:
* **images/                 # Direktori untuk aset gambar statis (produk, banner, ikon)**
* **css/                    # Direktori untuk lembar gaya (style.css)**
* **js/                     # Direktori untuk skrip JavaScript klien-sisi**
* **header.php              # Komponen kepala halaman (navigasi, logo)**
* **footer.php              # Komponen kaki halaman (informasi hak cipta, tautan)**
* **index.php               # Modul halaman utama/beranda**
* **about.php               # Modul halaman "Tentang Kami"**
* **products.php            # Modul daftar produk**
* **product_detail.php      # Modul tampilan detail produk individual**
* **cart.php                # Modul manajemen keranjang belanja**
* **checkout.php            # Modul proses pembayaran**
* **contact_form.php        # Modul formulir kontak**
* **LICENSE                 # Dokumen lisensi proyek**
* **README.md               # Dokumen deskripsi proyek ini**

## Panduan Instalasi dan Operasional

Untuk mengimplementasikan aplikasi ini di lingkungan pengembangan atau *staging* lokal:

1.  **Kloning Repositori:**
    ```bash
    git clone [https://github.com/Kavleri/WebTokoParfum.git](https://github.com/Kavleri/WebTokoParfum.git)
    ```
2.  **Penempatan Direktori Aplikasi:**
    Pindahkan direktori `WebTokoParfum` ke *document root* server web Anda (misalnya, `htdocs` untuk Apache/XAMPP, `www` untuk WAMP, atau `/var/www/html` untuk lingkungan Linux).
3.  **Konfigurasi Lingkungan Database (Jika Relevan):**
    Apabila fungsionalitas aplikasi memerlukan persistensi data (seperti katalog produk dinamis, manajemen pengguna, atau sistem pesanan), inisialisasi *database* MySQL/MariaDB dan impor skema yang diperlukan (jika disertakan). Pastikan parameter koneksi *database* diatur dengan tepat dalam file konfigurasi PHP yang relevan (contoh: `config/database.php` atau sejenisnya, jika ada).

    *Catatan: Struktur file yang disediakan mengindikasikan komponen utama aplikasi. Interaksi *database* untuk fungsionalitas seperti katalog produk atau manajemen sesi perlu diimplementasikan dan dikonfigurasi secara independen sesuai kebutuhan Anda.*
4.  **Akses Aplikasi:**
    Aplikasi dapat diakses melalui *browser* web Anda dengan menavigasi ke `http://localhost/WebTokoParfum/` atau URL yang sesuai dengan konfigurasi *virtual host* Anda.

## Jaminan Keamanan & Integritas Kode

Pengembangan aplikasi ini mengadopsi praktik terbaik dalam *secure coding* PHP *native* untuk memitigasi kerentanan umum. Implementasi mencakup:

* **Pencegahan SQL Injection:** Seluruh interaksi dengan *database* memanfaatkan *prepared statements* untuk memisahkan *query* SQL dari *input* data, secara efektif menihilkan risiko injeksi SQL.
* **Mitigasi Cross-Site Scripting (XSS):** Semua *output* yang berasal dari *input* pengguna akan melalui proses *escaping* menggunakan fungsi `htmlspecialchars()` untuk mencegah eksekusi skrip berbahaya di sisi klien.
* **Perlindungan Cross-Site Request Forgery (CSRF):** Mekanisme *anti-CSRF token* diimplementasikan pada formulir-formulir kritis untuk memvalidasi legitimasi setiap permintaan HTTP.
* **Manajemen Autentikasi Robust:** Penggunaan algoritma *hashing* modern (misalnya `PASSWORD_BCRYPT`) dengan *salt* unik untuk penyimpanan *password*, serta pembatasan percobaan *login* untuk mereduksi risiko *brute-force*.

Meskipun fondasi kode telah dirancang dengan memperhatikan keamanan, keberlanjutan integritas sistem secara keseluruhan juga bergantung pada:
* Pembaruan rutin versi PHP dan komponen server terkait.
* Penerapan *server-side validation* yang ketat pada seluruh *input* pengguna.
* Enkripsi komunikasi melalui HTTPS/SSL/TLS di lingkungan *production*.
* Pemilihan infrastruktur *hosting* yang memiliki fitur keamanan, pemantauan aktif, dan reputasi yang teruji.

## Hak Cipta & Lisensi

© 2025 Muhammad Hisyam. Semua Hak Cipta Dilindungi Undang-Undang.

Aplikasi web ini beserta seluruh kode sumber, desain, dan konten terkait merupakan kekayaan intelektual pribadi dan dilindungi sepenuhnya di bawah undang-undang hak cipta yang berlaku.

**Seluruh hak cipta dan kepemilikan atas proyek ini secara eksklusif berada pada Kavleri.**

Repositori ini bersifat publik untuk tujuan inspeksi dan referensi non-komersial. Namun, penggunaan, reproduksi, modifikasi, distribusi, penjualan, atau eksploitasi dalam bentuk apa pun, baik untuk tujuan komersial maupun non-komersial, **tanpa izin tertulis** dari pemegang hak cipta, **dilarang keras**.

Informasi lebih lanjut mengenai syarat dan ketentuan hak cipta dapat ditemukan di file `LICENSE`.

---

## Kontak

Untuk pertanyaan, kolaborasi, atau izin penggunaan khusus, silakan hubungi melalui:

* **Situs Web:** `https://myweb2.wuaze.com`
* **Email:** `aaparfumofficialstore@gmail.com` 

---

<i>Catatan: Repositori ini sepenuhnya belum mewakili seluruh file dalam website, demi mencegah dari terjadinya kebocoran data pribadi </i>
