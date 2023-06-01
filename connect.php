<?php  


$conn=new mysqli("localhost","root","","imageupload");
if(!$conn){
    die(mysqli_error($conn));
}

?>