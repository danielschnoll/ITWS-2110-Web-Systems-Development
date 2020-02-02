<?php 

// Call with parameter in browser
// http://websys/class_w11/5-pdo-queryfromget/functions.php?lname=Smith

   require '../config.php';

   try {
      $conn = new PDO('mysql:host='.$config["DB_HOST"].';dbname=websys_shop', $config['DB_USERNAME'], $config['DB_PASSWORD']);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if (isset($_GET['lname'])) {
         if ($_GET['lname'] != '') {
            $pstmt = $conn->prepare('SELECT * from customers WHERE lname = :ln');
            $pstmt->bindParam('ln', $_GET['lname'], PDO::PARAM_STR);
         } else {
            echo "lname not given, outputting entire file";
            $pstmt = $conn->prepare('SELECT * from customers');
         }
         $pstmt->execute();
         $row = $pstmt->fetchALL();
         echo '<pre>';
         print_r($row);
         echo '</pre>';

         foreach($row as $r) {
            printf("%s %s",$r['fname'],$r['lname']);
            echo '<br/>';
         }

      }
   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }

 ?>