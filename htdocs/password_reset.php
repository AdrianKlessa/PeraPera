<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Przypomnij hasło</title>
  </head>
  <body>

<div id="form_standard">
Normalnie funkcja "przypomnij hasło" wysłałaby nowo wygenerowany link do zmiany hasła lub wysłała nowo wygenerowane LOSOWE hasło na powiązany adres email, lecz ze względów budżetowych ta strona po prostu prześle na mail twój hash hasła z naszej bazy danych. Odhashuj sobie o ile potrafisz.

<br><br>
<form id="remind" action="mail.php" method="post">
<input type="text" name="username" placeholder="nazwa użytkownika"><br>
<input type="submit" name="remind_submit" value="Wyślij hasło"><br>
</form>
<?php
if(isset($_SESSION['reminder_done'])){
  echo $_SESSION['reminder_done'];
};

 ?>
</div>





  </body>
</html>
