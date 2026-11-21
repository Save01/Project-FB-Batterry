<?php
require_once __DIR__ . '/config.php';
$db = getDB();

$testCases = [
    ['brand_id' => 1, 'model' => 'Fortuner', 'name' => 'Toyota Fortuner'],
    ['brand_id' => 2, 'model' => 'Civic FD', 'name' => 'Honda Civic FD'],
    ['brand_id' => 8, 'model' => 'Ranger', 'name' => 'Ford Ranger'],
];

foreach ($testCases as $tc) {
    $vModel = trim($tc['model']);
    $stmtRec = $db->prepare("
        SELECT p.*, bb.name AS brand_name,
            CASE WHEN MIN(rp.id) IS NOT NULL THEN 1 ELSE 0 END AS is_recommended,
            COALESCE(MIN(rp.priority), 99) AS priority_order
        FROM products p
        LEFT JOIN battery_brands bb ON p.battery_brand_id = bb.id
        LEFT JOIN recommended_products rp ON p.id = rp.product_id AND rp.car_brand_id = ? AND (rp.car_model = ? OR rp.car_model IS NULL OR ? LIKE CONCAT('%', rp.car_model, '%') OR rp.car_model LIKE CONCAT('%', ?, '%')) AND rp.is_active = 1
        LEFT JOIN product_compatibility pc ON p.id = pc.product_id AND pc.car_brand_id = ? AND (pc.car_model = ? OR pc.car_model IS NULL OR ? LIKE CONCAT('%', pc.car_model, '%') OR pc.car_model LIKE CONCAT('%', ?, '%'))
        WHERE p.status = 'active' AND p.quantity > 0
            AND (rp.id IS NOT NULL OR pc.id IS NOT NULL)
        GROUP BY p.id
        ORDER BY is_recommended DESC, priority_order ASC, p.price ASC
    ");
    $stmtRec->execute([
        $tc['brand_id'], $vModel, $vModel, $vModel,
        $tc['brand_id'], $vModel, $vModel, $vModel
    ]);
    $prods = $stmtRec->fetchAll();
    echo "\nVehicle: {$tc['name']} -> " . count($prods) . " distinct recommendations:\n";
    foreach ($prods as $p) {
        echo "   • [ID {$p['id']}] {$p['name']} ({$p['price']} บาท)\n";
    }
}
