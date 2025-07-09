<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Aa Parfum</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header role="banner">
  <div class="header-container">
    <a href="index.php" class="logo" aria-label="Logo Aa Parfum">
    <img src="/images/logo.png" alt="Logo Aa Parfum" class="logo-img">
    </a>
    <nav role="navigation" aria-label="Primary Navigation">
      <ul class="nav-links">
        <li><a href="index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Beranda</a></li>
        <li><a href="about.php" class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">Tentang Kami</a></li>
        <li><a href="products.php" class="<?= ($currentPage == 'products.php') ? 'active' : '' ?>">Produk</a></li>
        <li><a href="lacak.php" class="<?= ($currentPage == 'lacak.php') ? 'active' : '' ?>">Lacak Pesanan</a></li>
      </ul>

      <button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle menu">
        <span class="material-icons">menu</span>
      </button>

      <div class="mobile-nav" id="mobile-menu" tabindex="-1">
        <a href="index.php">Beranda</a>
        <a href="about.php">Tentang Kami</a>
        <a href="products.php">Produk</a>
        <a href="lacak.php">Lacak pesanan</a>
      </div>
    </nav>

    <div class="cart-icon">
      <a href="keranjang.php" class="nav-cart <?= ($currentPage == 'keranjang.php') ? 'active' : '' ?>">
        <span class="material-icons">shopping_cart</span>
        <span id="cart-counter" class="cart-badge">0</span>
      </a>
    </div>
  </div>
</header>

<script src="js/main.js"></script>

</body>
</html>