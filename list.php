<?php
$file = "urls.json";

$data = [];

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
}

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Short Code</th><th>URL</th></tr>";

foreach ($data as $code => $url) {
    echo "<tr>";
    echo "<td>$code</td>";
    echo "<td>" . htmlspecialchars($url) . "</td>";
    echo "</tr>";
}

echo "</table>";
