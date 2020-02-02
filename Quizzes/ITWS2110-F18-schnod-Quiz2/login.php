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
        <h2> Quiz 2 - Project Portal - Log In</h2>
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
            //Grabs email and password from the post request
            $email    = htmlspecialchars(trim($_POST["my_email"]));
            $password = htmlspecialchars(trim($_POST["my_password"]));
            $encrypt    = $password; //encrypts the password
            
            
            //queries into user database and checks whether or not
            //the email and password match a row in the users table
            $query = "SELECT * FROM `users` WHERE `username` = \"" . $email . "\"";
            $result = $db->query($query);
            if ($result->num_rows == 0) { //if no rows, the wrong email or password was entered
                header("Location: register.php");
                exit;
            } else { //if there is a match to a user in the table
                $record             = $result->fetch_assoc();
                $_SESSION["userid"] = $record['u_id']; //set session userid to the corresponding value
                $_SESSION["uemail"] = $record['username'];
                header("Location: index.php"); //relocates to the homepage 
                exit;
            }
        }
    ?>
    <section>
        <form id="old_user" name="old_user" action="login.php" method="post">
            <fieldset>
                <legend>Sign in</legend>
                <div class="formData">

                    <label class="field">User Email</label>
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