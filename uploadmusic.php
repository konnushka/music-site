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
  //upload music form form
 
$message=array();
   
 if (isset($_POST["save_audio"])&& $_POST["save_audio"]=="Upload Audio")
 {
     $message["updatemusic"]="Login Valid";
     $dir = "musicfolder/";
     $audio_path= $dir.basename($_FILES["audioFile"]["name"]);
     $name = $_FILES["audioFile"]["name"];
     if(move_uploaded_file($_FILES["audioFile"]["tmp_name"],$audio_path))
     {
         $message["updatemusic"]=" Music name $name Was Uploaded";
     }
     
 }
   
   else{
       
       $message["updatemusic"]="File Not Uploaded";
   }
  
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
                
                <div class="col-md-12 col-md-offset-3"><?php echo "Welcome to Your Music Page $username";?></div>
            </div>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                <h3>Music Settings</h3>
                    <hr/>
                   
             <div class="row">
                  <div class="col-md-offset-1 col-md-8 col-sm-2">
                  <h3>Add New Music</h3>
                    <hr/>
                   <form class="form-horizontal" method="POST" action="uploadmusic.php" enctype="multipart/form-data">
                         <div class="form-group">
                             
                             <label class="col-sm-offset-1 control-label col-sm-2"  for="username">Select File</label>
                                
                                    <div class="col-md-8">
                                        <input type="file" class="form-control control-label col-sm-2" id="audioFile" name="audioFile"/>
                                        
                                    </div>
                                    
                                        
                        </div>
                        
                            <div class="form-group">
                            
                             
                             <label class="col-sm-offset-1 control-label col-sm-2"  for="username">Song Name</label>
                                
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="song_name" name="song_name" placeholder="<?php echo " $username Whats it called";?>">
                                        
                                    </div>
                                    
                                        
                            </div>
                            
                            <div class="form-group">
                                
                                <label class="col-sm-offset-1 control-label col-sm-2" for="email">Artist</label>
                                
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" id="artist_name" name="artist_name" placeholder="Whats the artist name">
                                    </div>
                                
                            </div>
                            
                                    <div class="col-sm-offset-5 col-md-8 col-sm-2 ">
                                            <button type="submit" name="save_audio" value="Upload Audio" class"btn btn-success"> Upload Music</button>
                                        </div>
                                     <span class="help-block"><?php echo $message["updatemusic"];?></span>
                       
                    </form>
                  </div>
                  
              </div>
        </div>
        
    </body>
</html>