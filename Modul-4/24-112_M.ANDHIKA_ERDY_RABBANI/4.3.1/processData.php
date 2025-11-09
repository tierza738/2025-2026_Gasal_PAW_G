<?php
require 'validate.inc';

$errors = [];
$surname = $_POST['surname'];

validateName($errors, $surname);
var_dump($errors);

?>
