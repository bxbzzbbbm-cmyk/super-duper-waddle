<?php
$file = "urls.json";

if (!file_exists($file)) {
    exit("No URLs");
}

$data = json_decode(file_get_contents($file), true);

$code = $_GET['code'] ?? "";

if (isset($data[$code])) {
    header("Location: " . $data[$code]);
    exit;
}

echo "Short URL not found.";
