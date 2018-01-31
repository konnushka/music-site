
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

//lets allow searching find and connect

if (isset($_GET["search"]))
{
    $searchwords ="%" . $_GET["search"] . "%";
    //ask the database
    $searchquery = "SELECT artistname From artist WHERE artistname LIKE ?";
    $stmt = $conn -> prepare($searchquery);
    $stmt -> bind_param("s",$searchwords);
    $stmt -> execute();
    $result = $stmt ->get_result();
    
}
else{
     $searchwords ="%" . $_GET["search"] . "%";
    //ask the database
    $searchquery = "SELECT artistname From artist";
    $stmt = $conn -> prepare($searchquery);
    //$stmt -> bind_param("s",$searchwords);
    $stmt -> execute();
    $result = $stmt ->get_result();
}





?>
<!DOCTYPE html>
<html>
     <?php include("includes/head.php"); ?>
    <body>
       <?php include("includes/navigation.php"); ?>
        
        <div class="container">
            
            <div class="row">
                
                <p><h4><?php echo "Hello $username";?></h4></p>
                    
         
            <div class="row">
                
                <form class="form-group row" role="search" method="get" action="index.php">
                    
                     <div class="col-xs-2">
                            <!--<label for="searchoption"></label>-->
                            <select class="form-control" id="selectoption">
                                <option >Artist</option>
                                <option >Songs</option>
                                <option >Genre</option>
                            </select>
                        </div>
                    
                    <div class="form-group col-xs-6">
                      <?php 
                      if($_GET["search"]){ 
                        $searchvalue = $_GET["search"]; 
                      }
                      ?>
                      <input type="text" name="search" class="form-control col-xs-6" placeholder="Search" value="<?php echo $searchvalue;?>">
                    </div>
                    <div class="col-xs-2">
                    <button onclick="getoption()" type="submit" class="btn btn-default" >
                      <span class="glyphicon glyphicon-search"></span>
                      </div>
                    </button>
                </form>
                
            </div>
            
            <div class="row">
                <div class="col-sm-4">
                   <p><a href="artist.php">Artist</a></p>
                </div>
                <div class="col-sm-5">
                    <p><a href="index.php">Songs</a></p>
                </div>
                </div>
                <div class="col-sm-5">
                    <p><a href="genre.php">Genre</a></p>
                </div>
                </div>
            
            <div class="row">
                
             <div class="col-sm-12 sidepage">
                  
                  <?php
                  //lets print it out
                  if($result -> num_rows > 0)//if 1 or more found
                  {
                      //lets loop the data out
                      
                        $song_title = "";
                        $artist_title = "";
                        
                        //echo "<div class=\"row col-sm-6 mainpage\"> ";
                        
                        while($row = $result -> fetch_assoc() )
                        {
                            $song_title = $row["songtitle"];
                            $artist_name = $row["artistname"];
                            echo "
                            <div class=\"row col-sm-3 mainpage\">
                                <div class=\"borderup\">
                                    
                                </div>
                                <div class=\" mytextedit2\">
                                    $artist_name
                                </div>
                            </div>";
                        }
                        //echo "</div>";
                  }
                  else{
                      echo "<h5> Sorry but <br>Nothing Was Found for :<br>$searchwords</h5>";
                  }
                  ?>
                  
              
                 
              </div>
              
              
              
            </div>
            
        </div>
        
    </body>