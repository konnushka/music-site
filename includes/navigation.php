<?php include("classes/navigation.class.php");?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
       <a class="navbar-brand mytextedit active" href="index.php">Kroetta</a>
    </div>
    <!--<ul class="nav navbar-nav">-->
      
       <!--<li>-->
          <?php
          if(isset($_SESSION["username"]))
            {
             $username=$_SESSION["username"]; 
             $text =" Hello ";
            }
            else {
              $username= " Login ";
              $text= " Hello ";
            }
           // output breaking
           //echo "<h6>$text.$username</h6>";
          ?>
          <!--</li>-->
      
     
      
    <!--</ul>-->
    
     
    
     <?php
       $navigation = new Navigation();
      echo $navigation -> showonnavbar();
        ?>
   
  </div>
</nav>

