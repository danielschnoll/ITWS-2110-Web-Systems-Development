<?php 


   require '../config.php';

   try {
      $conn = new PDO('mysql:host='.$config["DB_HOST"].';dbname=websys_shop', $config['DB_USERNAME'], $config['DB_PASSWORD']);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// // we could create a new table like this:
//   $tbl_sql = 'CREATE TABLE orders (id int not null, custid int, prodid int, PRIMARY KEY (id))';
//   $conn->exec($tbl_sql);
//   echo "Table created. ";


// setup INSERT statement here
      $newrcd = "INSERT INTO `orders` (`id`, `custid`, `prodid`) VALUES ('2', '3', '2')";
      $conn->exec($newrcd);
      printf("Name inserted");



   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }
 ?>