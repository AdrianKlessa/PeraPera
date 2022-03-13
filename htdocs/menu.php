<div id="menu">
<ol id="menu_list">
<a href="index.php"><li>Strona główna</li></a>
<a href="info.php"><li>O nas</li></a>
<a href="oferta.php"><li>Nasza oferta</li></a>
<a href="reviews.php"><li>Opinie innych użytkowników</li></a>
<a href="login.php"><li>
<?php
if(isset($_SESSION['logged_in'])){
echo '<b style="text-decoration: none; color:black;">Zalogowany: '.$_SESSION['user']."</b>";
}
else{
echo "Logowanie";
};
if(isset($_SESSION['logged_in'])){
echo '<a href="logout.php" style="text-decoration: none; color:black;"><li>Wyloguj się</li></a>';
}


 ?>



</li></a>
<a href="nihongo.php"><li style="margin-top: -10px">
<img src="japan.png" alt="Japanese flag" style="width: 75px; height: 50px; padding:5px;">
</li></a>
<a href="english.php"><li style="margin-top: -10px">
<img src="British flag.jpg" alt="Flag of Great Britain" style="width: 75px; height: 50px; padding:5px;">
</li></a>
</ol>


</div>
