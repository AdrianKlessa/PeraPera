<?php
session_start();

if(!isset($_SESSION['reg_success'])){
header('Location: login.php');
exit();
}else{

  unset($_SESSION['reg_success']);
}
//Usuwanie zmiennych z walidacji
if(isset($_SESSION['rem_nick'])){unset($_SESSION['rem_nick']);};
if(isset($_SESSION['rem_mail'])){unset($_SESSION['rem_mail']);};
if(isset($_SESSION['rem_name'])){unset($_SESSION['rem_name']);};
if(isset($_SESSION['rem_surname'])){unset($_SESSION['rem_surname']);};
if(isset($_SESSION['rem_pass1'])){unset($_SESSION['rem_pass1']);};
if(isset($_SESSION['rem_pass2'])){unset($_SESSION['rem_pass2']);};
if(isset($_SESSION['rem_TOS'])){unset($_SESSION['rem_TOS']);};
//Usuwanie zmiennych z błędami

if(isset($_SESSION['err_nick'])){unset($_SESSION['err_nick']);};
if(isset($_SESSION['err_mail'])){unset($_SESSION['err_mail']);};
if(isset($_SESSION['err_name'])){unset($_SESSION['err_name']);};
if(isset($_SESSION['err_surname'])){unset($_SESSION['err_surname']);};
if(isset($_SESSION['err_pass'])){unset($_SESSION['err_pass1']);};
if(isset($_SESSION['err_TOS'])){unset($_SESSION['err_TOS']);};
if(isset($_SESSION['err_bot'])){unset($_SESSION['err_bot']);};
 ?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Logowanie</title>
  </head>
  <body>
<h1 id="login_title"><a href="login.php">Dziękujemy za zalogowanie w serwisie. Możesz już zarejestrować się na swoje konto.</h1></a><br>

  </body>
</html>
