<?php
session_start();

if(isset($_SESSION['logged_in'])&&$_SESSION['logged_in']==true){
  if($_SESSION['acc_type']==0){
    header('Location: admin.php');
    exit();
  }else{
  header('Location: user.php');
  exit();}
}

 ?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-Clacks-Overhead" content="GNU Terry Pratchett" />
    <title>Logowanie</title>
  </head>
  <body>
<img src="padlock.png" alt="padlock" id="padlock"><br><h1 id="login_title">LOGOWANIE</h1><br>

<div id="form_standard">


<form id="logon" action="login_check.php" method="post">
  <input type="text" style="margin-bottom: 3px;"name="username" placeholder="nazwa użytkownika"><br>
  <input type="password" style="margin-bottom: 3px;"name="password" placeholder="hasło"><br>
  <input type="submit" style="margin-bottom: 3px;"name="login_button" value="Zaloguj"><br>
</form>
<form action="password_reset.php">
    <input type="submit" value="Przypomnij hasło"/>
</form><br>
<form action="register.php">
    <input type="submit" value="Kliknij tutaj, aby się zarejestrować"/>
</form>

<?php
//Wyświetlenie potencjalnych errorów
if(isset($_SESSION['login_error'])){
  echo $_SESSION['login_error'];
};
 ?>
</div>







  </body>
</html>
