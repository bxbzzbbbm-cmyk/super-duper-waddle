<?php
$file = "urls.json";

$data = [];

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
}

$code = $_GET['code'] ?? "";

if ($code != "") {

    if (isset($data[$code])) {
        echo "<b>Short Code:</b> $code<br>";
        echo "<b>URL:</b> " . htmlspecialchars($data[$code]);
    } else {
        echo "Not found.";
    }

    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<form>
<input name="code" placeholder="Short Code">
<input type="submit" value="Search">
</form>

</body>
</html>
