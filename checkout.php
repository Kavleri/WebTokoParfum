<?php
include_once __DIR__ . '/header.php';
?>
<link rel="stylesheet" href="css/style.css">

<div class="checkout-header">
    <h2>Checkout</h2>
</div>

<section id="checkout" class="checkout-section" aria-label="Form dan ringkasan checkout">
    <div class="checkout-container">
        <div class="form-column">
            <p id="checkout-desc">Lengkapi data berikut untuk menyelesaikan pesanan Anda.</p>
            
            <form class="checkout-form" id="checkout-form" novalidate>
                <label for="customer-name">Nama Lengkap</label>
                <input id="customer-name" name="customerName" type="text" required autocomplete="name" />
                
                <label for="customer-phone">Nomor Telepon</label>
                <input id="customer-phone" name="phone" type="tel" required autocomplete="tel" />
                
                <label for="customer-address">Alamat Pengiriman</label>
                <input id="customer-address" name="address" type="text" required autocomplete="street-address" />
                
                <label for="payment-method">Metode Pembayaran</label>
                <select id="payment-method" name="paymentMethod" required>
                    <option value="" disabled selected>Pilih metode pembayaran</option>
                    <option value="cod">Bayar di Tempat (COD)</option>
                    <option value="bank">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
                
                <button type="submit" aria-label="Selesaikan pesanan">Pesan Sekarang</button>
            </form>
        </div>

        <aside class="summary-column">
            <div class="order-summary">
                <h3>Ringkasan Pesanan</h3>
                <div id="summary-items-container">
                    </div>
                <div class="summary-total-section">
                    <h4>Total Pesanan</h4>
                    <span id="summary-grand-total">Rp 0</span>
                </div>
            </div>
        </aside>
    </div>
</section>

<script src="js/checkout.js"></script>

<?php
include_once __DIR__ . '/footer.php';
?>