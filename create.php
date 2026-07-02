<?php
$file = "urls.json";

if (!file_exists($file)) {
    file_put_contents($file, "{}");
}

$data = json_decode(file_get_contents($file), true);

function code($len = 6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $out = "";
    for ($i = 0; $i < $len; $i++) {
        $out .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $out;
}

$url = $_GET['url'] ?? "";

if ($url != "") {

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        exit("Invalid URL");
    }

    do {
        $short = code();
    } while (isset($data[$short]));

    $data[$short] = $url;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    $base = dirname($_SERVER['PHP_SELF']);
    $host = "http://" . $_SERVER['HTTP_HOST'];

    echo "Short URL:<br>";
    echo $host . $base . "/go.php?code=" . $short;
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<form>
<input type="text" name="url" placeholder="https://example.com" style="width:400px">
<input type="submit" value="Generate">
</form>

</body>
</html>
