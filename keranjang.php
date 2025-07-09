<?php 
include_once __DIR__ . '/header.php'; 
?>

<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />

<div class="page-container">
    <div class="cart-page-header">
        <h1>Keranjang Belanja</h1>
    </div>

    <main class="full-width-cart">

        <div id="cart-empty-message" class="cart-empty" style="display: none;">
            <span class="material-icons cart-empty-icon">shopping_cart</span>
            <h2>Keranjang Anda Kosong</h2>
            <p>Ayo jelajahi produk terbaik kami dan temukan aroma favoritmu!</p>
            <a href="products.php" class="btn-primary">Mulai Belanja</a>
        </div>

        <div id="cart-container" class="cart-container" style="display: none;">
            
            <div class="cart-table-header">
                <div class="header-product">
                    <input type="checkbox" id="select-all-checkbox-header" class="cart-checkbox">
                    <label for="select-all-checkbox-header">Produk</label>
                </div>
                <div class="header-price">Harga Satuan</div>
                <div class="header-quantity">Kuantitas</div>
                <div class="header-total">Total Harga</div>
                <div class="header-action">Aksi</div>
            </div>

            <div id="cart-item-list" class="cart-item-list">
                </div>

            <div class="cart-footer-actions">
                <div class="footer-left">
                    <input type="checkbox" id="select-all-checkbox-footer" class="cart-checkbox">
                    <label for="select-all-checkbox-footer">Pilih Semua</label>
                    <button id="delete-selected-btn" disabled>Hapus</button>
                </div>
                <div class="footer-right">
                    <div class="total-summary">
                        <span>Total (<span id="total-selected-count">0</span> Produk):</span>
                        <span class="total-price" id="grand-total-price">Rp 0</span>
                    </div>
                    <button id="checkout-button" class="btn-checkout" disabled>Checkout</button>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="js/keranjang.js"></script>
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