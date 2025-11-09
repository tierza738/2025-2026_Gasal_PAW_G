<?php
// 3.6.1. ----------------------------------------------------------------------
// Implementasi fungsi array_push()
$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Durian", "Mango"); // Menambahkan dua data baru
echo "<b>3.6.1 array_push()</b><br>";
print_r($fruits);
echo "<br><br>";


// 3.6.2. ----------------------------------------------------------------------
// Implementasi fungsi array_merge()
$array1 = array("Red", "Green", "Blue");
$array2 = array("Yellow", "Purple");
$colors = array_merge($array1, $array2); // Menggabungkan dua array
echo "<b>3.6.2 array_merge()</b><br>";
print_r($colors);
echo "<br><br>";


// 3.6.3. ----------------------------------------------------------------------
// Implementasi fungsi array_values()
$age = array("Andy"=>21, "Barry"=>22, "Charlie"=>23);
$values = array_values($age); // Mengambil semua nilai tanpa key
echo "<b>3.6.3 array_values()</b><br>";
print_r($values);
echo "<br><br>";


// 3.6.4. ----------------------------------------------------------------------
// Implementasi fungsi array_search()
$heights = array("Andy"=>176, "Barry"=>165, "Charlie"=>170);
$search = array_search(165, $heights); // Mencari key dari nilai 165
echo "<b>3.6.4 array_search()</b><br>";
echo "Nilai 165 dimiliki oleh: " . $search;
echo "<br><br>";


// 3.6.5. ----------------------------------------------------------------------
// Implementasi fungsi array_filter()
$numbers = array(10, 25, 30, 45, 50);
$filtered = array_filter($numbers, function($num) {
    return $num > 30; // ambil hanya yang lebih besar dari 30
});
echo "<b>3.6.5 array_filter()</b><br>";
print_r($filtered);
echo "<br><br>";


// 3.6.6. ----------------------------------------------------------------------
// Implementasi berbagai fungsi sorting
$names = array("Andy", "Charlie", "Barry", "Evelyn", "David");

echo "<b>3.6.6 Sorting</b><br>";
sort($names); // ascending (A-Z)
echo "sort(): ";
print_r($names);
echo "<br>";

rsort($names); // descending (Z-A)
echo "rsort(): ";
print_r($names);
echo "<br>";

$assoc = array("Andy"=>21, "Barry"=>19, "Charlie"=>23);
asort($assoc); // urutkan berdasarkan nilai (ascending)
echo "asort(): ";
print_r($assoc);
echo "<br>";

ksort($assoc); // urutkan berdasarkan key (ascending)
echo "ksort(): ";
print_r($assoc);
echo "<br>";
?>
