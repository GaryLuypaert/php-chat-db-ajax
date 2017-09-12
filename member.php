<?php

require 'connectDB.php';

session_start();

if (!isset($_SESSION['account_id'])) {
  // Dans le cas où la session n'existe pas
}

$accountID = $_SESSION['account_id'];

$query = "SELECT username FROM users WHERE id=$accountID";
$req = $bdd->query($query);
$item = $req->fetchAll(PDO::FETCH_ASSOC)[0];


$queryMessage = "SELECT messages.message, messages.date_send, users.username FROM messages INNER JOIN users ON messages.sender = users.id ORDER BY messages.date_send ASC";
$statement = $bdd->query($queryMessage);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

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

        <div class="thumbnail main-member">
          <img src="img/logo.png" alt="logo" id="logo-member">
          <h3>Bienvenue chez vous <?= $item['username']; ?></h3>
          <a href="disconnect.php">Se déconnecter</a>

          <div class="container">
            <div class="row">
              <div class="col-xs-5 col-md-7 col-md-offset-1">
                <div class="well chat" id="test">
                  
                <?php 

                  foreach ($result as $value) {
                  echo '<div class="bubble-chat">';
                  echo '<span style="color:green">'.$value['username'].'</span>';
                  echo '(<span style="font-style: italic">'.$value['date_send'].'</span>) dit : ';
                  echo '<span style="color:black">'.$value['message'].'</span>';
                  echo '</div>';
                  }

                ?>

                </div>
              </div>
            </div>
          </div>

<!--           <form action="" method="POST" class="form-inline"> -->
            <div class="form-group">
              <input type="text" class="form-control" name="msg-tosend" id="msg-tosend-id">
              <button type="submit" class="btn btn-default" onclick="sendMsg();">Envoyer</button>
            </div>
         <!--  </form> -->
        </div>


    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script> 

    <script>

      function getXHR() {
        var xhr = null;

        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        }
        else if (window.ActiveXObjet) {
            try {
                xhr = new ActiveXObjet("Msxml2.XMLHTTP");
            }
            catch(e)
            {
                xhr = new ActiveXObjet("Microsoft.XMLHTTP");
            }
        }else {
            alert("Dll another browser");
            xhr = false;
        }
        return xhr;
        }


      function sendMsg() {
        var xhr = getXHR();

        var msg = document.getElementById("msg-tosend-id").value;

        
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
             console.log(msg);
             document.getElementById("test").innerHTML = this.responseText;
            }
        };
        xhr.open("POST", "sendMessage.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("msg-tosend=" + msg);
    }

    </script>
  </body>
</html>