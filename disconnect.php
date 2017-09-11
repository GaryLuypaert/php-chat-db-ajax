<?php

require 'connectDB.php';

session_destroy();
header("Location: index.php");

?>
