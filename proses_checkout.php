<?php
include_once __DIR__ . '/config.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['customer']) && isset($data['items']) && !empty($data['items'])) {
    $tracking_number = 'AA-' . strtoupper(substr(uniqid(), -8));

    $customer_details = json_encode($data['customer']);
    $order_items = json_encode($data['items']);
    $total_price = 0;
    foreach ($data['items'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $initial_status = [
        [
            "status" => "Pesanan Diterima",
            "desc" => "Pesanan Anda telah kami terima dan akan segera diproses.",
            "timestamp" => date('Y-m-d H:i:s')
        ]
    ];
    $status_history = json_encode($initial_status);

    $stmt = $conn->prepare("INSERT INTO orders (tracking_number, customer_details, order_items, total_price, status_history) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $tracking_number, $customer_details, $order_items, $total_price, $status_history);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'tracking_number' => $tracking_number]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan pesanan.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
}
?>