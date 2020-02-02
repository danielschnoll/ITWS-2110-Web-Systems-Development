<?php 


   require '../config.php';

   try {

      $conn = new PDO('mysql:host='.$config["DB_HOST"].';dbname=websys_shop', $config['DB_USERNAME'], $config['DB_PASSWORD']);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // if ($conn) {
   //    echo "Connected!";
   // }



// $conn->quote is used for escaping which we will talk about soon

// Part 1

      $results = $conn->query('SELECT * FROM customers');
      
// Output query results      
      foreach ($results as $row) {
         echo '<pre>';
         print_r($row);
         echo '</pre>';

         // printf("Last name = %s", $row['lname']);
      }

   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }


   // // Part 2   
   // // For Part 2 Set up a temporary variable to hold our ID - typically this will come as a parameter
   // $id = 2;

   // $results = $conn->query('SELECT * FROM customers WHERE id='.$id);

   // // Output query results      
   //    foreach ($results as $row) {
   //       printf("Last name = %s", $row['lname']);
   //    }

   // } catch(PDOException $e) {
   //    echo 'ERROR: ' . $e->getMessage();
   // }

 ?>