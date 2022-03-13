<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-Clacks-Overhead" content="GNU Terry Pratchett" />
    <link rel="stylesheet" href="style.css">
    <title>PeraPera - twoja szkoła języków obcych!</title>
  </head>
  <body>
  <div id="container">
<?php

include('menu.php');
?>

<div id="content">
<img src="school_photo.jpeg" style="width: 800px; height: 600px; border-radius: 25px; display:block; margin:auto; margin-top: 20px;" alt="A photo of our school">
<h3 style="text-align: center;">
Nasza szkoła mieści się w centrum Poznania przy ulicy Fredry 14. Założona została przez szanowanego w społeczności językowej
japonistę, profesora Adama Kalkę. Działamy już od 8 lat i jesteśmy dumni z naszej oferty
oraz osiągnięć. Wiele osób dzięki nam nauczyło się języków, których zawsze chciały się nauczyć.
Trudne aspekty nauki dzięki naszym kursantom stają się proste!
<br><br>
Poniżej znajduje się mapa, dzięki której mogą Państwo sprawdzić lokalizację naszej szkoły. Jako że znajduje się w centrum Poznania, dojazd nie powinien stanowić żadnego problemu.
</h3>



<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2046.6614924990577!2d16.919807760878385!3d52.40840865760412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47045b37b4d7854b%3A0xd8618a47265fdedd!2sFredry+14%2C+61-701+Pozna%C5%84!5e0!3m2!1spl!2spl!4v1537381952055" width="800" height="700" frameborder="0" style="border:5px solid black; display:block; margin: auto; margin-bottom: 30px; border-radius: 25px;" allowfullscreen></iframe>
<br><br>



</div>

<?php
include('footer.php');
?>





  </div>


  </body>
</html>
