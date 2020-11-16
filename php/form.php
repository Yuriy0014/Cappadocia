<?php 
session_start();


$db = mysqli_connect("", "id15389277_cappa", "5T=*R|wWb3VrT}q", "id15389277_cappadocia");
mysqli_set_charset($db, "utf8");

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];

if ($db == false){
    print("Внимание! База данных недоступна. Попробуйте позже.". mysqli_connect_error());
}
else {
    $sql = "INSERT INTO clients (`id`, `name`, `phone`, `email`) VALUES (NULL, '$name', '$phone', '$email')";
    mysqli_query($db, $sql);
}

$_SESSION['name'] = $name;
$_SESSION['phone'] = $phone;
$_SESSION['email'] = $email;

header('Location: mail_to_me.php');
   
?>