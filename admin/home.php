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
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?> dans votre espace admin</h1>
    <a href="add_user.php">Ajouter un utilisateur</a> | 
    <a href="../login.php">Déconnexion</a>
    </ul>
  <div>
<?php
  if (isset($_REQUEST['id'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'])) {
  // récupérer l'id de l'utilisateur 
  $id = stripslashes($_REQUEST['id']);
  $id = mysqli_real_escape_string($conn, $id);
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);

  // Préparer la requête de mise à jour
  $query = "UPDATE `user` SET 
            username='$username', 
            email='$email', 
            type='$type' 
            WHERE id='$id'";
  
  $res = mysqli_query($conn, $query);

  if($res) {
    echo "<div class='success'>
          <h3>L'utilisateur a été mis à jour avec succès.</h3>
          <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
    </div>";
  }
} else if (isset($_GET['edit_id'])) {
  // Si l'ID de l'utilisateur est fourni, récupérer les détails de l'utilisateur pour pré-remplir le formulaire
  $id = stripslashes($_GET['edit_id']);
  $id = mysqli_real_escape_string($conn, $id);
  
  $query = "SELECT * FROM `user` WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);
?>
<form class="box" action="" method="post">
  <h1 class="box-title">Modifier un utilisateur</h1>
  <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" value="<?php echo $user['username']; ?>" required />
  <input type="text" class="box-input" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required />
  
  <div>
    <select class="box-input" name="type" id="type" required>
      <option value="user" <?php if ($user['type'] == 'user') echo 'selected'; ?>>User</option>
      <option value="admin" <?php if ($user['type'] == 'admin') echo 'selected'; ?>>Admin</option>
    </select>
  </div>
  
  <input type="submit" name="submit" value="Modifier" class="box-button" />
  <input type="button" name="return" onclick="window.location.href = './home.php'" value="Retour" class="box-button" />
</form>
<?php
} else if (isset($_GET['delete_id'])) {
  // récupérer l'id de l'utilisateur à supprimer
  $id = stripslashes($_GET['delete_id']);
  $id = mysqli_real_escape_string($conn, $id);

  // Préparer la requête de suppression
  $query = "DELETE FROM `user` WHERE id='$id'";
  
  $res = mysqli_query($conn, $query);

  if ($res) {
    echo "<div class='success'>
          <h3>L'utilisateur a été supprimé avec succès.</h3>
          <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
    </div>";
  } else {
    echo "<div class='error'>
          <h3>Erreur lors de la suppression de l'utilisateur.</h3>
          <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
    </div>";
  }
} else {
  // Afficher la liste des utilisateurs avec un bouton d'édition
  $query = "SELECT * FROM `user`";
  $result = mysqli_query($conn, $query);

  echo "<table class='box-table'>";
  echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Type</th><th>Action</th></tr>";
  
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>{$row['type']}</td>
            <td><a href='?edit_id={$row['id']}' class='box-button'>Modifier</a></td>
            <td><a href='?delete_id={$row['id']}' class='box-button'>Supprimer</a></td>
          </tr>";
  }

  echo "</table>";
}
?>
</body>
</html>
