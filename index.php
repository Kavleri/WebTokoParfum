<?php
include_once __DIR__ . '/header.php';
?>

<style>
    .hero-banner-content {
        transition: opacity 0.4s ease-in-out;
    }
    .fade-out {
        opacity: 0;
    }
</style>

<section class="hero-banner-main">
    <div class="hero-banner-content">
        <h1 id="hero-headline"></h1>
        <p id="hero-subtext"></p>
        <a href="products.php" class="btn-primary">Jelajahi Koleksi Kami</a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const heroBanner = document.querySelector('.hero-banner-main');
    const headlineElement = document.getElementById('hero-headline');
    const subtextElement = document.getElementById('hero-subtext');

    if (!heroBanner || !headlineElement || !subtextElement) {
        console.error('Salah satu elemen penting untuk slider tidak ditemukan!');
        return; 
    }

    const slides = [
        {
            image: 'images/pendukung3.jpg',
            headline: 'Seni Aroma, Terinspirasi dari Anda',
            subtext: 'Setiap botol parfum kami adalah sebuah cerita. Temukan aroma yang mendefinisikan kepribadian unik Anda bersama kami.'
        },
        {
            image: 'images/pendukung1.jpg',
            headline: 'Kualitas Terbaik, Aroma Tahan Lama',
            subtext: 'Lebih dari sekadar wewangian, setiap semprotan adalah ritual pribadi yang membangkitkan kepercayaan diri dan meninggalkan kesan mendalam.'
        },
        {
            image: 'images/pendukung2.jpg',
            headline: 'Desain Botol yang Elegan',
            subtext: 'Kami memadukan seni pembuatan parfum dengan desain botol yang memukau. Sebuah karya seni yang indah untuk dipajang, dengan keharuman yang lebih indah untuk dikenakan.'
        }
    ];

    let currentIndex = 0;
    function changeSlide() {
        heroBanner.querySelector('.hero-banner-content').classList.add('fade-out');

        setTimeout(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            const newSlide = slides[currentIndex];

            heroBanner.style.backgroundImage = `url('${newSlide.image}')`;
            headlineElement.textContent = newSlide.headline;
            subtextElement.textContent = newSlide.subtext;

            heroBanner.querySelector('.hero-banner-content').classList.remove('fade-out');
        }, 500);
    }

    const initialSlide = slides[currentIndex];
    heroBanner.style.backgroundImage = `url('${initialSlide.image}')`;
    headlineElement.textContent = initialSlide.headline;
    subtextElement.textContent = initialSlide.subtext;

    setInterval(changeSlide, 5000);
});
</script>
<script>
  document.addEventListener('contextmenu', event => event.preventDefault());
  document.onkeydown = function(e) {
    if(e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
      return false;
    }
  }
</script>


<?php
include_once __DIR__ . '/footer.php';
?>