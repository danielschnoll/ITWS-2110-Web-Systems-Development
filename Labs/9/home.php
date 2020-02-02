<?php
	session_start();
	if (!isset($_SESSION['userid'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daniel Schnoll - ITWS 2110</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="menuConfig.js"></script>
    <link href="styleSheet.css" rel="stylesheet" type="text/css" />
  </head> 

  <body id="Body">
    <h1>
      <div id="header" class="jumbotron text-center"> Lab 9
      </div> 
    </h1>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="index.php">logout</a>
    </div>
    <span class="sidebar" onclick="openNav()">&#9776; Navigation</span>
    <div id="spaceFiller">
    <div class="container text-center">
        <div class="row">
          Welcome to the ITWS 2110 Course Information page! Click the Navigation Bar to begin exploring the content taught in this class!
        </div>
      </div>
    
    </div>
      <?php
        $dbOk = false;

        //creates a connection to the database
        @ $db =  new mysqli('localhost', 'root', '', 'websyslab9');
    
        //output errors if connection fails
        if ($db->connect_error) {
          echo '<div class="messages">Could not connect to the database. Error: ';
          echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
        } else {
          $dbOk = true; 
        }
    
        //if the user has signed in, check if they signed in correctly
        $haveID = isset($_SESSION["userid"]);
    
        $errors = '';
    
        if ($haveID) {
          if ($dbOk) {
            if(isset($_GET['link'])){
              $insQuery = "insert into saved (`UID`,`material`) values(?,?)";
              $statement = $db->prepare($insQuery);
              $statement->bind_param("is",$_SESSION['userid'],$_GET['link']);
              // make it so:
              $statement->execute();
            }
          }
        }else{
          echo "<h1>ERROR</h1>";
        }
      ?>

    <footer>
      <p>WebSys Fall 2018</p>
    </footer>
  </body>

</html>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function refreshpage() {
      location.reload();
    }
  
    function load(clicked_id) {
      var c = document.getElementById("spaceFiller").children;
      var tofind = "#" + clicked_id + "div"
      $(c[0]).replaceWith(jQuery(tofind));
    }
  
  
    // $(document).ready(function(){
    //   $.getJSON('websysinfo.json', function(data) {
    //       $.each(data.websys_course, function(key,val){
    //         var keys = "<h3 align='center'>" + key + "</h3>";
    //         $(keys).appendTo("#mySidenav");
    //         $.each(val, function(k,v){
    //           title = v.Title;
    //           descript = v.Description;
    //           link = v.Link;
    //           var addinfo = "<div class='info_selected' id='" + k + "div'><b>" + v.Label + "</b></br></br>"+ title + "</br></br>" + descript + "</br></br><a href='" + link + "'>Content Link</a></br></br></div>"
    //           var info = "<div><button class='selection' id='" + k + "' type='button' onclick='load(this.id)'>" + v.Label +  "</button></div>";
    //           $(info).appendTo("#c_content");
    //           $(addinfo).appendTo("#all_info");
    //         });
    //       });
    //   });
    // });
  
  </script>

