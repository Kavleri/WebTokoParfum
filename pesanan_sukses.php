<?php
include_once __DIR__ . '/header.php';

$tracking_id = '';
if (isset($_GET['tracking_id'])) {
    $tracking_id = htmlspecialchars($_GET['tracking_id']);
}
?>
<link rel="stylesheet" href="css/style.css">
<style>
    .success-container { text-align: center; max-width: 600px; margin: 50px auto; padding: 40px; background: #fff; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
    .success-container h1 { color: #28a745; }
    .tracking-info { margin: 20px 0; background: #f4f5f7; padding: 15px; border-radius: 8px; }
    .tracking-info span { font-size: 1.5em; font-weight: bold; color: #333; letter-spacing: 2px; }
    #copy-btn { margin-left: 10px; background: #eee; border: 1px solid #ccc; padding: 5px 10px; border-radius: 4px; cursor: pointer; }
</style>

<div class="page-container">
    <div class="success-container">
        <h1>Pesanan Berhasil Dibuat!</h1>
        <p>Terima kasih telah berbelanja. Pesanan Anda akan segera kami proses.</p>
        <p>Mohon simpan nomor pelacakan Anda:</p>
        
        <div class="tracking-info">
            <span id="tracking-number"><?= $tracking_id ?></span>
            <button id="copy-btn">Salin</button>
        </div>

        <p>Anda bisa melacak status pesanan Anda kapan saja melalui halaman pelacakan.</p>
        <a href="lacak.php?tracking_number=<?= $tracking_id ?>" class="btn-primary">Lacak Pesanan Sekarang</a>
    </div>
</div>

<script>
document.getElementById('copy-btn').addEventListener('click', function() {
    const trackingNumber = document.getElementById('tracking-number').textContent;
    navigator.clipboard.writeText(trackingNumber).then(() => {
        alert('Nomor pelacakan berhasil disalin!');
    }, (err) => {
        alert('Gagal menyalin. Mohon salin secara manual.');
    });
});
</script>

<?php include_once __DIR__ . '/footer.php'; ?>