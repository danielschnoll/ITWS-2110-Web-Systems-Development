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


// Code for the lab

require 'config.php';

// Part 1 Step 1: Create the database, if it does not exist

$conn = pg_connect("host=localhost port=5432 dbname=websyslab10 user=dschnoll password=abc123");

if ($conn) {
    echo 'connected';
    // $query = "CREATE DATABASE IF NOT EXISTS ".$config["DB_NAME"].";";
    // $result = pg_query($conn, $query);
    
    
    //CREATE COURSES TABLE
    $sql = "CREATE TABLE IF NOT EXISTS courses  (
        crn integer NOT NULL SERIAL PRIMARY KEY,
        prefix varchar (4) NOT NULL,
        number integer NOT NULL,
        title varchar (255) NOT NULL,
        section integer NOT NULL,
        year integer NOT NULL);";
    
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    
    $sql = "INSERT INTO courses (crn, prefix, number, title, section, year) VALUES
      (71399, 'CSCI', 1200, 'Data Structures', 1, 2018),
      (73018, 'CSCI', 4440, 'Software Design and Documentation', 1, 2018),
      (74941, 'ITWS', 1100, 'Introduction to ITWS', 1, 2018),
      (75447, 'ITWS', 4130, 'Managing IT Resources', 1, 2018);";
    
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    
    // CREATE STUDENTS TABLE
    $sql = "CREATE TABLE IF NOT EXISTS students  (
        rin integer NOT NULL SERIAL,
        rcsID char (7) NOT NULL,
        first_name varchar (100) NOT NULL,
        last_name varchar (100) NOT NULL,
        alias varchar (100) NOT NULL,
        phone integer NOT NULL,
        street varchar (100) NOT NULL,
        city varchar (100) NOT NULL,
        us_state char (2) NOT NULL,
        zip integer NOT NULL);";
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    
    $sql = "INSERT INTO students (rin, rcsID, first_name, last_name, alias, phone, street, city, us_state, zip) VALUES
      (661203984, 'herrmc', 'Christer', 'Herrmans', 'Christer', 2015555555, '316 Congress Street', 'Troy', 'NY', 12180),
      (661283234, 'fauvea', 'Alex', 'Fauver', 'Alex', 2147483647, 'Tibbets Ave', 'Troy', 'NY', 12180),
      (661534196, 'schnod', 'Daniel', 'Schnoll', 'Dan', 2019945902, '316 Congress Street', 'Troy', 'NY', 12180),
      (661638923, 'bacalc', 'Chris', 'Bacallao', 'Chris', 2147483647, '316 Congress Street', 'Troy', 'NY', 12180);";
    
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    
    //CREATE GRADES TABLE
    $sql = "CREATE TABLE IF NOT EXISTS grades  (
        id integer NOT NULL SERIAL PRIMARY KEY,
        crn integer (11) NOT NULL,
        rin integer (11) NOT NULL,
        grade integer (3) NOT NULL);";
    
    $result = pg_query($conn, $sql);
    
    if (!$result) {
        echo "An error occurred.\n";
        exit;
    }
    
    $sql = "INSERT INTO grades (id, crn, rin, grade) VALUES
      (1, 71399, 661534196, 86),
      (2, 71399, 661283234, 76),
      (3, 71399, 661638923, 90),
      (4, 73018, 661534196, 100),
      (5, 73018, 661283234, 100),
      (6, 73018, 661203984, 100),
      (7, 74941, 661534196, 90),
      (8, 74941, 661283234, 85),
      (9, 75447, 661534196, 85),
      (10, 75447, 661283234, 74);";
    
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
