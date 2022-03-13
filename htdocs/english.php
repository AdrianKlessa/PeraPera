<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-Clacks-Overhead" content="GNU Terry Pratchett" />
    <link rel="stylesheet" href="style.css">
    <title>PeraPera - your own language school!</title>
  </head>
  <body>
  <div id="container">
<?php

include('menu.php');
?>

<div id="content">
<img src="logo.png" alt="Logo" id="logo_main"><br>

<h1 id="welcome">Welcome to the main site of the <span id="school_name">PeraPera Language School</span></h1>
We offer professional Polish language courses to foreigners. The lessons are conducted in English by our staff, who have years of experience as teachers,
translators and, most importantly, passionate users of their language. We offer lessons in a one-on-one setting either in our
school's classrooms or in our clients' houses. This allows us to adjust our materials to the specific proficiency level of our student.
The cost of the lessons is 100 zł or 30 euros per hour. We accept payments via bank transfers and hard cash.<br>

<h4>If you're interested, please contact us at:  (+48)123-456-789 or PeraPera&#64;gmail.com</h4>


</div>

<?php
include('footer.php');
?>





  </div>


  </body>
</html>
