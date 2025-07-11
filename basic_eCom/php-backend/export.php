<?php
require_once __DIR__ . '/db.php';

$tables = ['users', 'items', 'cart'];
$data = [];

foreach ($tables as $table) {
    $result = $conn->query("SELECT * FROM `$table`");
    if ($result) {
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $data[$table] = $rows;
    } else {
        $data[$table] = ['error' => $conn->error];
    }
}

$conn->close();

$vuePublicPath = __DIR__ . '/../basic-ecom/public/data.json';

file_put_contents($vuePublicPath, json_encode($data, JSON_PRETTY_PRINT));

echo "Data exported to: $vuePublicPath\n";
