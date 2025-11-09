<?php
require 'validate.inc';

$errors = array();

if (validateName($_POST, 'surname', $errors)){
    echo 'Data OK!';
}else{
    echo 'Data invalid!';

    foreach ($errors as $err) {
        echo "<br>$err<br>";
    }
}