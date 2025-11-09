<?php

require "validate.inc";

if (isset($_POST["submit"])){
    $errors = [];
    $username = $_POST["username"];
    // $email = $_POST["email"];
    // var_dump($_POST);
    // foreach($_POST as $key => $value){
    //     echo $key. " = ". $value. "<br>";
    // }
    // validasiEmail($errors,$email);
    
    
    #validasi
    if(validateName($_POST,$errors ,"username")){
        echo "data ok";
    }else{
        echo "data invalid";
    }

    #kalo sudah divalidasi
    // if(count($errors) == 0){
    //     header("location:sukses.php");
    // };
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form modul 4</title>
</head>
<body>
    <form action="prosesData.php" method="post">
        <label for="username">masukkan nama : </label>
        <input type="text" name="username" value="<?php echo $username ?? "" ?>">
        <span><?php echo $errors["username"] ?? "" ?></span>
        <br> <br>
        <!-- <label for="email">masukkan Email : </label>
        <input type="text" name="email" value="<?php echo $email ?? "" ?>">
        <span><?php echo $errors["email"] ?? "" ?></span>
        <br> <br> -->
        <input type="submit" name="submit">
    </form>
</body>
</html>