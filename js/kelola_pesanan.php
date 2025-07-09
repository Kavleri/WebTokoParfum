<?php include_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pesanan</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f5f7; margin: 20px; }
        .container { max-width: 1000px; margin: auto; }
        .order { background: #fff; border-radius: 8px; margin-bottom: 20px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .order h3 { margin-top: 0; }
        .status-update-form { margin-top: 15px; display: flex; gap: 10px; }
        .status-update-form input { flex-grow: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .status-update-form button { background: #0052cc; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Pesanan Masuk</h1>
        <?php
        $result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");
        if ($result && $result->num_rows > 0) {
            while($order = $result->fetch_assoc()) {
                $customer = json_decode($order['customer_details'], true);
                $history = json_decode($order['status_history'], true);
                $last_status = end($history);
                echo "<div class='order'>";
                echo "<h3>Pesanan #" . htmlspecialchars($order['tracking_number']) . "</h3>";
                echo "<p><strong>Pelanggan:</strong> " . htmlspecialchars($customer['name']) . " (" . htmlspecialchars($customer['phone']) . ")</p>";
                echo "<p><strong>Status Terakhir:</strong> " . htmlspecialchars($last_status['desc']) . "</p>";
                echo '<h4>Update Status Pesanan:</h4>';
                echo '<form action="proses_update.php" method="POST">';
                echo '<input type="hidden" name="order_id" value="' . $order['id'] . '">';
                echo '<div class="status-update-form">';
                echo '<input type="text" name="status_desc" placeholder="Contoh: Paket telah sampai di gudang Surabaya" required>';
                echo '<button type="submit">Update Status</button>';
                echo '</div>';
                echo '</form>';
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada pesanan.</p>";
        }
        ?>
    </div>
</body>
</html>