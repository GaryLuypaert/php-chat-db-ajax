<?php

require 'connectDB.php';

session_start();

if (!isset($_SESSION['account_id'])) {
  // Dans le cas où la session n'existe pas
  header('location: index.php');
}

$accountID = $_SESSION['account_id'];

$query = "SELECT * FROM users WHERE id=$accountID";
$req = $bdd->query($query);
$item = $req->fetchAll(PDO::FETCH_ASSOC)[0];


?>

<!DOCTYPE html>
<html>
  <head>
  <title>Chat</title>
  <meta charset="utf-8">
  <meta name="description">
  <meta name="keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" charset="utf-8">
  </head>
  <body>
    <div class="container-fluid main">

          <?php
          echo "<pre>";
          print_r($item);
          echo "</pre>";
          ?>

        <div class="thumbnail main-member">
          <h3>Bienvenue chez vous <?= $item['username']; ?></h3>
          <a href="disconnect.php">Se déconnecter</a>
          
          <div class="contenu-chat">
          </div>

          <form class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" name="msg-tosend">
              <button type="submit" class="btn btn-default">Envoyer</button>
            </div>
          </form>
        </div>


    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script> 
  </body>
</html>