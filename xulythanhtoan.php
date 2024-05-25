<?php
header('Content-type: text/html; charset=utf-8');

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
$partnerCode = "MOMOBKUN20180529";
$accessKey = "klm05TvNBzhg7h7j";
$secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
$orderId = time() . "";
$redirectUrl = "http://localhost/Music/indexThanhToan.php";
$ipnUrl = "http://localhost/Music/indexThanhToan.php";
$extraData = "";

$amount = '500000';
$requestId = time() . "";
$requestType = "captureWallet";
$orderInfo = "Thanh toán đơn hàng $orderId";
$extraData = "";

// Tạo chữ ký HMAC SHA256
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey);

// Tạo mảng dữ liệu gửi yêu cầu đến MoMo
$requestData = [
    'partnerCode' => $partnerCode,
    'accessKey' => $accessKey,
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature,
    'lang' => 'vi' // Thêm trường 'lang'
];

// Gửi yêu cầu đến MoMo
$response = execPostRequest($endpoint, json_encode($requestData));
$result = json_decode($response, true);

if (isset($result['payUrl']) && $result['resultCode'] == 0) {
    header('Location: ' . $result['payUrl']);
    exit();
} else {
    echo "Thanh toán thất bại: " . $result['message'];
}
?>