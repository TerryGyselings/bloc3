<?php
  session_start();
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page utilisateur</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['']; ?>!</h1>
    <p>C'est votre espace utilisateur.</p>
    <a href="logout.php">Déconnexion</a>
    </div>
  </body>
</html>