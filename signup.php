<?php
include("includes/database.php"); 

$page_title = "Kroetta Sign UP";

       

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    // errors checking
    $errors=array();
    $password_error=array();
    $db_error=array();
    $message=array();
    
    //take user input assign variables
    $username = $_POST["username"];
    $email       = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    
    //lets check before 
   
    if($password1 !==$password2)
    {
        $password_error["password1"]= "Password are not the same";
    }
    else{
        //hasah the password 
        $hash = password_hash($password1,PASSWORD_DEFAULT);
    }
    
    if(count($password_error)>0)
    {}
    else {
        $query="INSERT INTO user (username,email,password) VALUES (?,?,?)";
        $statement=$conn->prepare($query);
        $statement->bind_param("sss",$username,$email,$hash);
       
       if($statement->execute())
        {
            $message["success"]=" Your can now login Just Wait we will take you there";
            //now lets send the command
            $_SESSION["username"]=$username;
            $_SESSION["userid"]=$userid;
            
            $signup = "thanks "+username+"\n Welcome to Kroetta\n\nHave A great Day";
            mail($email,"www.kroetta.com - Thanks For sign UP",$signup);
            $add_h="\n addition header";
            $add_p="\n Addition parameters";
            mail ( $email , "www.kroetta.com - Thanks For sign UP" ,  $signup);
            
            
            
        }
        else{
            //add more error checking
            
        }
        
        //sleep(21);
            
        header("Location: https://music-site-konnushka.c9users.io/login.php");
    }
    
    
    
    
    
    
    
    
}


?>
<!doctype html>
<html>
    
      <?php include("includes/head.php"); ?>
    <body>
        <?php include("includes/navigation.php"); ?>
        
        <div class="container">
            <div class="row">
            
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    
                    <span class="help-block"><?php echo $message["success"];?></span>
                    
                    <form id="signup-form" method="post" action="signup.php">
                        <h2>Create An Account Using Your Details</h2>
                        <div class="form-grooup">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="king33@email.com"/>
                            <span class="help-block"><?php echo $errors["email"]; ?></span>
                            
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="king"/>
                            <span class="help-block"><?php echo $errors["username"]; ?></span>
                             
                            <label style="margin-top:15px;" for="password">Password:</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Something you can remember"/>
                            <span class="help-block"><?php echo $password_error["password1"]; ?></span>
                            
                            
                            <label style="margin-top:15px;" for="confirm-password">Password:</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Type againr"/>
                             <span style="color:red"class="help-block"><?php echo $password_error["password2"]; ?></span>  
                               
                              
                               <p style="margin-top:15px;" class="text-center">
                                   <button style="padding:16px 19px;" type="submit" name="signup-button" class="btn btn-primary" >
                                       Sign Up
                                   </button>
                                
                                   
                                   
                                    <a href="login.php" class="signup-button">Log In</a>
                                   
                               </p>
                           
                        </div>
                        
                    </form>
                </div>
            
            </div>
            
            
        </div>
    </body>
    
</html>