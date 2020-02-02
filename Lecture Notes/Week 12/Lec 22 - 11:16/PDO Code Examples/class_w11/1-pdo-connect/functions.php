<?php 


   require '../config.php';

   try {
//      open connection here

   	$host = $config["DB_HOST"];
   	$user = $config["DB_USERNAME"];
   	$pass = $config["DB_PASSWORD"];

   	$conn = new PDO("mysql:host=".$host.";dbname=websys_shop",$user,$pass);


   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }

   if ($conn) {
      echo "Connected!";
   }
 ?>