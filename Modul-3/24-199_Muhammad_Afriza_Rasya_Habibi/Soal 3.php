<?php

$height = array("Andy"=>"176", "Bary"=>"165", "Charlie"=>"170", "Afriza"=>"171", "Meymey"=>"148", "Apis"=>"180", "Meyla"=>"172", "Mahira"=>"185");
echo "Andy is " . $height['Andy'] . "cm tall" . "<br>";
foreach($height as $key => $value){
    echo "$key => $value cm " . "<br>";
}

echo "<br>";

echo "TAMPILKAN NILAI INDEKS TERAKHIR";
$last_key = array_key_last($height);
echo "<br> Indeks terakhir dari array height adalah : $last_key" . "<br>";
echo "Nilai dari indeks terakhir : " . $height[$last_key] . " cm\n" . "<br>";

echo "<br>";

echo "HAPUS 1 DATA <br>";
unset($height["Bary"]);
foreach($height as $key =>$value) {
    echo "$key => $value cm" . "<br>";
}

$last_key = array_key_last($height);
echo "Indeks terakhir dari array height adalah: $last_key" .
"<br>";
echo "Nilai pada indeks terakhir: " . $height[$last_key] . " cm" .
"<br>";

echo "<br>";

$weight = array("Afriza"=>"55", "Meyla"=>"38", "Meymey"=>"40");
foreach($weight as $key => $value) {
    echo "$key => $value kg<br>";
}

$keys = array_keys($weight);
$second_key = $keys[1];
echo "Data ke-2 dari array weight adalah : ";
echo "$second_key => " . $weight[$second_key] . " kg";

?>