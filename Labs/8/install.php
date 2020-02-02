<?php

$install = false;
$load = false;
$username = "root";
$password = "";
$query = "";

if ($_POST["options"] == "Install") 
	$install = true;
if ($_POST["options"] == "Load")
	$load = true;

try {

    $conn = new PDO("mysql:host=localhost", $username, $password);

    $sql = $conn -> prepare("CREATE DATABASE IF NOT EXISTS `websyslab8`");
    $sql -> execute();

    $conn = new PDO("mysql:host=localhost; dbname=websyslab8", $username, $password);
    
    $sql = $conn -> prepare("

    CREATE TABLE IF NOT EXISTS `courses` (
		`crn` int(5) NOT NULL,
		`prefix` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`number` smallint(4) NOT NULL,
		`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`section` int(2) NOT NULL,
		`year` int(4) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


	  CREATE TABLE IF NOT EXISTS `students` (
		`rin` int(9) NOT NULL,
		`rcsID` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`phone` int(10) NOT NULL,
		`street` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`state` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
		`zip` int(5) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

	CREATE TABLE IF NOT EXISTS `grades` (
		`id` int(11) NOT NULL,
		`crn` int(11) NOT NULL,
		`rin` int(11) NOT NULL,
		`grade` int(3) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


	ALTER TABLE `students`
		ADD PRIMARY KEY (`rin`);

	ALTER TABLE `courses` 
		ADD PRIMARY KEY (`crn`);

	ALTER TABLE `grades`
		ADD PRIMARY KEY (`id`);

	ALTER TABLE `grades`
		ADD KEY `rin` (`rin`),
		ADD KEY `crn` (`crn`) USING BTREE;

	ALTER TABLE `grades`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

	ALTER TABLE `grades`
		ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`rin`) REFERENCES `students` (`rin`),
  		ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`crn`) REFERENCES `courses` (`crn`); 

  	");

    $sql -> execute();

    if ($install){
    	print("Installed Successfully!");
    }

    if ($load){

    	$sql = $conn -> prepare("
    		INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
			(71399, 'CSCI', 1200, 'Data Structures', 1, 2018),
			(73018, 'CSCI', 4440, 'Software Design and Documentation', 1, 2018),
			(74941, 'ITWS', 1100, 'Introduction to ITWS', 1, 2018),
			(75447, 'ITWS', 4130, 'Managing IT Resources', 1, 2018);
		
			INSERT INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
			(1, 71399, 661534196, 86),
			(2, 71399, 661283234, 76),
			(3, 71399, 661638923, 90),
			(4, 73018, 661534196, 100),
			(5, 73018, 661283234, 100),
			(6, 73018, 661203984, 100),
			(7, 74941, 661534196, 90),
			(8, 74941, 661283234, 85),
			(9, 75447, 661534196, 85),
			(10, 75447, 661283234, 74);

			INSERT INTO `students` (`rin`, `rcsID`, `first_name`, `last_name`, `alias`, `phone`, `street`, `city`, `state`, `zip`) VALUES
			(661203984, 'herrmc', 'Christer', 'Herrmans', 'Christer', 2015555555, '316 Congress Street', 'Troy', 'NY', 12180),
			(661283234, 'fauvea', 'Alex', 'Fauver', 'Alex', 2147483647, 'Tibbets Ave', 'Troy', 'NY', 12180),
			(661534196, 'schnod', 'Daniel', 'Schnoll', 'Dan', 2019945902, '316 Congress Street', 'Troy', 'NY', 12180),
			(661638923, 'bacalc', 'Chris', 'Bacallao', 'Chris', 2147483647, '316 Congress Street', 'Troy', 'NY', 12180);
		");

    	$sql -> execute();

    	print("Loaded Successfully!");
 	}
    $sql = null;

	}
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
?>