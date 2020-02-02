<?php
	session_start();
	if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
        exit;
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
        <h2> Quiz 2 - Project Portal - Add Project</h2>
    </div>



    <section>
        <form id="old_user" name="old_user" action="index.php" method="post">
            <fieldset>
                <legend>Add Project</legend>
                <div class="formData">

                    

                <input class="btn btn-primary" type="submit" value="Add Project to List" id="project_add" name="project_add"/>
                </div>
            </fieldset>
        </form>
    </section>
</body>
</html>