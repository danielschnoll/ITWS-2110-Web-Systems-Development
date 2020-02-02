<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">

<title>Lab 10</title>

</head>
<body> 
<h1>Student Course Management Installation page</h1>
<?php

   // Menu
   $menu=file_get_contents("menu.txt");
   $base=basename($_SERVER['PHP_SELF']);
   $menu=preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu);
   echo $menu;

   // Code for the lab

   require 'config.php';

   // Part 1 Step 1: Create the database, if it does not exist
 
  $conn = pg_connect ("host=localhost port=5432 dbname=websyslab10 user=thilanka password=abc123");

    if($conn) {
       echo 'connected';
       // $query = "CREATE DATABASE IF NOT EXISTS ".$config["DB_NAME"].";";
       // $result = pg_query($conn, $query);

        $sql = "CREATE TABLE IF NOT EXISTS courses4  (
        crn integer NOT NULL SERIAL PRIMARY KEY,
        prefix varchar (4) NOT NULL,
        number integer NOT NULL,
        title varchar (255) NOT NULL,
        section integer NOT NULL,
        year integer NOT NULL);";

        $result = pg_query($conn, $sql);

        $sql = "INSERT INTO courses4 (crn, prefix, number, title, section, year) VALUES
      (948824123, 'ITWS', 6640, 'Data Science', 1, 2018),
      (958822123, 'ITWS', 2110, 'Web Systems Development', 1, 2018),
      (984512123, 'ITWS', 3456, 'XInfomatics', 1, 2019),
      (987765123, 'ITWS', 4500, 'Web Sys Development', 1, 2019);";

        $result = pg_query($conn, $sql);

        if (!$result) {
          echo "An error occurred.\n";
          exit;
        }


    } else {
        echo 'there has been an error connecting';
    } 

?>

</body>
</html>