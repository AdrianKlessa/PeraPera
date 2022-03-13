<?php
session_start();
require_once "connect.php";
//Sprawdzenie czy ktoś nie wszedł tutaj bez wypełnienia formularza
if(!isset($_POST['username'])||!isset($_POST['password'])){
header('Location: login.php');
exit();


}


//Połączenie z bazą danych
$connection=@new mysqli($host,$db_user,$db_password,$db_name);
if ($connection->connect_errno!=0){

echo "Error: ".$connection->connect_errno;


}else{

$login=$_POST['username'];
$pass=$_POST['password'];
//"Dezynfekcja" loginu (hasło jest hashowane więc takiego problemu nie ma)
$login=htmlentities($login,ENT-QUOTES,UTF-8);



if($result= @$connection->query(
  sprintf("SELECT * FROM users WHERE username='%s'",
  mysqli_real_escape_string($connection,$login)))){

  $users_found=$result->num_rows;
  if($users_found==1){
    //Tutaj sprawdzamy poprawność hasła
    $row=$result->fetch_assoc();
    $hash=$row['password'];

    if(password_verify($pass, $hash)){
      $_SESSION['user']=$row['username'];
      $_SESSION['id']=$row['userid'];
      $_SESSION['logged_in']=true;
      $_SESSION['acc_type']=$row['acctype'];
      $result->close();
      unset($_SESSION['login_error']);
      if($_SESSION['acc_type']==0){
        //Adminów przekierowujemy do panelu sterowania
        header('Location: admin.php');

      }else{
        //Userów przekierowujemy do strony użytkwownika
      header('Location: user.php');}
      }else{
        $_SESSION['login_error'] = '<span style="color: red">Nie udało się zalogować przy pomocy wprowadzonych danych logowania. </span>';
        header('Location: login.php');}
  }else{
    $_SESSION['login_error'] = '<span style="color: red">Nie udało się zalogować przy pomocy wprowadzonych danych logowania. </span>';
    header('Location: login.php');




  };




};

$connection->close();
}

 ?>
