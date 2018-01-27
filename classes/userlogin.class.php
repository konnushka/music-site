<?php//check if user is logged in
class userloggedin extends Database
{
    private $user;
    private $conn;
    private $password;
    private $error;
    private $account;
    
    public function __construct ($user,$password)
    {
        parent:: __construct();
        $this -> user = $user;
        $this -> password = $password;
        $this -> userloggedinstatus();
    }
    
    private function userloggedinstatus()
    {
        $query ="SELECT userid,password,email FROM user WHERE email=? AND userid=?";
        $stmt =$this -conn -> prepare($query);
        $stmt -> bind_param("s",$this -> user);
        
        //check connection to database
        if($stmt -> execute() == false)
        {
            //canit connect error
            return false;
            
        }
        //check if account exists
        $result = $stmt -> get_result();
        if ($result -> num_rows == 0)
        {
            //no record in database
            return false;
        }
        //now check id password matches
        $this -> account = $result -> fetch_assoc();
        if($this )
        {
            
        }
        
        
        //checking password using php password verify
        private function passwordcheck()
        {
            $hash = $this -> account["password"];
            //$this -. password is the password in the database comparing with the users
            if (passwordverify($hash, $this->password))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
?>