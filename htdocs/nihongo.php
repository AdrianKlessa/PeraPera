<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-Clacks-Overhead" content="GNU Terry Pratchett" />
    <link rel="stylesheet" href="style.css">
    <title>「ぺらぺら」語学の学校</title>
  </head>
  <body>
  <div id="container">
<?php

include('menu.php');
?>

<div id="content">
  <img src="logo.png" alt="Logo" id="logo_main"><br>

  <h1 id="welcome"> <span id="school_name">ペラペラ語学の学校</span>へようこそ！</h1>
  お宅は、専門的なポランド語の学習を提供いたします。お宅の教師は年々の経験がありますので、学級の優劣は最高です。単語と文法は簡単に説明されたことから、学生はすぐに本を読めるになって来ます。
  一時間の値段はただの１００złです。ユーロ、円で払うこともできます「それなら、ねだんは３０ユーロあるいは四千円です」。 授業の難易度は学生の能力に合わせています。

  <br>

  <h4 id="contact">興味がありますか？それなら、問い合わせ先は以下:  <br>(+48)123-456-789、 PeraPera&#64gmail.com</h4>


</div>

<?php
include('footer.php');
?>





  </div>


  </body>
</html>
