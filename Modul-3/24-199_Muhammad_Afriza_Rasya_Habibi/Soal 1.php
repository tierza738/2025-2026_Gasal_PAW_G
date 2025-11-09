<?php
echo "TAMBAHKAN 5 DATA BARU : <br>";
$fruits = array("Avocado", "Bluberry", "Cherry", "Apple", "Banana", "Watermelon", "Mango", "Grape");
echo "I like" . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . "." . "<br>";

$highest_index = count($fruits) -1; "<br>";

echo "Nilai pada indeks tertinggi adalah: " . $fruits[$highest_index] . "<br>";
echo "Index tertinggi dari array fruits adalah: " . $highest_index . "<br>";

echo "<br> HAPUS 1 DATA :<br>";
$key = array_search("Grape", $fruits);
if ($key !== false) {
    unset($fruits[$key]);
}

$fruits = array_values($fruits);
echo "Data setelah 'Grape' dihapus:" . "<br>";
print_r($fruits);
$highest_index = count($fruits) - 1;
echo "Indeks tertinggi sekarang: $highest_index" . "<br>";
echo "Nilai pada indeks tertinggi: " . $fruits[$highest_index] . "<br>";

echo "<br> BUAT ARRAY BARU :<br>";
$veggies = array("Carrot", "Broccoli", "Spinach");
foreach ($veggies as $veg) {
    echo $veg . "<br>";
}

?>