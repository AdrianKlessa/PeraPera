<?php
session_start();

if(!isset($_SESSION['logged_in'])||$_SESSION['logged_in']!=true){
  header('Location: login.php');
  exit();
};
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-Clacks-Overhead" content="GNU Terry Pratchett" />
    <title>Witaj, <?php echo $_SESSION['user']; ?></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div id="container">
  <?php

  include('menu.php');
  ?>

  <div id="content">
    <h1 id="welcome">Witaj, <span id="school_name">      <?php
          echo $_SESSION['user'];
           ?></span>!</h1>
<h1>
<b>Zmiana hasła</b></h1>
<form action="changepass.php" method="post" if="formularz">
  <input  type="password" name="pass1" placeholder="Wpisz nowe hasło"><br>
  <input  type="password" name="pass2" placeholder="Powtórz nowe hasło"><br>
  <input type="submit" name="przycisk" value="Zmień hasło">
</form>
<?php if(isset($_SESSION['err_passchange'])){echo '<div class="error">'.$_SESSION['err_passchange']."</div>"; unset($_SESSION['err_passchange']);}
?>


<h1>
<b>Kursy, na które jesteś zapisany</b></h1>
<table>
  <tr>

    <th>Tu</th>
    <th>Będą</th>
    <th>Się</th>
  </tr>
  <tr>
    <td>Wyświetlały</td>
    <td>Kursy</td>
    <td>Na</td>
  </tr>
  <tr>
    <td>Które</td>
    <td>Zapisany</td>
    <td>Jest</td>
  </tr>
  <tr>
    <td colspan="3">Użytkownik</td>
  </tr>
  <tr>
    <td colspan="3"><i>(No chyba że nie uda mi się zrobić do tego kwerendy SQL i skryptu generującego tabelę, to wtedy nie będzie.)</i></td>
  </tr>
</table>


  </div>

  <?php
  include('footer.php');
  ?>





    </div>


  </body>
</html>
