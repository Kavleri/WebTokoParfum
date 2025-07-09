<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tes Koneksi Database</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { max-width: 600px; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 8px; }
        .success { color: #28a745; font-weight: bold; }
        .error { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hasil Tes Koneksi Database</h1>
        <?php
        include_once 'config.php';

        if (isset($conn)) {
            if ($conn->connect_error) {
                echo "<p class='error'>KONEKSI GAGAL! Berikut pesan errornya:</p>";
                echo "<p><strong>" . htmlspecialchars($conn->connect_error) . "</strong></p>";
                echo "<hr>";
                echo "<p><strong>Solusi:</strong> Silakan periksa kembali detail hostname, username, password, dan nama database di dalam file <strong>config.php</strong> Anda. Pastikan semuanya sama persis dengan yang ada di Client Area InfinityFree.</p>";
            } else {
                echo "<p class='success'>SELAMAT! Koneksi ke database berhasil.</p>";
                echo "<hr>";
                echo "<p>Sekarang, mari kita cek apakah tabel `chat_messages` ada...</p>";

                $result = $conn->query("SHOW TABLES LIKE 'chat_messages'");
                if ($result && $result->num_rows == 1) {
                    echo "<p class='success'>Tabel 'chat_messages' juga berhasil ditemukan!</p>";
                    echo "<p>Jika semua tes ini berhasil tapi pesan tetap tidak muncul, berarti ada masalah pada script `kirim_pesan.php`.</p>";
                } else {
                    echo "<p class='error'>KONEKSI BERHASIL, tapi tabel `chat_messages` tidak ditemukan.</p>";
                    echo "<p><strong>Solusi:</strong> Buka phpMyAdmin, hapus tabel `messages` yang lama (jika ada), dan jalankan kembali kode SQL untuk membuat tabel `chat_messages` dari instruksi saya sebelumnya.</p>";
                }
            }
            $conn->close();
        } else {
            echo "<p class='error'>Variabel koneksi (\$conn) tidak ditemukan. Ini berarti ada masalah saat memuat file `config.php`.</p>";
        }
        ?>
    </div>
</body>
</html>