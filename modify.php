<!doctype html>
<?php
include 'db.php';
include 'sesstion.php';

$num = $_GET['num'];
$sql = "SELECT * FROM list WHERE num ='$num' ";
$result = $con->query($sql);

$row = mysqli_fetch_assoc($result);

?>
<head>
<meta charset="UTF-8">
<title>게시판</title>

</head>
<body>
    <div id="board_write">
        <h1>자유게시판</h1>
        <h4>글을 수정하는 공간입니다.</h4>
            <div id="modify_area">
                <form action="modify_action.php?num=<?php echo $row['num']; ?>" method="post">
                    
                    <div >
                        <textarea name="title" id="utitle" rows="1" cols="30" placeholder="제목" maxlength="100" required><?php echo $row["title"]?></textarea>
                    </div>
                    <br>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" cols="30" placeholder="내용" required><?php echo $row["content"]?></textarea>
                    </div>
                    <br>
                    <div >
                        <button type="submit">글 작성</button>
                        <button type="button" class="" id="btn" onclick="document.location.href='mainpage.php'">취소</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>