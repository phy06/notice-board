<?php
	include 'db.php';
    include 'sesstion.php';
	$num = $_GET['num'];


    $sql =  "DELETE from list where num='$num';";
    $result = $con->query($sql);


    echo "<script>
    alert('삭제 되었습니다.');
    location.href='mainpage.php';
    </script>";

?>
