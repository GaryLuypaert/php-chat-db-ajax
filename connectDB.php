<?php

$dbHost = "localhost";
$dbName = "chat_ajax";
$dbUser = "root";
$dbPassword = "user";

try 
{
	$bdd = new PDO("mysql:host=".$dbHost.";dbname=".$dbName.";charset=UTF8", $dbUser, $dbPassword);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>