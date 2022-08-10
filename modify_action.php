<?php
include 'db.php';
include 'sesstion.php';
//각 변수에 write.php에서 input name값들을 저장한다
$num = $_GET['num'];

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($id && $title && $content){
    $sql =  "UPDATE list set id='".$id."',title='".$title."',content='".$content."',date='".$date."' where num='".$num."'";
   $result = $con->query($sql);
    echo "<script>
    alert('수정 완료되었습니다.');
    location.href='content.php?num=$num';
    </script>";
}else{
    echo "<script>
    alert('수정에 실패했습니다.');
   </script>";
}
?>