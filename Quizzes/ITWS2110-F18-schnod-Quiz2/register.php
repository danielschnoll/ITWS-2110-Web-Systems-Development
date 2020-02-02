<?php
    session_start();
?>

<!DOCTYPE html>

<html>
<head>
    <title>Web Systems Development - Quiz 2</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="login.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="header" class="jumbotron text-center">
        <h1> Web Systems Development </h1>
        <h2> Quiz 2 - Project Portal - Registration </h2>
    </div>
    
    <?php
        $dbOk = false;

        //creates a connection to the database
        @$db = new mysqli('localhost', 'root', '', 'websysquiz2');

        //output errors if connection fails
        if ($db->connect_error) {
            echo '<div class="messages">Could not connect to the database. Error: ';
            echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
        } else {
            $dbOk = true;
        }

        //if the user has signed in, check if they signed in correctly
        $havePost = isset($_POST["sign_in"]);

        if ($havePost && $dbOk) {
            //Grabs post request contents
            $first    = htmlspecialchars(trim($_POST["first_name"]));
            $last     = htmlspecialchars(trim($_POST["last_name"]));
            $email    = htmlspecialchars(trim($_POST["my_email"]));
            $password = htmlspecialchars(trim($_POST["my_password"]));
            $encrypt    = $password; //encrypts the password
            
            
            //queries into user database and checks whether or not
            //the email and password match a row in the users table
            $query = "INSERT INTO `users` (`u_id`, `first_name`, `last_name`, `username`, `password`) VALUES (NULL,\"" . $first . "\", \"" . $last . "\", \"" . $email . "\", \"" . $password . "\")";
            $userResult = $db->query($query);

            header("Location: login.php");
            exit;
        }
    ?>
    <section>
        <h4>Uh oh... looks like you don't have an account with us. Use this form to create a user account!</h4>
        <form id="old_user" name="old_user" action="register.php" method="post">
            <fieldset>
                <legend>Create Account</legend>
                <div class="formData">
                    <label class="field">First Name</label>
                    <div class="value"><input class="form-control" type="text" size="60" value="" name="first_name" id="first_name"/></div>

                    <label class="field">Last Name</label>
                    <div class="value"><input class="form-control" type="text" size="60" value="" name="last_name" id="last_name"/></div>

                    <label class="field">Email</label>
                    <div class="value"><input class="form-control" type="text" size="60" value="" name="my_email" id="my_email"/></div>

                    <label class="field">Password</label>
                    <div class="value"><input class="form-control" type="password" size="60" value="" name="my_password" id="my_password"/></div>

                    <input class="btn btn-primary" type="submit" value="Sign In" id="sign_in" name="sign_in"/>
                </div>
            </fieldset>
        </form>
    </section>
</body>
</html>