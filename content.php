<!doctype html>
<?php
include 'db.php';
include 'sesstion.php';
$num = $_GET['num'];
$sql = "SELECT * FROM list WHERE num ='$num' ";
$result = $con->query($sql);

$row = mysqli_fetch_assoc($result);
echo "<script>console.log('Console: ' );</script>";

?>
<head>
<meta charset="UTF-8">
<title>게시판</title>

</head>
<body>
    <div id="board_write">
        <h1>자유게시판</h1>
        
            <div id="">
                <form action="mainpage.php" method="post">
                    
                    <div >
                        <text name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required>글 제목 : <?php echo $row["title"]?></text>
                    </div>
                    <br>
                    <div >
                        <text name="content" id="ucontent" placeholder="내용" required>내용 : <?php echo $row["content"]?></text>
                    </div>
                    <br>
                    <div >
                        <text name="id" id="id" rows="1" cols="55" placeholder="작성자" maxlength="100" required>작성자 : <?php echo $row["id"]?></text>
                    </div>
                    <br>
                    <div >
                        <text name="date" id="date" rows="1" cols="55" placeholder="작성일" maxlength="100" required>작성일 : <?php echo $row["date"]?></text>
                    </div>
                    <br>
                </form>
                <button type="button" class="" id="btn" onclick="document.location.href='mainpage.php'">글 목록</button>
                <button type="button" class="" id="btn" onclick="document.location.href='modify.php?num=<?php echo $row['num']; ?>'">글 수정</button>
                <button type="button" class="" id="btn" onclick="document.location.href='delete.php?num=<?php echo $row['num']; ?>'">글 삭제</button>
            </div>
        </div>
    </body>
</html>