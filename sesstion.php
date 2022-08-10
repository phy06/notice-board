<?php
session_start();    
$id=null;
$pw=null;
if(isset($_SESSION['id'])) {
    echo "<script>console.log('a' );</script>";
   
    $id = $_SESSION['id'];
    $pw = $_SESSION['pw'];    
    echo "<script>console.log('$id' );</script>";    
}
else {
    echo "<script>console.log('b' );</script>";
    echo "<script>location.replace('index.php');</script>";   
} 

?>