<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
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
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['']; ?>!</h1>
    <p>C'est votre espace utilisateur.</p>
    <a href="login.php">Déconnexion</a>
    </div>
  </body>
</html>