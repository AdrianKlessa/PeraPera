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


if(isset($_POST['email'])){

$all_clear=true; // zakładamy że walidacja przeszła w porządku

//Sprawdzenie poprawności pseudonimu
$nick=$_POST['username'];
if((strlen($nick)<3)||(strlen($nick)>20)){
  $all_clear=false;
  $_SESSION['err_nick']="Nazwa użytkownika musi mieścić się w przedziale 3-20 znaków";
};

if (preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+¬-]/', $nick))
{
    $all_clear=false;
    $_SESSION['err_nick']="Pseudonim nie może zawierać znaków specjalnych. Litery spoza alfabetu łacińskiego są OK. ";
};

//Sprawdzanie poprawności imienia
$name=$_POST['name'];
if((strlen($name)<1)||(strlen($name)>60)){
  $all_clear=false;
  $_SESSION['err_name']="Imię musi mieć pomiędzy 1 i 60 znakami";
};

if (preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+¬-]/', $name))
{
    $all_clear=false;
    $_SESSION['err_name']="Imię nie może zawierać znaków specjalnych. Litery spoza alfabetu łacińskiego są OK. ";
};
//Sprawdzanie poprawności nazwiska
$surname=$_POST['surname'];
if((strlen($name)<1)||(strlen($name)>60)){
  $all_clear=false;
  $_SESSION['err_surname']="Naziwsko musi mieć pomiędzy 1 i 60 znakami";
};
if (preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+¬-]/', $surname))
{
    $all_clear=false;
    $_SESSION['err_nick']="Naziwsko nie może zawierać znaków specjalnych. Litery spoza alfabetu łacińskiego są OK. ";
};


//Sprawdzanie adresu e-mail

$mail=$_POST['email'];
$mailS=filter_var($mail, FILTER_SANITIZE_EMAIL);
if((filter_var($mailS, FILTER_VALIDATE_EMAIL)==false)||($mailS!=$mail)){
  $all_clear=false;
  $_SESSION['err_mail']="Coś jest nietak z adresem e-mail. Proszę, sprawdź go jeszcze raz";

}

//sprawdzanie hasła

$pass1=$_POST['password1'];
$pass2=$_POST['password2'];

if((strlen($pass1)<8)||(strlen($pass1)>35)){
  $all_clear=false;
  $_SESSION['err_pass']="Hasło musi posiadać od 8 do 35 znaków";
};
if($pass1!=$pass2){
  $all_clear=false;
  $_SESSION['err_pass']="Podane hasła są różne";
};

$hashed_pass=password_hash($pass1, PASSWORD_DEFAULT);
if(!isset($_POST['TOS'])){
  $all_clear=false;
  $_SESSION['err_TOS']="By się zarejestrować musisz zaakceptować regulamin";

}
//Captcha
$secret_key="6LdqqXIUAAAAAC8a9rZPUCXH4APoecC9RoB48QQC";
$check=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response=json_decode($check);
if(!($response->success)){
  $all_clear=false;
  $_SESSION['err_bot']="Poprawnie przejdź test CAPTCHA. Przpraszamy. Nie chcemy robotów.";
};
//Zapamiętywanie danych wprowadzonych już do formularza na wypadek błędów
$_SESSION['rem_nick']=$nick;
$_SESSION['rem_mail']=$mail;
$_SESSION['rem_name']=$name;
$_SESSION['rem_surname']=$surname;
$_SESSION['rem_pass1']=$pass1;
$_SESSION['rem_pass2']=$pass2;
if (isset($_POST['TOS'])) {
  $_SESSION['rem_TOS']=true;
};

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try{

$connection=new mysqli($host,$db_user,$db_password,$db_name);
if ($connection->connect_errno!=0){

throw new Exception(mysqli_connect_errno());
}else{

  //Sprawdzenie istnienia maila w bazie
  $result=$connection->query("SELECT userid FROM users WHERE email='$mail'");
  if(!$result)throw new Exception($connection->error);
    $mail_number=$result->num_rows;
      if($mail_number>0){
        $all_clear=false;
        $_SESSION['err_mail']="W bazie danych istnieje już konto o tym adresie e-mail";
      }
  //Sprawdzenie istnienie pseudonimu w bazie
        $result=$connection->query("SELECT userid FROM users WHERE username='$nick'");
        if(!$result)throw new Exception($connection->error);
          $nick_number=$result->num_rows;
            if($nick_number>0){
              $all_clear=false;
              $_SESSION['err_nick']="W bazie danych istnieje już użytkownik o tym pseudonimie. Wybierz inny. Ale nie dosłownie. Nie musisz wybierać pseudonimu \"inny\"";
            };

            if($all_clear==true){
              //Dodawanie użytkownika do bazy
              $date=date("Y-m-d");
              if($connection->query("INSERT INTO users VALUES (NULL, '$nick', '$mail', '$hashed_pass','$name','$surname','1','$date')")){
              $_SESSION['reg_success']=true;
              header('Location: welcome.php');
              exit();


              }else{
                throw new Exception($connection->error);


              }

            };


$connection->close();

}
}catch(Exception $err){
  echo '<span style="color: red;">Błąd serwera. Spróbuj ponownie za kilka minut.</span>';
   echo '<br>Informacja deweloperska: '.$err;
}


}
 ?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Rejestracja</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
