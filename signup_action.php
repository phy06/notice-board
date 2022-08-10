<?php 
include 'db.php';
$name=$_POST['name'];
$id=$_POST['id'];
$pw=$_POST['pw'];

$query = "insert into member (name,id,pw) values('".$name."','".$id."','".$pw."')";
$resut=mysqli_query($con,$query);
if(!$result) 
{?>
    <script> alert('회원가입이 완료되었습니다.'); location.href=".."; </script> 
<?php
} else {?>
    <script> alert('회원가입에 실패했습니다.\n다시 시도해 주세요.'); location.href=".."; </script>
<?php } ?>
