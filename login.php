
<?php

session_start();

include("autoloader.php");
//setup the site name inforation


       

include("includes/database.php");

        
//name the page
$page_title = "Kroetta Login";

if(!$conn)
{
    echo "Can't connect "+$conn;
}
else if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $userid =$_POST["userid"];
    $password =$_POST["password"];
    $message=array();
   
    
    $query = "SELECT username,password,email,userid FROM user WHERE email=? OR username=?";
    $statement =$conn->prepare($query);
    $statement->bind_param("ss",$userid,$userid);
    
        if ($statement->execute())
        {
            
            $result = $statement -> get_result();
            //if row found with data
        
                //lets check the row
                if ($result -> num_rows > 0)
                {
                    // data found
                    //user exists
                    //assign database details for comparison
                    $user = $result -> fetch_assoc(); //get data from the user table
                    $username = $user["username"];
                    $hash =$user["password"];
                    $email = $user["email"];
                    
                    //now lets check the password entered vs stored
                    
                        if(password_verify($password,$hash)){
                        //password_ver is bulit in
                        // $password is from the user and 
                        //$hash is the one stored in bd
                        $message[result]= "Kroetta say yes you are logged in <script type=\"text/javascript\">delay();</script>";
                        
                        $_SESSION["username"]=$username;
                        $_SESSION["userid"]=$userid;
                        $_SESSION["email"]=$email;
                        $_SESSION["password"]=$password;
                       
                        //header("Location: https://music-site-konnushka.c9users.io/index.php");
                        } 
                        
                        //if not found 
                        else {
                          $message[result]="Kroetta say the username or password is wrong";
                        }
                }
                else
                {
                  $message[result] = "Kroetta says Account Not Found";
                }
            
        }
    else{
      $message[result]= "error";
    }
    
}

$conn->close;

?>
<!DOCTYPE html>
<html>
     <?php include("includes/head.php"); ?>
    <body>
        <?php include("includes/navigation.php"); ?>
        
        <div class="container">
            <div class="row">
            
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    
                    <form id="login-form" method="post" action="login.php">
                        <h2>Sign In Using Your Details</h2>
                        <div class="form-grooup">
                            <label for="userid">Username or Email:</label>
                            <input type="text" class="form-control" id="userid-login" name="userid" placeholder="king1232 or king33@email.com"/>
                            <label style="margin-top:15px;" for="password">Password:</label>
                            <input type="password" class="form-control" id="password-login" name="password" placeholder="Something you can remember"/>
                               
                               <p style="margin-top:15px;" class="text-center">
                                   <button style="padding:16px 19px" type="submit" name="login-button" class="btn btn-primary" >
                                       Sign In
                                   </button>
                               
                                   <button style="padding:16px 19px" type="submit" name="forgetpassword-button" class="btn btn-primary">
                                      Forgot?
                                   </button>
                               </p>
                             <span class="help-block"><?php echo $message["result"];?></span>
                        </div>
                        
                    </form>
                </div>
            
            </div>
            
            
        </div>
    </body>



</html>



