<?php
	session_start();
	if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
        exit;
    }
    else{
        echo ("<script type=\"text/javascript\">alert(\"Welcome user!\");</script>");
    }  
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
        <h2> Quiz 2 - Project Portal - Signed In</h2>
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

        //Checks if the user has clicked the project_add button
        $havePost = isset($_POST["project_add"]);
        if($havePost){
            header("Location: project.php");
        }

        //if db conn is ok, display all projects
        if($dbOk){
            $query = "SELECT * FROM `projects`";
        }
    ?>
    <section>
        <form id="old_user" name="old_user" action="index.php" method="post">
            <fieldset>
                <legend>Project List</legend>
                <div class="formData">

                    

                    <input class="btn btn-primary" type="submit" value="Add Project to List" id="project_add" name="project_add"/>
                </div>
            </fieldset>
        </form>
    </section>
</body>
</html>