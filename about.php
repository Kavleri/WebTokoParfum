<?php
$customPageTitle = "Tentang Kami"; 
include_once 'header.php';
?>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
<section class="about-hero-banner">
    <div class="banner-content">
        <h1 class="page-title">Tentang AA Parfum</h1>
        <div class="title-divider"></div>
        <p class="page-description">
            Kami adalah brand parfum lokal yang berdedikasi untuk menghadirkan aroma berkualitas tinggi dengan harga yang tetap terjangkau.
        </p>
    </div>
</section>

<section class="about-section content-block">
    <div class="about-intro">
        <h2>Selamat Datang di AA Parfum</h2>
        <p>Kami adalah brand parfum lokal yang berdedikasi untuk menghadirkan aroma berkualitas tinggi dengan harga yang tetap terjangkau. AA Parfum hadir sebagai solusi bagi Anda yang ingin tampil percaya diri, elegan, dan berkelas melalui wangi yang tahan lama dan memikat.</p>
    </div>

    <div class="about-vision-mission">
        <div class="vision-text">
            <h2>Kami Percaya, Wangi Adalah Identitas</h2>
            <p>Aroma bukan hanya sekadar harum — aroma menciptakan kesan, membangun suasana, dan merepresentasikan kepribadian Anda. Oleh karena itu, kami meracik parfum dengan bahan-bahan berkualitas, konsentrasi essence tinggi, serta inspirasi dari parfum-parfum internasional yang telah teruji waktu.</p>
            <p>"Wangi yang Mewakili Karaktermu"</p>
        </div>
        <div class="vision-image">
            <img src="/images/parfum_about_vision.jpg" alt="Visi Kami" loading="lazy"> </div>
    </div>

    <div class="why-choose-us content-block">
        <h2>Kenapa Memilih AA Parfum?</h2>
        <div class="features-grid">
            <div class="feature-item">
                <span class="material-icons">spa</span> <h3>Essence Premium Tahan Lama</h3>
                <p>Kami menggunakan bahan berkualitas tinggi dan teknik formulasi yang tepat agar parfum kami bertahan lama di kulit maupun pakaian.</p>
            </div>
            <div class="feature-item">
                <span class="material-icons">palette</span> <h3>Aroma Beragam & Unik</h3>
                <p>Tersedia berbagai varian aroma untuk pria, wanita, maupun unisex — mulai dari yang segar, floral, maskulin, hingga aroma musky dan elegan.</p>
            </div>
            <div class="feature-item">
                <span class="material-icons">attach_money</span> <h3>Harga Bersahabat</h3>
                <p>Kami percaya bahwa parfum berkualitas tidak harus mahal. Dengan sistem produksi yang efisien, kami bisa memberikan harga terbaik untuk Anda.</p>
            </div>
            <div class="feature-item">
                <span class="material-icons">grade</span> <h3>Dikemas Elegan</h3>
                <p>Setiap produk AA Parfum hadir dengan kemasan eksklusif yang cocok untuk dipakai sendiri maupun diberikan sebagai hadiah.</p>
            </div>
        </div>
    </div>

    <div class="vision-mission-details content-block">
        <div>
            <h2>Visi Kami</h2>
            <p>Menjadi brand parfum lokal yang mampu bersaing secara nasional maupun internasional dengan tetap mengedepankan kualitas, keaslian aroma, dan kepuasan pelanggan.</p>
        </div>
        <div>
            <h2>Misi Kami</h2>
            <ul>
                <li>Menyediakan parfum berkualitas tinggi dengan harga terjangkau.</li>
                <li>Terus berinovasi mengikuti tren aroma dan kebutuhan pasar.</li>
                <li>Memberdayakan produk lokal dengan kualitas global.</li>
                <li>Meningkatkan kepercayaan diri pengguna melalui aroma khas yang merepresentasikan diri mereka.</li>
            </ul>
        </div>
    </div>

    <div class="about-contact-cta content-block">
        <p>Jika Anda ingin konsultasi aroma, pemesanan grosir, atau menjadi reseller, silakan hubungi kami.</p>
        <a href="contact_form.php" class="btn-primary">Hubungi Kami Sekarang</a>
    </div>
</section>

<?php include_once 'footer.php';  ?>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if(e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
        return false;
        }
    }
;
</script>