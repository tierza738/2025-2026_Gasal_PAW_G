<?php

echo "TAMBAHKAN 5 DATA <br>";
$height = array("Andy"=>"176", "Bary"=>"165", "Charlie"=>"170");
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;echo "<br>";
}

$height["Afriza"] = "170";
$height["Meymey"] = "143";
$height["Meyla"] = "145";
$height["Apis"] = "172";
$height["Mahira"] = "165";
foreach($height as $x => $x_value) {
    echo "Key = " . $x . ", Value =" . $x_value . " cm<br>";
}

echo "<br>";

echo "TAMPILKAN ARRAY BARU WEIGHT <br>";
$weight = array("Apis" => "70", "Meyla" => "45", "Mahira" => "55");
foreach ($weight as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value . " kg<br>";
}

?>