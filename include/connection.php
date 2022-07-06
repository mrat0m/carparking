<?php

$conn = mysqli_connect('localhost','root','','carparking',3306);



if(!$conn){
    echo "error connecting to database ".mysqli_connect_error();
}


?>