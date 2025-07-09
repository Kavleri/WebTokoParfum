<?php
include_once __DIR__ . '/header.php';

$products = [
    [
        'id'    => 1,
        'name'  => 'Parfum Aroma Madinah',
        'price' => 40000,
        'original_price' => 50000,
        'image' => 'images/parfum4.jpg',
        'desc'  => 'Keharuman Spiritual yang Menenangkan Hati. Hadirkan kedamaian dan ketenangan dalam setiap semprotan dengan "Madinah". Parfum ini memancarkan keharuman lembut yang membangkitkan rasa khusyuk dan ketenangan jiwa. Dengan longevity yang menemani Anda, "Madinah" adalah esensi spiritual yang tahan lama dan memberikan sentuhan lembut yang mendamaikan. Garansi kepuasan.'
    ],
    [
        'id'    => 2,
        'name'  => 'Stok Kosong',
        'price' => 0,
        'image' => 'Belum dimasukkan',
        'desc'  => 'Kosong'
    ],
    [
        'id'    => 3,
        'name'  => 'Stok Kosong',
        'price' => 0,
        'image' => 'Belum dimasukkan',
        'desc'  => 'Kosong'
    ],
    [
        'id'    => 4,
        'name'  => 'Stok Kosong',
        'price' => 0,
        'image' => 'Belum Dimasukkan',
        'desc'  => 'Kosong'
    ],
    [
        'id'    => 5,
        'name'  => 'Parfum Aroma Kiswah',
        'price' => 40000,
        'original_price' => 50000,
        'image' => 'images/parfum6.jpg',
        'desc'  => 'Aura Keagungan yang Memikat. Terinspirasi dari kesucian dan kemewahan, "Kiswah" hadir dengan keharuman lembut yang membalut Anda dalam aura yang kharismatik. Dengan longevity 6-8 jam, parfum ini menemani hari Anda dengan kelembutan yang tak terlupakan. Rasakan sentuhan halus yang berkelas, sebuah representasi elegan dari keharuman yang tahan lama. Garansi kepuasan.'
    ],
    [
        'id'    => 6,
        'name'  => 'Parfum Aroma Blue Emotion',
        'price' => 40000,
        'original_price' => 50000,
        'image' => 'images/parfum7.jpg',
        'desc'  => 'Ekspresi Kebebasan yang Menyegarkan. Selami kesegaran tak terbatas dengan "Blue Emotion". Keharuman lembutnya membangkitkan semangat dan meninggalkan jejak yang menyegarkan. Dirancang untuk Anda yang berjiwa bebas, parfum ini memiliki daya tahan 6-8 jam, memastikan Anda tetap percaya diri sepanjang hari. Sebuah esensi lembut yang tahan lama, mewakili keanggunan yang menyegarkan. Garansi kepuasan.'
    ],
    [
        'id'    => 7,
        'name'  => 'Parfum Aroma Baccarat',
        'price' => 40000,
        'original_price' => 50000,
        'image' => 'images/parfum8.jpg',
        'desc'  => 'Kemewahan Ikonik dalam Setiap Semprotan. Rasakan aura kemewahan yang abadi dengan "Baccarat". Terinspirasi dari keanggunan yang tak lekang oleh waktu, parfum ini memancarkan keharuman lembut yang sophisticated dan memikat. Dengan daya tahan 6-8 jam, "Baccarat" adalah simbol status dan elegansi yang tahan lama. Nikmati sentuhan mewah yang lembut dan berkelas. Garansi kepuasan.'
    ],
    [
        'id'    => 8,
        'name'  => 'Parfum Women',
        'price' => 40000,
        'original_price' => 50000,
        'image' => 'images/parfum9.jpg',
        'desc'  => 'Esensi Keanggunan Feminin yang Abadi. Rayakan keindahan dan kekuatan feminitas dengan "Women". Parfum ini menghadirkan keharuman lembut yang mempesona dan meninggalkan jejak elegan yang tak terlupakan. Dengan longevity 6-8 jam, "Women" adalah representasi sempurna dari keanggunan yang tahan lama dan memikat. Rasakan sentuhan lembut yang berkelas. Garansi kepuasan.'
    ],
    [
        'id'    => 9,
        'name'  => 'Parfum Aigner In Leather',
        'price' => 40000,
        'original_price' => 50000,
        'image' => 'images/parfum5.jpg',
        'desc'  => 'Sentuhan Klasik dengan Kehangatan yang Mewah. Nikmati perpaduan sempurna antara tradisi dan kemewahan dengan "Aigner In Leather". Keharuman lembutnya membangkitkan rasa percaya diri dan kehangatan yang tak tertandingi. Dengan daya tahan 6-8 jam, parfum ini adalah pilihan ideal bagi Anda yang menghargai kualitas dan keanggunan klasik yang tahan lama. Rasakan sentuhan lembut yang berkarakter. Garansi kepuasan.'
    ],
];
?>
<link rel="stylesheet" href="css/style.css">

<section class="product-header-banner">
    <div class="banner-content">
        <h2 class="page-title">AA Parfum</h2>
        <div class="title-divider"></div>
        <p class="page-description">
            Setiap parfum kami diracik dari bahan-bahan berkualitas tinggi untuk menghasilkan wangi yang mewah, unik, dan tahan lama. Temukan aroma yang paling sesuai dengan kepribadian Anda dari koleksi terbaik kami.
        </p>
    </div>
</section>

<main class="product-page-container">
    <div class="product-listing">
        <?php foreach ($products as $product) : ?>
            <div class="product-list-item">
                <img class="product-list-img" src="<?= htmlspecialchars($product['image']) ?>" alt="Botol <?= htmlspecialchars($product['name']) ?>"/>
                <div class="product-list-details">
                    <h3 class="product-list-name"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="product-list-desc"><?= htmlspecialchars($product['desc']) ?></p>
                    <div class="product-price-container">
                        <?php if (isset($product['original_price'])) : ?>
                            <span class="original-price">Rp <?= number_format($product['original_price']) ?></span>
                            <span class="sale-price">Rp <?= number_format($product['price']) ?></span>
                        <?php else : ?>
                            <span class="normal-price">Rp <?= number_format($product['price']) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-list-actions">
                        <button class="add-to-cart-btn" 
                            data-id="<?= htmlspecialchars($product['id']) ?>"
                            data-name="<?= htmlspecialchars($product['name']) ?>"
                            data-price="<?= $product['price'] ?>"
                            data-image="<?= htmlspecialchars($product['image']) ?>"
                            onclick="addToCart(this)">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script src="js/products.js"></script>
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