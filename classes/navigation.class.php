<?php 

class Navigation{
    private $logged_in;
    private $current_page;
    
    public function __construct(){
        //
        //check session to see if user is logged in
        if (isset($_SESSION["username"]))
        {
            $this -> logged_in = true;
            
        }
        else{ $this ->logged_in = false; }
        
        //get the name of the current page
        $this -> current_page = basename ($_SERVER["PHP_SELF"]);
        //echo $this -> current_page;
       
    }

    public function showonnavbar()
    {
        //create a nav array
        $navitems = array();
        
        //lets check the session if user is logged in
        if($this -> logged_in == false)
        {
            //redirect to login
           $navitems = array(
               "<span class=\"glyphicon glyphicon-log-in \"></span> login" => "login.php",
               "<span class=\"glyphicon glyphicon-user \"></span> Sign Up" => "signup.php"
            );
        }
        else
        {
            //lets set the nav bar items
            $navitems = array (
                "<span class=\"glyphicon glyphicon-log-out \"></span> SignOut" => "signout.php",
                "<span class=\"glyphicon glyphicon-user \"></span> Account" => "account.php");
            
        }
        //now lets add the items to nnav bar
        array_push($navitems,"<ul class=\"nav navbar-nav navbar-right\">");
        //lets do a loop to print out all lists
        foreach($navitems as $name =>$link)
        {
           
            //store scripts in variables
            $link_name = ucfirst( $name );
            $element = "<li class=\"mytextedit\"><a class=\"mytextedit\"href=\"/$link\">$link_name</a></li>";
            array_push($navitems,$element);
        }
        array_push($navitems, "</ul>");
       return implode($navitems,"");
    }
     
}



?>
