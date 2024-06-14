<?php
require('../config.php');
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: ../login.php");
    exit(); 
  }
  // Vérifiez si l'utilisateur est un admin, sinon redirigez-le vers la page index
  if ($_SESSION['type'] !== 'admin') {
  header("Location: ../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('../config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);
  
    $query = "INSERT into `user` (username, email, type, password)
          VALUES ('$username', '$email', '$type', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-title">Ajouter un utilisateur</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
  <input type="text" class="box-input" name="email" placeholder="Email" required />
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
  </div>
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="Ajouter" class="box-button" />
    <input type="button" name="return" onclick="window.location.href = './home.php'" value="Retour" class="box-button" />
</form>
<?php } ?>
</body>
</html>