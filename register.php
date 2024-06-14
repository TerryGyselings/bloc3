<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  
  $req = "INSERT into `user` (username, email, type, password) VALUES ('$username', '$email', 'user', '".hash('sha256', $password)."')";
  $res = mysqli_query($conn, $req);

    if($res){
      header("Location: login.php");
      exit();
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
  
  <input type="text" class="box-input" name="email" placeholder="Email" required />
  
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous</a></p>
</form>
<?php } ?>
</body>
</html>