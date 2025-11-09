<?php

require "validate.inc";

$error = [];

if(validateName($_POST, "surname", $error)) {
    echo "Data OK!";
} else {
    foreach($error as $salah){
        echo $salah . "<br>";
    }
}
    
?>