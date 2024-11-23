<?php
error_reporting(0);
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="logindetails";
    
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    
    if($conn){
        //echo "Conection ok";
    }
    else{
        echo "connection failed";
    }
?>  