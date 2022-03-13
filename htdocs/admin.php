<?php
session_start();

if(!isset($_SESSION['logged_in'])||$_SESSION['logged_in']!=true||$_SESSION['acc_type']!="0"){
  header('Location: login.php');
  exit();
};
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-Clacks-Overhead" content="GNU Terry Pratchett" />
    <title>Admin control panel</title>
  </head>
  <body>


      <div id="container">
    <?php

    include('menu.php');
    ?>

    <div id="content">
      <h1 id="welcome">Witaj, <span id="school_name">administratorze</span>!</h1>
    <h1>
    <b>Zmiana hasła</b></h1>
    <form action="changepass.php" method="post" if="formularz">
    <input  type="password" name="pass1" placeholder="Wpisz nowe hasło"><br>
    <input  type="password" name="pass2" placeholder="Powtórz nowe hasło"><br>
    <input type="submit" name="przycisk" value="Zmień hasło">
    </form>
    <?php if(isset($_SESSION['err_passchange'])){echo '<div class="error">'.$_SESSION['err_passchange']."</div>"; unset($_SESSION['err_passchange']);}
    ?>
    </div>

    <?php
    include('footer.php');
    ?>





      </div>



  </body>
</html>
