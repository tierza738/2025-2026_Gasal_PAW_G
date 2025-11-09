<?php

echo "IMPLEMENTASI ARRAY_PUSH() <br>";
$fruits = array("Mango", "Banana", "Watermelon");
echo "Array awal: ";
print_r($fruits);
echo "<br>";

array_push($fruits, "Orange", "Grape");
echo "Array setelah array_push(): ";
print_r($fruits);
echo "<br><br>";

echo "<br> IMPLEMENTASI MERGE() <br>";
$veggies = array("Carrot", "Broccoli", "Chili");
$merged = array_merge($fruits, $veggies);
echo "Hasil gabungan array fruits dan veggies:<br>";
print_r($merged);
echo "<br><br>";

echo "<br> IMPLEMENTASI VALUES() <br>";
$student = array("Name" => "Afriza", "NIM" => "24199", "Prodi" =>
"Informatika");
echo "Array asosiatif : <br>";
print_r($student);
echo "<br>";

$values = array_values($student);
echo "Hasil array_values() (mengambil hanya nilai) : <br>";
print_r($values);
echo "<br><br>";

echo "<br> IMPLEMENTASI SEARCH() <br>";
$numbers = array(15, 25, 35, 45, 50);
$search = array_search(45, $numbers);
echo "Isi array numbers: ";
print_r($numbers);
echo "<br>";
echo "Nilai 45 ditemukan pada indeks ke-$search<br><br>";

echo "<br> IMPLEMENTASI FILTER() <br>";
$ages = array(20, 23, 27, 17, 19, 25);
echo "Array usia awal: ";
print_r($ages);
echo "<br>";

$adult = array_filter($ages, function($age){
    return $age >= 18;
});
echo "Hasil array_filter (usia >= 18) : ";
print_r($adult);
echo "<br><br>";

echo "<br> IMPLEMENTASI BERBAGAI FUNGSI SORTING <br>";
$numbers2 = array(50, 20, 35, 65, 70);
echo "Array awal : ";
print_r($numbers2);
echo "<br>";
sort($numbers2);
echo "Hasil sort (menaik) : ";
print_r($numbers2);
echo "<br>";

rsort($numbers2);
echo "Hasil rsort (menurun) : ";
print_r($numbers2);
echo "<br>";

$assoc = array("b" => 50, "a" => 20, "c" => 35);
asort($assoc);
echo "Hasil asort (menaik berdasarkan nilai) : ";
print_r($assoc);
echo "<br>";

ksort($assoc);
echo "Hasil ksort (menaik berdasarkan key) : ";
print_r($assoc);
echo "<br>";

arsort($assoc);
echo "Hasil arsort (menurun berdasarkan nilai) : ";
print_r($assoc);
echo "<br>";

krsort($assoc);
echo "Hasil krsort (menurun berdasarkan key) : ";
print_r($assoc);
echo "<br>";

?>