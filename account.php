<?php

session_start();
include("includes/database.php");
//include("includes/search.php");
include("autoloader.php");
//name the page
$page_title = "Welcome to Kroetta";
//setup the site name inforation

if (isset($_SESSION["username"])|| isset($_SESSION["userid"]))
{
          
   $username=$_SESSION["username"];
     
}
else {
    //send user to log in
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html>
     <?php include("includes/head.php"); ?>
    <body>
         <?php include("includes/navigation.php"); ?>
        <div class="container">
            
            <div class="row">
                <p><?php echo "Welcome to Your Account Page $username";?></p>
            </div>
            <div class="row">
                
                <div class="col-sm-">
                    
                </div>
            </div>
            
        </div>
        
    </body>
</html>