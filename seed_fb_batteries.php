<?php
require_once __DIR__ . '/config.php';
$db = getDB();

echo "Starting FB Battery migration & recommendation seeding...\n";

// 1. Update battery_brands
$db->exec("UPDATE battery_brands SET name = 'FB Battery' WHERE id = 2");
echo "Updated battery_brands ID 2 to 'FB Battery'\n";

// Ensure all products will use battery_brand_id = 2
$fbBrandId = 2;

// 2. Define the 30 FB Battery products
$products = [
    // --- 10 Existing Products to update (IDs 1-10) ---
    [
        'id' => 1,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-450L (38B19L) Maintenance Free',
        'sku' => 'BAT-FB-S450L',
        'description' => 'แบตเตอรี่กึ่งแห้ง FB S-Series ขนาด 38 Ah, CCA 350 JIS 38B19L ไฟแรง ทนทาน ดูแลง่าย สำหรับรถยนต์อีโคคาร์และซิตี้คาร์',
        'price' => 1650.00,
        'cost_price' => 1200.00,
        'quantity' => 25,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s450l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 2,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-500L (40B19L) High Performance MF',
        'sku' => 'BAT-FB-S500L',
        'description' => 'แบตเตอรี่กึ่งแห้ง FB S-Series ขนาด 40 Ah, CCA 370 JIS 40B19L กำลังสตาร์ทสูง อัพเกรดจากขนาดมาตรฐาน สำหรับรถเก๋ง 1.2 - 1.5 ลิตร',
        'price' => 1800.00,
        'cost_price' => 1300.00,
        'quantity' => 25,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s500l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 3,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-600L (46B24L) Maintenance Free',
        'sku' => 'BAT-FB-S600L',
        'description' => 'แบตเตอรี่กึ่งแห้ง FB S-Series ขนาด 45 Ah, CCA 400 JIS 46B24L สำหรับรถยนต์ขนาดกลาง เช่น Honda Civic, Toyota Altis, Nissan Sylphy',
        'price' => 2100.00,
        'cost_price' => 1550.00,
        'quantity' => 20,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s600l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 4,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-650L (55B24L) High Amp Upgrade',
        'sku' => 'BAT-FB-S650L',
        'description' => 'แบตเตอรี่กึ่งแห้ง FB S-Series ขนาด 50 Ah, CCA 450 JIS 55B24L อัพเกรดแอมป์เต็มพิกัด สำหรับรถเก๋งและคอมแพคเอสยูวีที่ใช้ไฟเยอะ',
        'price' => 2350.00,
        'cost_price' => 1750.00,
        'quantity' => 22,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s650l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 5,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-750L (55D23L) Maintenance Free',
        'sku' => 'BAT-FB-S750L',
        'description' => 'แบตเตอรี่กึ่งแห้ง FB S-Series ขนาด 60 Ah, CCA 500 JIS 55D23L สำหรับรถซีดานขนาดใหญ่และ SUV เช่น Camry, Accord, Teana, CX-5',
        'price' => 2650.00,
        'cost_price' => 1950.00,
        'quantity' => 18,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s750l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 6,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-850L (80D26L) Heavy Duty MF',
        'sku' => 'BAT-FB-S850L',
        'description' => 'แบตเตอรี่กึ่งแห้ง FB S-Series ขนาด 70 Ah, CCA 580 JIS 80D26L รองรับโหลดไฟฟ้าสูง สำหรับเครื่องยนต์ 2.4 - 3.0 ลิตร',
        'price' => 2950.00,
        'cost_price' => 2200.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_s850l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 7,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-1300L (95D31L) Pickup & PPV Power',
        'sku' => 'BAT-FB-S1300L',
        'description' => 'แบตเตอรี่กึ่งแห้งขั้ว L ยอดนิยมสำหรับรถกระบะและ PPV ขนาด 85 Ah, CCA 700 เช่น Vigo, Revo, D-Max, Fortuner, Triton, Navara',
        'price' => 3250.00,
        'cost_price' => 2450.00,
        'quantity' => 20,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s1300l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 8,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB FTZ5S (12V 5Ah) AGM VRLA Motorcycle',
        'sku' => 'BAT-FB-FTZ5S',
        'description' => 'แบตเตอรี่มอเตอร์ไซค์แห้ง FB แท้ AGM VRLA 12V 5Ah, CCA 85 สำหรับ Wave, Scoopy, Click, Fino, Mio, Smash, Demon 125',
        'price' => 550.00,
        'cost_price' => 380.00,
        'quantity' => 30,
        'min_quantity' => 10,
        'image' => 'uploads/products/fb_ftz5s.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ],
    [
        'id' => 9,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB FTZ6V (12V 6Ah) AGM VRLA Scooter & AT',
        'sku' => 'BAT-FB-FTZ6V',
        'description' => 'แบตเตอรี่มอเตอร์ไซค์แห้ง FB แท้ 12V 6Ah, CCA 105 สำหรับ PCX 125/150, Click 150/160, Lead 125, NMAX, Aerox, Vespa 125',
        'price' => 750.00,
        'cost_price' => 520.00,
        'quantity' => 25,
        'min_quantity' => 8,
        'image' => 'uploads/products/fb_ftz6v.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ],
    [
        'id' => 10,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB FTZ7S (12V 7Ah) AGM VRLA Sport & Maxi',
        'sku' => 'BAT-FB-FTZ7S',
        'description' => 'แบตเตอรี่มอเตอร์ไซค์แห้ง FB แท้ 12V 7Ah, CCA 130 สตาร์ทแรงพิเศษ สำหรับ PCX 160, ADV 160, CBR150/250, R15, MT-15, Vespa 150',
        'price' => 950.00,
        'cost_price' => 680.00,
        'quantity' => 25,
        'min_quantity' => 8,
        'image' => 'uploads/products/fb_ftz7s.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ],

    // --- Products IDs 11-30 ---
    [
        'id' => 11,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-500R (40B19R) Standard MF R-Pole',
        'sku' => 'BAT-FB-S500R',
        'description' => 'แบตเตอรี่กึ่งแห้งขั้ว R ขนาด 40 Ah, CCA 370 JIS 40B19R สำหรับ Suzuki Carry, Kia Picanto, รถบรรทุกเล็ก',
        'price' => 1800.00,
        'cost_price' => 1300.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_s500r.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 12,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-1300R (95D31R) Standard Diesel R-Pole',
        'sku' => 'BAT-FB-S1300R',
        'description' => 'แบตเตอรี่กึ่งแห้งขั้ว R ขนาด 85 Ah, CCA 700 JIS 95D31R สำหรับ D-Max รุ่นแรก, Hilux Tiger, Dragon Eye, Big-M',
        'price' => 3250.00,
        'cost_price' => 2450.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_s1300r.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 13,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB S-1500L (115D31L) Super MF Diesel 100Ah',
        'sku' => 'BAT-FB-S1500L',
        'description' => 'แบตเตอรี่ซูเปอร์กึ่งแห้งขนาดใหญ่พิเศษ 100 Ah, CCA 820 JIS 115D31L รองรับเครื่องยนต์ดีเซล 2.8 - 3.2L ทรงพลัง สตาร์ทติดง่ายทุกสภาพอากาศ',
        'price' => 3750.00,
        'cost_price' => 2800.00,
        'quantity' => 18,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_s1500l.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 14,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Gold 55B24L Premium Sealed SMF',
        'sku' => 'BAT-FB-GOLD-55B24L',
        'description' => 'แบตเตอรี่แห้งแท้พรีเมียม FB GOLD SMF ขนาด 52 Ah, CCA 480 ไม่ต้องดูแลน้ำกลั่นตลอดอายุการใช้งาน รับประกันยาวนาน 18 เดือน',
        'price' => 2550.00,
        'cost_price' => 1900.00,
        'quantity' => 20,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_gold_55b24l.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 15,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Gold 65D23L Premium Sealed SMF',
        'sku' => 'BAT-FB-GOLD-65D23L',
        'description' => 'แบตเตอรี่แห้งแท้พรีเมียม FB GOLD SMF ขนาด 65 Ah, CCA 550 ปิดสนิท 100% สำหรับ Camry, Accord, CX-5, Forester, Teana รับประกัน 18 เดือน',
        'price' => 2850.00,
        'cost_price' => 2100.00,
        'quantity' => 18,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_gold_65d23l.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 16,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Gold 115D31L Premium Sealed SMF',
        'sku' => 'BAT-FB-GOLD-115D31L',
        'description' => 'แบตเตอรี่แห้งแท้ระดับพรีเมียม FB GOLD SMF สำหรับรถกระบะและ PPV ขนาด 90 Ah, CCA 780 พลังสตาร์ทสูงพิเศษ ไม่ต้องเติมน้ำกลั่น รับประกัน 18 เดือน',
        'price' => 3500.00,
        'cost_price' => 2650.00,
        'quantity' => 16,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_gold_115d31l.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 17,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB EFB M-42 Idling Stop System (ISS)',
        'sku' => 'BAT-FB-EFB-M42',
        'description' => 'แบตเตอรี่เทคโนโลยี EFB รองรับระบบตัดการทำงานเครื่องยนต์อัตโนมัติ Idling Stop ขนาด 40 Ah, CCA 400 ชาร์จไฟกลับเร็วขึ้น 2 เท่า สำหรับอีโคคาร์ ISS',
        'price' => 2250.00,
        'cost_price' => 1650.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_efb_m42.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 18,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB EFB N-55 Idling Stop System (ISS)',
        'sku' => 'BAT-FB-EFB-N55',
        'description' => 'แบตเตอรี่ EFB สำหรับรถยนต์ระบบ Idling Stop ขนาด 55 Ah, CCA 500 สำหรับ City Turbo 1.0, Civic Turbo, Mazda 2 Skyactiv-G, Yaris ISS',
        'price' => 2850.00,
        'cost_price' => 2150.00,
        'quantity' => 16,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_efb_n55.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 19,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB EFB Q-85 Idling Stop System (ISS)',
        'sku' => 'BAT-FB-EFB-Q85',
        'description' => 'แบตเตอรี่ EFB พรีเมียม ขนาด 65 Ah, CCA 620 ตรงรุ่น Mazda 2/3/CX-3/CX-5 Skyactiv ISS, Subaru XV ISS, Nissan Serena รองรับรอบการชาร์จสูง',
        'price' => 3350.00,
        'cost_price' => 2500.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_efb_q85.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 20,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB EFB T-110 Idling Stop System (ISS)',
        'sku' => 'BAT-FB-EFB-T110',
        'description' => 'แบตเตอรี่ EFB ไฮเพาเวอร์ ขนาด 90 Ah, CCA 800 สำหรับรถกระบะและดีเซลระบบ Start-Stop เช่น Mazda CX-5 Skyactiv-D, Revo ISS, D-Max ISS',
        'price' => 4200.00,
        'cost_price' => 3150.00,
        'quantity' => 14,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_efb_t110.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 21,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Premium DIN45 (LN1) European Standard',
        'sku' => 'BAT-FB-DIN45',
        'description' => 'แบตเตอรี่มาตรฐานยุโรปขั้วจม DIN45 (LN1) ขนาด 45 Ah, CCA 420 สำหรับ Ford Fiesta, EcoSport, Chevrolet Sonic, Spin',
        'price' => 2450.00,
        'cost_price' => 1800.00,
        'quantity' => 12,
        'min_quantity' => 3,
        'image' => 'uploads/products/fb_din45.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 22,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Premium DIN60 (LN2) European Standard',
        'sku' => 'BAT-FB-DIN60',
        'description' => 'แบตเตอรี่มาตรฐานยุโรปขั้วจม DIN60 (LN2) ขนาด 60 Ah, CCA 560 สำหรับ Ford Focus, Ranger 2.0, MG ZS, MG 5, Cruze, BMW 1-Series, VW Golf',
        'price' => 2950.00,
        'cost_price' => 2200.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_din60.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 23,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Premium DIN75 (LN3) European Standard',
        'sku' => 'BAT-FB-DIN75',
        'description' => 'แบตเตอรี่มาตรฐานยุโรปขั้วจม DIN75 (LN3) ขนาด 75 Ah, CCA 680 สำหรับ BMW 3-Series, Benz C-Class, Volvo, Audi A4, Ford Ranger Raptor, MG HS',
        'price' => 3650.00,
        'cost_price' => 2750.00,
        'quantity' => 16,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_din75.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 24,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Premium DIN85 (LN4) European Luxury',
        'sku' => 'BAT-FB-DIN85',
        'description' => 'แบตเตอรี่มาตรฐานยุโรปขั้วจม DIN85 (LN4) ขนาด 85 Ah, CCA 780 สำหรับ BMW 5-Series, Benz E-Class, Volvo XC60, Audi A6, Porsche Macan',
        'price' => 4400.00,
        'cost_price' => 3300.00,
        'quantity' => 12,
        'min_quantity' => 3,
        'image' => 'uploads/products/fb_din85.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 25,
        'category_id' => 1,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Premium DIN100 (LN5) Ultra Capacity',
        'sku' => 'BAT-FB-DIN100',
        'description' => 'แบตเตอรี่มาตรฐานยุโรปพรีเมียมขนาดใหญ่ DIN100 (LN5) ขนาด 100 Ah, CCA 900 สำหรับ BMW 7-Series, X5, Benz S-Class, GLE, GLS, Audi Q7',
        'price' => 5200.00,
        'cost_price' => 3900.00,
        'quantity' => 10,
        'min_quantity' => 2,
        'image' => 'uploads/products/fb_din100.png',
        'warranty_months' => 18,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 26,
        'category_id' => 3,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB Hybrid F-3000 Commercial Heavy Duty',
        'sku' => 'BAT-FB-F3000',
        'description' => 'แบตเตอรี่ไฮบริดพันธุ์อึด ขนาด 100 Ah, CCA 720 ทนทานต่องานหนักและอากาศร้อน สำหรับรถตู้ คอมมิวเตอร์ รถสองแถว และรถกระบะบรรทุกเชิงพาณิชย์',
        'price' => 3100.00,
        'cost_price' => 2300.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_hybrid_f3000.png',
        'warranty_months' => 12,
        'vehicle_type' => 'car',
        'status' => 'active'
    ],
    [
        'id' => 27,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB FTZ10S (12V 9.1Ah) AGM VRLA Big Bike',
        'sku' => 'BAT-FB-FTZ10S',
        'description' => 'แบตเตอรี่บิ๊กไบค์แท้ FB AGM VRLA 12V 9.1Ah, CCA 190 สำหรับ Forza 300/350, CBR500/650, XMAX 300, MT-07/09, Ninja 400/650, Z900',
        'price' => 1450.00,
        'cost_price' => 1050.00,
        'quantity' => 20,
        'min_quantity' => 5,
        'image' => 'uploads/products/fb_ftz10s.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ],
    [
        'id' => 28,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB FTZ12S (12V 11Ah) AGM VRLA Touring',
        'sku' => 'BAT-FB-FTZ12S',
        'description' => 'แบตเตอรี่มอเตอร์ไซค์ทัวร์ริ่ง FB AGM VRLA 12V 11Ah, CCA 210 สำหรับ ADV 350, X-ADV 750, Africa Twin, Tracer 900, Ducati Monster/Scrambler',
        'price' => 1850.00,
        'cost_price' => 1350.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_ftz12s.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ],
    [
        'id' => 29,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB FTX14-BS (12V 12Ah) AGM VRLA Heavy Duty',
        'sku' => 'BAT-FB-FTX14',
        'description' => 'แบตเตอรี่มอเตอร์ไซค์ขนาดใหญ่ FB AGM VRLA 12V 12Ah, CCA 230 สำหรับ Royal Enfield Interceptor/Classic, Vespa GTS 300, Multistrada, BMW R1200GS',
        'price' => 2250.00,
        'cost_price' => 1650.00,
        'quantity' => 15,
        'min_quantity' => 4,
        'image' => 'uploads/products/fb_ftx14.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ],
    [
        'id' => 30,
        'category_id' => 2,
        'battery_brand_id' => $fbBrandId,
        'name' => 'FB YTX20L-BS (12V 18Ah) AGM Cruiser & Harley',
        'sku' => 'BAT-FB-YTX20L',
        'description' => 'แบตเตอรี่ AGM ทรงพลัง 12V 18Ah, CCA 310 สำหรับ Harley-Davidson Sportster, Softail, Fat Boy, Street Bob, Road King, บิ๊กไบค์ครุยเซอร์พิกัดใหญ่',
        'price' => 2900.00,
        'cost_price' => 2100.00,
        'quantity' => 12,
        'min_quantity' => 3,
        'image' => 'uploads/products/fb_ytx20l.png',
        'warranty_months' => 6,
        'vehicle_type' => 'motorcycle',
        'status' => 'active'
    ]
];

$stmtUpsert = $db->prepare("
    INSERT INTO products (id, category_id, battery_brand_id, name, sku, description, price, cost_price, quantity, min_quantity, image, warranty_months, vehicle_type, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        category_id = VALUES(category_id),
        battery_brand_id = VALUES(battery_brand_id),
        name = VALUES(name),
        sku = VALUES(sku),
        description = VALUES(description),
        price = VALUES(price),
        cost_price = VALUES(cost_price),
        quantity = VALUES(quantity),
        min_quantity = VALUES(min_quantity),
        image = VALUES(image),
        warranty_months = VALUES(warranty_months),
        vehicle_type = VALUES(vehicle_type),
        status = VALUES(status)
");

foreach ($products as $p) {
    $stmtUpsert->execute([
        $p['id'],
        $p['category_id'],
        $p['battery_brand_id'],
        $p['name'],
        $p['sku'],
        $p['description'],
        $p['price'],
        $p['cost_price'],
        $p['quantity'],
        $p['min_quantity'],
        $p['image'],
        $p['warranty_months'],
        $p['vehicle_type'],
        $p['status']
    ]);
}
echo "Inserted/Updated all 30 FB Battery products successfully.\n";

// 3. Clear and repopulate recommendations and compatibility
$db->exec("DELETE FROM recommended_products");
$db->exec("DELETE FROM product_compatibility");
echo "Cleared old recommendations and compatibility.\n";

$recStmt = $db->prepare("INSERT INTO recommended_products (product_id, car_brand_id, car_model, priority, is_active) VALUES (?, ?, ?, ?, 1)");
$compStmt = $db->prepare("INSERT INTO product_compatibility (product_id, car_brand_id, car_model) VALUES (?, ?, ?)");

function addRecAndComp($recStmt, $compStmt, $brandId, $model, $productIdsWithPriority) {
    foreach ($productIdsWithPriority as $priority => $prodId) {
        $prio = $priority + 1;
        $recStmt->execute([$prodId, $brandId, $model, $prio]);
        $compStmt->execute([$prodId, $brandId, $model]);
    }
}

// -------------------------------------------------------------
// BRAND FALLBACKS (car_model IS NULL) FOR ALL 30 VEHICLE BRANDS
// So any vehicle of any brand without a specific model gets multiple FB battery recommendations!
// -------------------------------------------------------------
$brandDefaults = [
    // 1. Toyota: S-450L, S-650L, Gold 55B24L, S-1300L
    1 => [1, 4, 14, 7],
    // 2. Honda: S-450L, S-500L, S-600L, Gold 55B24L
    2 => [1, 2, 3, 14],
    // 3. Nissan: S-450L, S-600L, S-1300L, EFB Q-85
    3 => [1, 3, 7, 19],
    // 4. Mitsubishi: S-450L, S-650L, S-1300L, Gold 115D31L
    4 => [1, 4, 7, 16],
    // 5. Mazda: S-650L, Gold 55B24L, EFB Q-85, EFB T-110
    5 => [4, 14, 19, 20],
    // 6. Suzuki: S-450L, S-500L, S-500R, FTZ5S
    6 => [1, 2, 11, 8],
    // 7. Isuzu: S-1300L, S-1300R, S-1500L, Gold 115D31L, EFB T-110
    7 => [7, 12, 13, 16, 20],
    // 8. Ford: DIN60, DIN75, DIN85, S-1500L
    8 => [22, 23, 24, 13],
    // 9. Chevrolet: DIN45, DIN60, DIN75, S-1300L
    9 => [21, 22, 23, 7],
    // 10. BMW: DIN60, DIN75, DIN85, DIN100
    10 => [22, 23, 24, 25],
    // 11. Mercedes-Benz: DIN60, DIN75, DIN85, DIN100
    11 => [22, 23, 24, 25],
    // 12. Hyundai: S-650L, S-750L, S-1300L, DIN75
    12 => [4, 5, 7, 23],
    // 13. Kia: S-450L, S-500R, S-1300L, DIN75
    13 => [1, 11, 7, 23],
    // 14. MG: DIN60, DIN75, DIN85, S-1300L
    14 => [22, 23, 24, 7],
    // 15. Subaru: S-750L, Gold 65D23L, EFB Q-85
    15 => [5, 15, 19],
    // 16. Volvo: DIN75, DIN85, DIN100
    16 => [23, 24, 25],
    // 17. Lexus: S-750L, S-850L, Gold 65D23L, DIN75
    17 => [5, 6, 15, 23],
    // 18. Audi: DIN60, DIN75, DIN85, DIN100
    18 => [22, 23, 24, 25],
    // 19. Volkswagen: DIN60, DIN75, DIN85, DIN100
    19 => [22, 23, 24, 25],
    // 20. Honda (มอเตอร์ไซค์): FTZ5S, FTZ6V, FTZ7S, FTZ10S, FTZ12S
    20 => [8, 9, 10, 27, 28],
    // 21. Yamaha: FTZ5S, FTZ6V, FTZ7S, FTZ10S
    21 => [8, 9, 10, 27],
    // 22. Kawasaki: FTZ6V, FTZ7S, FTZ10S, FTZ12S
    22 => [9, 10, 27, 28],
    // 23. Suzuki (มอเตอร์ไซค์): FTZ5S, FTZ6V, FTZ7S, FTZ10S
    23 => [8, 9, 10, 27],
    // 24. GPX: FTZ5S, FTZ6V, FTZ7S
    24 => [8, 9, 10],
    // 25. Vespa: FTZ6V, FTZ7S, FTX14-BS
    25 => [9, 10, 29],
    // 26. Ducati: FTZ10S, FTZ12S, FTX14-BS
    26 => [27, 28, 29],
    // 27. Harley-Davidson: FTX14-BS, YTX20L-BS
    27 => [29, 30],
    // 28. Royal Enfield: FTZ10S, FTZ12S, FTX14-BS
    28 => [27, 28, 29],
    // 29. CFMOTO: FTZ7S, FTZ10S, FTZ12S
    29 => [10, 27, 28],
    // 30. Benelli: FTZ6V, FTZ7S, FTZ10S, FTZ12S
    30 => [9, 10, 27, 28],
];

foreach ($brandDefaults as $bId => $pList) {
    addRecAndComp($recStmt, $compStmt, $bId, null, $pList);
}
echo "Added brand fallback recommendations for all 30 brands.\n";

// -------------------------------------------------------------
// SPECIFIC POPULAR MODELS FOR EACH BRAND
// -------------------------------------------------------------
$modelMappings = [
    // 1. Toyota
    1 => [
        'Vios' => [1, 2, 14],                 // S-450L, S-500L, Gold 55B24L
        'Yaris' => [1, 2, 14],
        'Ativ' => [1, 2, 14],
        'Corolla Altis' => [3, 4, 14],       // S-600L, S-650L, Gold 55B24L
        'Altis' => [3, 4, 14],
        'Corolla Cross' => [3, 4, 14],
        'Yaris Cross' => [3, 4, 14],
        'Sienta' => [3, 4, 14],
        'Camry' => [5, 6, 15],                // S-750L, S-850L, Gold 65D23L
        'Innova' => [5, 6, 7],
        'Alphard' => [5, 6, 15],
        'Vellfire' => [5, 6, 15],
        'Hilux Vigo' => [7, 13, 16, 26],      // S-1300L, S-1500L, Gold 115D31L, Hybrid F-3000
        'Hilux Revo' => [7, 13, 16, 20],      // S-1300L, S-1500L, Gold 115D31L, EFB T-110
        'Fortuner' => [7, 13, 16, 20, 26],
        'Commuter' => [7, 13, 16, 26],
    ],
    // 2. Honda
    2 => [
        'City' => [1, 2, 14, 18],             // S-450L, S-500L, Gold 55B24L, EFB N-55 (Turbo)
        'Jazz' => [1, 2, 14],
        'Brio' => [1, 2, 14],
        'Freed' => [1, 2, 14],
        'Mobilio' => [1, 2, 14],
        'Civic' => [3, 4, 14, 18],            // S-600L, S-650L, Gold 55B24L, EFB N-55
        'HR-V' => [3, 4, 14],
        'BR-V' => [3, 4, 14],
        'Accord' => [5, 6, 15],               // S-750L, S-850L, Gold 65D23L
        'CR-V' => [3, 4, 5, 15],
    ],
    // 3. Nissan
    3 => [
        'March' => [1, 2, 17],                // S-450L, S-500L, EFB M-42 (ISS)
        'Almera' => [1, 2, 17],
        'Note' => [1, 2, 17],
        'Sylphy' => [3, 4, 14],
        'Tiida' => [3, 4, 14],
        'Livina' => [3, 4, 14],
        'Kicks' => [3, 4, 14],
        'Teana' => [5, 6, 15],
        'X-Trail' => [5, 6, 15, 19],
        'Serena' => [5, 15, 19],
        'Navara' => [7, 13, 16],
        'Terra' => [7, 13, 16],
        'Urvan' => [7, 13, 26],
    ],
    // 4. Mitsubishi
    4 => [
        'Mirage' => [1, 2, 17],
        'Attrage' => [1, 2, 17],
        'Xpander' => [3, 4, 14],
        'Lancer EX' => [4, 5, 15],
        'Triton' => [7, 13, 16, 26],
        'Pajero Sport' => [7, 13, 16, 26],
    ],
    // 5. Mazda
    5 => [
        'Mazda 2' => [4, 14, 18, 19],         // S-650L, Gold 55B24L, EFB N-55, EFB Q-85
        'Mazda 3' => [5, 15, 19],             // S-750L, Gold 65D23L, EFB Q-85
        'CX-3' => [5, 15, 19],
        'CX-30' => [5, 15, 19],
        'CX-5' => [5, 6, 19, 20],             // S-750L, S-850L, EFB Q-85, EFB T-110 (Diesel)
        'CX-8' => [6, 15, 19, 20],
        'BT-50' => [7, 13, 16, 23],
        'BT-50 Pro' => [7, 13, 23, 24],
    ],
    // 6. Suzuki
    6 => [
        'Swift' => [1, 2, 17],
        'Celerio' => [1, 2, 17],
        'Ciaz' => [1, 2, 3],
        'Carry' => [11, 2],                   // S-500R, S-500L
        'APV' => [11, 2],
        'Ertiga' => [3, 4, 14],
        'XL7' => [3, 4, 14],
        'Smash' => [8, 9],
        'Raider' => [9, 10],
    ],
    // 7. Isuzu
    7 => [
        'D-Max' => [7, 12, 13, 16, 20],       // S-1300L, S-1300R, S-1500L, Gold 115D31L, EFB T-110
        'Mu-X' => [7, 13, 16, 20],
        'Mu-7' => [7, 12, 13, 16],
        'Dragon Power' => [12, 7],
    ],
    // 8. Ford
    8 => [
        'Fiesta' => [21, 22],                 // DIN45, DIN60
        'EcoSport' => [21, 22],
        'Focus' => [22, 23],
        'Ranger' => [23, 24, 13, 7],          // DIN75, DIN85, S-1500L, S-1300L
        'Everest' => [23, 24, 13],
        'Ranger Raptor' => [23, 24],
    ],
    // 9. Chevrolet
    9 => [
        'Sonic' => [21, 22],
        'Spin' => [21, 22],
        'Cruze' => [22, 23],
        'Captiva' => [22, 23, 24],
        'Colorado' => [23, 7, 13],
        'Trailblazer' => [23, 7, 13],
    ],
    // 10. BMW
    10 => [
        '1 Series' => [22, 23],
        '2 Series' => [22, 23],
        '3 Series' => [23, 24],
        '4 Series' => [23, 24],
        '5 Series' => [24, 25],
        '7 Series' => [24, 25],
        'X1' => [22, 23],
        'X3' => [23, 24],
        'X5' => [24, 25],
    ],
    // 11. Mercedes-Benz
    11 => [
        'A-Class' => [22, 23],
        'CLA' => [22, 23],
        'GLA' => [22, 23],
        'C-Class' => [23, 24],
        'C 200' => [23, 24],
        'C 220d' => [23, 24],
        'C 300' => [23, 24],
        'GLC' => [23, 24],
        'E-Class' => [24, 25],
        'E 200' => [24, 25],
        'E 220d' => [24, 25],
        'GLE' => [24, 25],
        'S-Class' => [24, 25],
        'GLS' => [24, 25],
    ],
    // 12. Hyundai
    12 => [
        'H-1' => [7, 13, 16],
        'Staria' => [7, 13, 16, 24],
        'Tucson' => [4, 5, 22],
        'Creta' => [4, 22],
    ],
    // 13. Kia
    13 => [
        'Carnival' => [7, 13, 16],
        'Grand Carnival' => [7, 13, 16],
        'Picanto' => [1, 11, 21],
    ],
    // 14. MG
    14 => [
        'MG 3' => [21, 22],
        'MG 5' => [22, 23],
        'MG ZS' => [22, 23],
        'MG HS' => [23, 24],
        'MG Extender' => [23, 24, 7],
    ],
    // 15. Subaru
    15 => [
        'XV' => [5, 15, 19],
        'Forester' => [5, 15, 19],
        'Outback' => [5, 6, 15, 19],
        'BRZ' => [5, 15],
        'WRX' => [5, 15, 19],
    ],
    // 16. Volvo
    16 => [
        'V40' => [23, 24],
        'S60' => [23, 24],
        'XC40' => [23, 24],
        'XC60' => [24, 25],
        'XC90' => [24, 25],
    ],
    // 17. Lexus
    17 => [
        'IS' => [5, 6, 15],
        'ES' => [5, 6, 15],
        'NX' => [5, 6, 15, 23],
        'RX' => [5, 6, 15, 23],
        'LM' => [5, 6, 15],
    ],
    // 18. Audi
    18 => [
        'A1' => [22, 23],
        'A3' => [22, 23],
        'A4' => [23, 24],
        'A5' => [23, 24],
        'A6' => [24, 25],
        'Q3' => [22, 23],
        'Q5' => [23, 24],
        'Q7' => [24, 25],
        'TT' => [23, 24],
        'GT' => [23, 24, 25],
    ],
    // 19. Volkswagen
    19 => [
        'Golf' => [22, 23],
        'Passat' => [23, 24],
        'Tiguan' => [23, 24],
        'Caravelle' => [24, 25, 7],
    ],
    // 20. Honda (มอเตอร์ไซค์)
    20 => [
        'Wave' => [8, 9],                     // FTZ5S, FTZ6V
        'Wave 110i' => [8, 9],
        'Wave 125i' => [8, 9],
        'Scoopy' => [8, 9],
        'Scoopy-i' => [8, 9],
        'Click' => [8, 9],
        'Click 110' => [8, 9],
        'Click 125i' => [8, 9],
        'Click 150i' => [9, 10],              // FTZ6V, FTZ7S
        'Click 160' => [9, 10],
        'PCX' => [9, 10],                     // FTZ6V, FTZ7S
        'PCX 125' => [9, 10],
        'PCX 150' => [9, 10],
        'PCX 160' => [9, 10],
        'ADV 150' => [9, 10],
        'ADV 160' => [9, 10],
        'Lead 125' => [9, 10],
        'Super Cub' => [8, 9],
        'CBR 150R' => [10, 27],               // FTZ7S, FTZ10S
        'CBR 250R' => [10, 27],
        'CRF 250' => [10, 27],
        'Rebel 300' => [10, 27],
        'Forza' => [27, 28],                  // FTZ10S, FTZ12S
        'Forza 300' => [27, 28],
        'Forza 350' => [27, 28],
        'ADV 350' => [28, 27],
        'CBR 500R' => [27, 28],
        'CB 500X' => [27, 28],
        'CB 650R' => [27, 28],
        'CBR 650R' => [27, 28],
        'X-ADV 750' => [28, 29],
        'Africa Twin' => [28, 29],
    ],
    // 21. Yamaha
    21 => [
        'Fino' => [8, 9],
        'Mio' => [8, 9],
        'Grand Filano' => [8, 9],
        'GT125' => [8, 9],
        'Finn' => [8, 9],
        'Spark' => [8, 9],
        'NMAX' => [9, 10],
        'Aerox' => [9, 10],
        'QBIX' => [9, 10],
        'pcx' => [9, 10],
        'R15' => [10, 27],
        'MT-15' => [10, 27],
        'XSR155' => [10, 27],
        'WR155R' => [10, 27],
        'XMAX' => [27, 28],
        'XMAX 300' => [27, 28],
        'TMAX' => [27, 28],
        'MT-07' => [27, 28],
        'MT-09' => [27, 28],
        'R6' => [27, 28],
        'R1' => [27, 28],
        'Tracer 900' => [28, 29],
    ],
    // 22. Kawasaki
    22 => [
        'KSR' => [8, 9],
        'D-Tracker 150' => [8, 9],
        'KLX 150' => [8, 9],
        'KLX 230' => [10, 27],
        'KLX 250' => [10, 27],
        'Ninja 250' => [10, 27],
        'Ninja 300' => [10, 27],
        'Ninja 400' => [27, 28],
        'Ninja 650' => [27, 28],
        'Z250' => [10, 27],
        'Z300' => [10, 27],
        'Z400' => [27, 28],
        'Z650' => [27, 28],
        'Z900' => [27, 28],
        'Versys 650' => [27, 28],
        'Vulcan S' => [27, 28],
        'ZX-10R' => [27, 28, 29],
    ],
    // 23. Suzuki (มอเตอร์ไซค์)
    23 => [
        'Smash' => [8, 9],
        'Shooter' => [8, 9],
        'Address' => [8, 9],
        'Raider 150' => [9, 10],
        'GSX-R150' => [9, 10],
        'GSX-S150' => [9, 10],
        'V-Strom 650' => [27, 28, 29],
        'SV650' => [27, 28],
        'GSX-S750' => [27, 28],
        'Hayabusa' => [27, 28, 29],
    ],
    // 24. GPX
    24 => [
        'Demon 125' => [8, 9],
        'Demon 150 GR' => [8, 9, 10],
        'Demon 150 GN' => [8, 9, 10],
        'Popz 110' => [8, 9],
        'Rock 110' => [8, 9],
        'Drone 150' => [9, 10],
        'Raptor 180' => [9, 10],
        'Legend 150' => [9, 10],
        'Legend 200' => [9, 10, 27],
        'Legend 250 Twin' => [10, 27],
    ],
    // 25. Vespa
    25 => [
        'LX 125' => [9, 10],
        'S 125' => [9, 10],
        'Sprint 125' => [9, 10],
        'Sprint 150' => [9, 10],
        'Primavera 150' => [9, 10],
        'GTS Super 150' => [9, 10],
        'GTS 300' => [10, 29],
        'GTV 300' => [10, 29],
        'Sei Giorni' => [10, 29],
        'ล่าสุด' => [9, 10, 29],             // Existing vehicle in DB
    ],
    // 26. Ducati
    26 => [
        'Monster 797' => [27, 28],
        'Monster 821' => [27, 28],
        'Monster 937' => [27, 28],
        'Scrambler 800' => [27, 28],
        'Scrambler 1100' => [27, 28],
        'Panigale V2' => [27, 28],
        'Panigale V4' => [27, 28],
        'Streetfighter V4' => [27, 28],
        'v4' => [27, 28],                    // Existing vehicle in DB
        'Multistrada 950' => [28, 29],
        'Multistrada 1200' => [28, 29],
        'Multistrada 1260' => [28, 29],
        'Multistrada V4' => [28, 29],
        'Diavel 1260' => [28, 29],
    ],
    // 27. Harley-Davidson
    27 => [
        'Sportster 883' => [29, 30],
        'Sportster 1200' => [29, 30],
        'Iron 883' => [29, 30],
        'Forty-Eight' => [29, 30],
        'Nightster' => [29, 30],
        'Street Bob' => [30, 29],
        'Fat Boy' => [30, 29],
        'Breakout' => [30, 29],
        'Low Rider' => [30, 29],
        'Road King' => [30, 29],
        'Street Glide' => [30, 29],
        'Road Glide' => [30, 29],
        'Ultra Limited' => [30, 29],
    ],
    // 28. Royal Enfield
    28 => [
        'Classic 350' => [27, 28],
        'Bullet 350' => [27, 28],
        'Hunter 350' => [27, 28],
        'Meteor 350' => [27, 28],
        'Interceptor 650' => [28, 29],
        'Continental GT 650' => [28, 29],
        'Himalayan' => [27, 28],
        'Super Meteor 650' => [28, 29],
    ],
    // 29. CFMOTO
    29 => [
        '250NK' => [10, 27],
        '250SR' => [10, 27],
        '300NK' => [10, 27],
        '300SR' => [10, 27],
        '400NK' => [27, 28],
        '650NK' => [27, 28],
        '650MT' => [27, 28, 29],
        '700CL-X' => [27, 28],
        '800MT' => [28, 29],
    ],
    // 30. Benelli
    30 => [
        'TNT 135' => [9, 10],
        'TNT 25' => [9, 10],
        'TNT 300' => [27, 28],
        '302S' => [27, 28],
        'TRK 502' => [27, 28, 29],
        '502C' => [27, 28],
        'Leoncino 500' => [27, 28],
        '752S' => [27, 28, 29],
    ],
];

$recCount = 0;
foreach ($modelMappings as $brandId => $models) {
    foreach ($models as $modelName => $pList) {
        addRecAndComp($recStmt, $compStmt, $brandId, $modelName, $pList);
        $recCount += count($pList);
    }
}

echo "Added {$recCount} specific model recommendations across all 30 brands.\n";

// Count total
$totRec = $db->query("SELECT COUNT(*) FROM recommended_products")->fetchColumn();
$totComp = $db->query("SELECT COUNT(*) FROM product_compatibility")->fetchColumn();
echo "Total recommended_products: {$totRec}\n";
echo "Total product_compatibility: {$totComp}\n";
echo "Done!\n";
