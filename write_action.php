<?php
include 'db.php';
include 'sesstion.php';
//각 변수에 write.php에서 input name값들을 저장한다

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($id && $title && $content){
    $sql = "INSERT into list(title,content,id,date) values('".$title."','".$content."','".$id."','".$date."')";
    $result = $con->query($sql);
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='mainpage.php';
    </script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
   </script>";
}
?>