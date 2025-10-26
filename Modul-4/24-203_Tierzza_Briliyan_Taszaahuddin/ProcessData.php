<?php
require 'validate.inc';
$errors = [];
validateName($errors, $_POST, 'username');
if (empty($errors)) {
    echo 'Data OK!';
} else {
    echo 'Data invalid! <br>';
    
    foreach ($errors as $field => $error_message) {
        echo $field . ': ' . $error_message . '<br>';
    }
}
?>