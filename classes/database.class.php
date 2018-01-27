<? php
Class Database{
    protected $conn;
    protected function __construct(){
        //get env or environment varable
        
        $host = getenv("host");
        $user = getenv("user");
        $password = getenv("password");
        $database = getenv("database");
        //create the connection
        $conn = mysqli_connect($host,$user,$password,$database);
        
    }
    protected function(){
        return $this -> conn;
    }
}
?>