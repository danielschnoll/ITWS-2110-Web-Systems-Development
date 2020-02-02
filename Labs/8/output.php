<?php

$students = false;
$grade = false;
$username = "root";
$password = "";

if ($_POST["options"] == "Students")
	$students = true;

if ($_POST["options"] == "Grade Distribution")
	$grade = true;

try {

	$conn = new PDO('mysql:host=localhost;dbname=websyslab8', $username, $password);

	if ($students) {
		$sql = $conn -> prepare("SELECT * FROM `students` ORDER BY `last_name` ASC, `first_name` ASC");

		$sql -> execute();
		// $sql->execute ();
		// print("Students:\n");
		echo "<h3> Students:  </h3>";
		// Reference:https://stackoverflow.com/questions/29655369/how-to-print-a-mysql-database-table-in-php-using-pdo
		// $sql -> setFetchMode(PDO::FETCH_ASSOC);
		// $result = $sql -> fetchAll(PDO::FETCH_ASSOC);
		while ($row = $sql -> fetch(PDO::FETCH_ASSOC)){
			echo $row["rin"]."    ";
			echo $row["first_name"]."    ";
			echo $row["last_name"]."    "; 
			echo $row["street"]." ";
			echo $row["city"]."    ";
			echo $row["state"]."    ";
			echo $row["zip"]."    ";
			echo "</br>";
		}
		// $result = $conn->query($sql);
		
	}

	if ($grade) {

		echo "<h3> Grade Distribution: </h3>";

		$sql = $conn->prepare("
					SELECT *
					FROM `students`, `grades`
					WHERE `grades`.`grade` >= 90 AND `students`.`rin`=`grades`.`rin`");
		$sql->execute();

		if ($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
			echo "<center>90-100: " . COUNT($row)."</center><br>";
		}

		$sql = $conn->prepare("
					SELECT *
					FROM `students`, `grades`
					WHERE `grades`.`grade` < 90 
					AND `grades`.`grade` >= 80 
					AND`students`.`rin`=`grades`.`rin`");

		$sql->execute();

		if ($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
			echo "<center>80-89: " . COUNT($row) . "</center><br>";
		}

		$sql = $conn->prepare("
					SELECT *
					FROM `students`, `grades`
					WHERE `grades`.`grade` < 80
					AND `grades`.`grade` >= 70 
					AND`students`.`rin`=`grades`.`rin`");

		$sql->execute();

		if ($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
			echo "<center>70-79: " . COUNT($row)  . "</center><br>";
		}

		$sql = $conn->prepare("
					SELECT *
					FROM `students`, `grades`
					WHERE `grades`.`grade` < 70
					AND `grades`.`grade` >= 65
					AND`students`.`rin`=`grades`.`rin`");

		$sql->execute();

		if ($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
			echo "<center>65-69: " . COUNT($row) . "</center><br>";
		}

		$sql = $conn->prepare("
					SELECT *
					FROM `students`, `grades`
					WHERE `grades`.`grade` < 65 
					AND`students`.`rin`=`grades`.`rin`");

		$sql->execute();

		if ($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
			echo "<center>< 65: " . COUNT($row)  . "</center><br>";
		}
	}

	$conn = null;

} 
catch (PDOException $e) {
	echo "Connetction failed:" . $e->getMessage();
}


?>