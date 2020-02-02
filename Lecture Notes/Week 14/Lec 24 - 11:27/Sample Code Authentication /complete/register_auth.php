<?php
  session_start();
  
  // Connect to the database
  try {
   $dbname = 'lecture18';
  $user = 'thilanka';
  $pass = 'abc123';
  $dbconn = new PDO('mysql:host=127.0.0.1;dbname='.$dbname, $user, $pass);
 }
  catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
  
// // vaidate admin
//     $is_admin = $dbconn->prepare('SELECT is_admin FROM users_auth WHERE username=:username AND is_admin=1');   
//     $is_admin->execute(array(':username' => $_SESSION['username']));
//     $user = $is_admin->fetch();
  

  // // Redirection to login_secure_auth.php
  //   if (isset($_POST['quit']) && $_POST['quit']=='Quit') {
  //     header('Location: login_secure_auth.php');
  //     exit();
  //   }



      if (isset($_POST['register']) && $_POST['register'] == 'Register') {
        // Validate fields
        // @TODO: Also check to see if duplicate usernames exist
        
        if (!isset($_POST['username']) || !isset($_POST['pass']) || !isset($_POST['passconfirm']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['passconfirm'])) {
          $msg = "Please fill in all form fields.";
        }
        else if ($_POST['pass'] !== $_POST['passconfirm']) {
          $msg = "Passwords must match.";
        }
        else {
          // Generate random salt
          $salt = hash('sha256', uniqid(mt_rand(), true));      

          // Apply salt before hashing
          $salted = hash('sha256', $salt . $_POST['pass']);
   	  
          $is_admin = ($_POST['isadmin'] == "true" ? true : false);

          // Store the salt with the password, so we can apply it again and check the result
          $stmt = $dbconn->prepare("INSERT INTO users_auth (username, pass, salt, is_admin) 
                              VALUES (:username, :pass, :salt, :isadmin)");
          $stmt->execute(array(':username' => $_POST['username'], 
                               ':pass' => $salted, 
                               ':salt' => $salt,
                               ':isadmin'=> $is_admin
                                ));
          $msg = "Account created.";
        }
      } 
    
    // if ($_SESSION['is_admin'] != true) {
    //   header('Location: login_secure_auth.php');
    //   exit();
    // } 
?>
<!doctype html>
<html>
<head>
  <title>Lecture 18 Registration</title>
</head>
<body>
  <h1>User Registration</h1>
  <?php if (isset($msg)) echo "<p>$msg</p>" ?>
  <form method="post" action="register_auth.php">
    <label for="username">Username: </label><input type="text" name="username" />
    <label for="pass">Password: </label><input type="password" name="pass" />
    <label for="passconfirm">Confirm: </label><input type="password" name="passconfirm" />
    <label for="setadmin">Admin?: </label><input type="radio" name="isadmin" value="true" />Yes
                                          <input type="radio" name="isadmin" value="false" />No
    <input type="submit" name="register" value="Register" />

  <form method="post" action="login_secure_auth.php">
    <input name="quit" type="submit" value="Quit" />
  </form>


  </form>
</body>
</html>
