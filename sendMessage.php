<?php

require 'connectDB.php';

session_start();

if (isset($_POST["message"])) {
$sql = ('INSERT INTO messages(message, date, sender) VALUES ('.$bdd->quote($_POST["message"]).', '.$_POST["time"].', '.$bdd->quote($_POST["sender"]).')');
$prep = $bdd->prepare($sql);
$prep->execute();

}


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
      <img src="img/logo.png" alt="logo" width="100px" height="auto" id="logo-member">

        <div class="thumbnail main-member">
          <h3>Bienvenue chez vous <?= $item['username']; ?></h3>
          <a href="disconnect.php">Se déconnecter</a>


          <div class="well well-lg">
          a
          </div>

<!--           <div class="container">
            <div class="row">
              <div class="col-xs-5 col-md-7 col-md-offset-1">
                <div class="thumbnail chat">

                </div>
              </div>
            </div>
          </div> -->

          <form class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" name="msg-tosend" id="msg-tosend-id">
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