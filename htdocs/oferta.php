<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>PeraPera - twoja szkoła języków obcych!</title>
  </head>
  <body>
  <div id="container">
<?php

include('menu.php');
?>

<div id="content">
Poniżej znajduje się cennik zajęć z poszczególnych języków. Jak sugeruje nazwa naszej strony, specjalizujemy się w językach azjatyckich (języka japońskiego naucza nasz założyciel), lecz nie ograniczamy się do nich i zatrudniamy kadrę o szerokich umiejętnościach. W przypadku jakichkolwiek pytań bądź chęci zarezerwowania kursu, zapraszamy do kontaktu: <br>
<br>
Telefon: 123-456-789<br>
adres e-mail: PeraPera&#64gmail.com;

<h2>
Jedna lekcja w naszej szkole trwa 90 minut. Oferujemy tryb nauczania indywidualny (100 zł za godzinę, prowadzone w szkole bądź u klienta), z możliwością doboru terminów i godzin zajęć indywidualnie. Można również wykupić zajęcia w grupie 4-10 osób - cena wtedy wynosi 20 zł za godzinę. Płatność jest możliwa przelewem lub gotówką.
</h2>

Oferowane języki:
<ul>
<li>japoński</li>
<li>mandaryński</li>
<li>kantoński</li>
<li>koreański</li>
<li>wietnamski</li>
<li>hinduski</li>
<li>angielski</li>
<li>niemiecki</li>
<li>norweski</li>
<li>polski (dla obcokrajowców, zajęcia prowadzone po angielsku)</li>
</ul>

</div>

<?php
include('footer.php');
?>





  </div>


  </body>
</html>
