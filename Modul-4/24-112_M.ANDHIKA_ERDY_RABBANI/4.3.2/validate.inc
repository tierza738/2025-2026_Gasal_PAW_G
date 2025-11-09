<?php
function validateName(&$errors, $field){
	if (empty($field)){
		$errors['surname'] = 'Surname Required';
	} elseif (!preg_match("/^[a-zA-Z'-]+$/",$field)){
		$errors['surname'] = 'Surname wajib nama';
	}
}
?>