<img src="login.png" alt="login image" id="padlock"><br><h1 id="login_title">REJESTRACJA</h1><br>
<div id="form_standard">
<form id="" style="display: block; margin:auto;"method="post">
  <input style="margin-bottom: 3px;" type="text" name="username" placeholder="nazwa użytkownika" value="<?php if(isset($_SESSION['rem_nick'])){echo $_SESSION['rem_nick'];unset($_SESSION['rem_nick']);} ?>"><br> <?php if(isset($_SESSION['err_nick'])){echo '<div class="error">'.$_SESSION['err_nick']."</div>"; unset($_SESSION['err_nick']);} ?>
  <input style="margin-bottom: 3px;" type="text" name="email" placeholder="Adres e-mail" value="<?php if(isset($_SESSION['rem_mail'])){echo $_SESSION['rem_mail'];unset($_SESSION['rem_mail']);} ?>"><br><?php if(isset($_SESSION['err_mail'])){echo '<div class="error">'.$_SESSION['err_mail']."</div>"; unset($_SESSION['err_mail']);} ?>
  <input style="margin-bottom: 3px;" type="text" name="name" placeholder="Imię" value="<?php if(isset($_SESSION['rem_name'])){echo $_SESSION['rem_name'];unset($_SESSION['rem_name']);} ?>"><br><?php if(isset($_SESSION['err_name'])){echo '<div class="error">'.$_SESSION['err_name']."</div>"; unset($_SESSION['err_name']);} ?>
  <input style="margin-bottom: 3px;" type="text" name="surname" placeholder="Nazwisko" value="<?php if(isset($_SESSION['rem_surname'])){echo $_SESSION['rem_surname'];unset($_SESSION['rem_surname']);} ?>"><br><?php if(isset($_SESSION['err_surname'])){echo '<div class="error">'.$_SESSION['err_surname']."</div>"; unset($_SESSION['err_surname']);} ?>
  <input style="margin-bottom: 3px;" type="password" name="password1" placeholder="hasło" value="<?php if(isset($_SESSION['rem_pass1'])){echo $_SESSION['rem_pass1'];unset($_SESSION['rem_pass1']);} ?>"><br><?php if(isset($_SESSION['err_pass'])){echo '<div class="error">'.$_SESSION['err_pass']."</div>"; unset($_SESSION['err_pass']);} ?>
  <input style="margin-bottom: 3px;" type="password" name="password2" placeholder="Powtórz hasło" value="<?php if(isset($_SESSION['rem_pass2'])){echo $_SESSION['rem_pass2'];unset($_SESSION['rem_pass2']);} ?>"><br>
  <span style="color: black;">
  Akceptuję <a href="TermsOfService.php">regulamin</a></span>
  <input type="checkbox" name="TOS" <?php if(isset($_SESSION['rem_TOS'])){echo "checked"; unset($_SESSION['rem_TOS']);}; ?>><br><?php if(isset($_SESSION['err_TOS'])){echo '<div class="error">'.$_SESSION['err_TOS']."</div>"; unset($_SESSION['err_TOS']);} ?><br>
  <div class="g-recaptcha" data-sitekey="6LdqqXIUAAAAAHBheQ0UFNYSjK3RDRxS_EB19_F4" style="margin-left: 675px;"></div><?php if(isset($_SESSION['err_bot'])){echo '<div class="error">'.$_SESSION['err_bot']."</div>"; unset($_SESSION['err_bot']);} ?><br>
  <input class="form_input" type="submit" name="register_button" value="Zarejestruj się"><br>
</form>




</div>







  </body>
</html>
