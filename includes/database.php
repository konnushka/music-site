<?php

        $host = getenv("host");
        $user = getenv("user");
        $password = getenv("password");
        $database = getenv("database");
        //create the connection
        $conn = mysqli_connect($host,$user,$password,$database);
        if(!$conn){
                echo "no connection";
        }

        

?>