<?php
session_start();
//Sprawdzenie czy passy są identyczne
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$nick=$_SESSION['user'];
require_once "connect.php";
$all_clear=true;

if($pass1!=$pass2){
  $_SESSION['err_passchange']="Wpisane nowe hasła nie są identyczne";
  header('Location: user.php');
  $all_clear=false;
};
if((strlen($pass1)<8)||(strlen($pass1)>35)){
  $all_clear=false;
  $_SESSION['err_passchange']="Hasło musi posiadać od 8 do 35 znaków";
  header('Location: user.php');
};

if($all_clear==true){
  //Testy przeszły pomyślnie
  //Łączenie z bazą danych
  $connection=new mysqli($host,$db_user,$db_password,$db_name);
  if ($connection->connect_errno!=0){

  throw new Exception(mysqli_connect_errno());
  }else{
      //Hashowanie hasła i dodanie go do bazy danych
      $hashed_pass=password_hash($pass1, PASSWORD_DEFAULT);
      $connection->query("UPDATE users SET password='$hashed_pass' WHERE username='$nick'");
      header('Location: pass_changed.php');

    };
    $connection->close();
};

?>
