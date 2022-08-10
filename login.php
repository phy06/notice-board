<?php 
include 'db.php';
session_start();
$id=$_POST['id'];
$pw=$_POST['pw'];

//$query = "SELECT id from member ";
//$resut=mysqli_query($con,$query);

$sql = "SELECT id,pw FROM member WHERE id ='$id' and pw='$pw'  ";
$result = $con->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);

if ($row != null) {
  $_SESSION['id'] = $row['id'];
  $_SESSION['pw'] = $row['pw'];
  echo "<script>console.log('".$_SESSION['id']."' );</script>";
  echo "<script>alert('로그인이 완료되었습니다..')</script>";
  echo "<script>location.replace('index.php');</script>";
  exit;
}
//결과가 존재하지 않으면 로그인 실패
else{
  echo "<script>console.log('b' );</script>";
  echo "<script>alert('로그인에 실패했습니다.다시 시도해 주세요.')</script>";
  echo "<script>location.replace('index.php');</script>";
  exit;
}



?>
