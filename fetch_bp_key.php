<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// هنا تضع رابط API الخاص بك
$sellerKey = "e98b833486017b09dc7430654564dc39";
$url = "https://keyauthmod.com/api/seller?sellerkey=e98b833486017b09dc7430654564dc39&type=add&expiry=1&mask=VG-BP_VIP_*****&level=1&amount=1&format=json"; // تأكد من استخدام json هنا

// تنفيذ طلب GET
$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["success" => false, "message" => "ERROR IN GET KEY"]);
} else {
    // إذا كانت الاستجابة JSON
    $data = json_decode($response, true);
    
    if (isset($data['key'])) { // تأكد أن المفتاح موجود
        echo json_encode(["success" => true, "key" => $data['key']]);
    } else {
        echo json_encode(["success" => false, "message" => "مفتاح غير موجود في الاستجابة"]);
    }
}
?>
