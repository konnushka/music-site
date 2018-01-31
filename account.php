<?php

session_start();
include("includes/database.php");
//include("includes/search.php");
include("autoloader.php");
//name the page
$page_title = "Welcome to Kroetta";
//setup the site name inforation

if (isset($_SESSION["username"])&& isset($_SESSION["userid"]))
{
          
   $username=$_SESSION["username"];
   $userid=$_SESSION["userid"];
   $email=$_SESSION["email"];
   $message=array();
   
    if ($_SERVER["REQUEST_METHOD"] =="POST")
    {
        
        $password=$_POST["password"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        
            if($password != $_SESSION["password"])
            {$_SESSION["password"] = $password;}
            else{$password = $_SESSION["password"];}
            
            if($email != $_SESSION["email"])
            {$_SESSION["email"] = $email;}
             else{$email = $_SESSION["email"];}
             
            if($password != $_SESSION["username"])
            {$_SESSION["username"] = $username;}
             else{$username = $_SESSION["username"];} 
        
        
        $query = "UPDATE user SET email=\"$email\",username=\"$username\",password=\"$password\" WHERE userid=\"$userid\" ";
        $stmt = $conn -> prepare ($query);
       
        echo $query;
        
            if($stmt -> execute())
            {
                $message[update]="Success Information Edited ";
                $_SESSION["username"]=$username;
                $_SESSION["email"]=$email;
            }              
            else{$message[update]="something went wrong Clear and Try Again";}
    }
    else
    {
        $message[update]="No Changes Made Yet";
        //$message[update] = $_SERVER['REQUEST_METHOD'];
    }
    
    $conn->close; 
}
else {
    //send user to log in to page
    header("location: login.php");
}




?>
<!DOCTYPE html>
<html>
     <?php include("includes/head.php"); ?>
    <body>
         <?php include("includes/navigation.php"); ?>
        <div class="container-fluid">
            
            <div class="row space">
                <div class="col-sm-offset-3 "><?php echo "Welcome to Your Account Page $username";?></div>
            </div>
            <div class="row">
                
                <form class="form-horizontal" method="post" action="account.php">
                    
                    <fieldset>
                      <legend class="col-sm-offset-3">Account Settings</legend>
                            <div class="form-group">
                                
                                <label class="col-sm-offset-2 control-label col-sm-2"  for="username">Username</label>
                                
                                    <div class="col-sm-4">
                                        <input type="username" class="form-control" id="email" name="username" placeholder="<?php echo $username;?>">
                                        
                                    </div>
                                    
                                        
                            </div>
                            
                            <div class="form-group">
                                
                                <label class="col-sm-offset-2 control-label col-sm-2" for="email">Email</label>
                                
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email;?>">
                                        
                                    </div>
                                    
                                        
                            </div>
                            
                             <div class="form-group">
                                
                                <label class="col-sm-offset-2 control-label col-sm-2" for="password">Password</label>
                                
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="email" name="password" placeholder="New Password">
                                        
                                    </div>
                                    
                                        
                            </div>
                          
                                    <div class="col-sm-offset-5 col-sm-2 ">
                                            <button type="submit" name="update" class"btn btn-success"> Update</button>
                                        </div>
                                     <span class="help-block"><?php echo $message["update"];?></span>
                        </fieldset>
                </form>
                
               
              </div> 
              
              <div class="row">
                  
                   <form class="form-horizontal" method="post" action="account.php">
                    
                    <fieldset>
                      <legend class="col-sm-offset-3">Add New Music</legend>
                            <div class="form-group">
                                
                                <label class="col-sm-offset-2 control-label col-sm-2"  for="username">Song Name</label>
                                
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="song_name" name="song_name" placeholder="<?php echo " $username Whats it called";?>">
                                        
                                    </div>
                                    
                                        
                            </div>
                            
                            <div class="form-group">
                                
                                <label class="col-sm-offset-2 control-label col-sm-2" for="email">Artist</label>
                                
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="artist_name" name="artist_name" placeholder="Whats the artist name">
                                        
                                    </div>
                                    
                                        
                            </div>
                            
                            
                                    <div class="col-sm-offset-5 col-sm-2 ">
                                            <button type="submit" name="update" class"btn btn-success"> Upload Music</button>
                                        </div>
                                     <span class="help-block"><?php echo $message["updatemusic"];?></span>
                        </fieldset>
                </form>
                
                  
                  
              </div>
        </div>
        
    </body>
</html>