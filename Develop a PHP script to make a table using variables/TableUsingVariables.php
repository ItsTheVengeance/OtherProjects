<?php

$headers = ['Name', 'Age', 'City'];
$rows = [
    ['Aman', 22, 'Tezpur'],
    ['Bharat', 24, 'Shillong'],
    ['Chetan', 20, 'Guwahati']
];

echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr>";
foreach ($headers as $header) {
    echo "<th>{$header}</th>";
}
echo "</tr>";

foreach ($rows as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>{$cell}</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>