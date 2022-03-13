<?php
require_once "connect.php";
$username=$_POST['username'];
$username=htmlentities($username,ENT-QUOTES,UTF-8);

$connection=@new mysqli($host,$db_user,$db_password,$db_name);
if ($connection->connect_errno!=0){

echo "Error: ".$connection->connect_errno;


}else{
  if($result= @$connection->query(
    sprintf(
    "SELECT * FROM users WHERE username='%s'",
    mysqli_real_escape_string($connection,$username)
    ))){

    $users_found=$result->num_rows;
    if($users_found==1){
      $row=$result->fetch_assoc();
      $mail=$row['email'];
      $password=$row['password'];
      $result->close();
}
}
$connection->close();
$msg= "Witaj! Usłyszeliśmy, że chciałbyś abyśmy przesłali ci Twoje hasło! \n Jeśli nie chciałeś... przykro nam. Tak to już działa. \n Twoje hasło jest następujące: ".$password."\n Naklej je sobie na lodówce czy co, żebyś następnym razem pamiętał.";
$msg= wordwrap($msg, 70);
mail($mail,"Przypomnienie hasła",$msg);
}
header('Location: password_reset.php');
$_SESSION['reminder_done'] = '<span style="color: red">Wiadomość z hasłem została wysłana. Sprawdź pocztę, wliczając w to folder spam. </span>';


 ?>
