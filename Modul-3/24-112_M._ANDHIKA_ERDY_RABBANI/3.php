<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall.";
echo "<br>";
echo "<br>";


// 3.3.1.---------------------------------------------------------------------------------------------------
$height["David"] = "180";
$height["Evelyn"] = "158";
$height["Frank"] = "172";
$height["Grace"] = "160";
$height["Helen"] = "168";

var_dump($height);
echo "<br>";

// Ambil semua key dari array
$keys = array_keys($height);

// Ambil key terakhir
$lastKey = end($keys);

echo "Key terakhir adalah: " . $lastKey ;
echo "<br>";
echo "Nilainya: " . $height[$lastKey];
echo "<br>";
echo "<br>";

// 3.3.2.---------------------------------------------------------------------------------------------------
unset($height["Charlie"]); // hapus data Charlie

var_dump($height);
echo "<br>";

$keys = array_keys($height);
$lastKey = end($keys);

echo "Key terakhir sekarang: " . $lastKey ;
echo "<br>";
echo "Nilainya: " . $height[$lastKey];
echo "<br>";
echo "<br>";

// 3.3.3.---------------------------------------------------------------------------------------------------
$weight = array("Andy" => 60, "Barry" => 55, "Charlie" => 65);

$values = array_values($weight);

echo "Data ke-2 dari weight adalah: " . $values[1] ;
?>
