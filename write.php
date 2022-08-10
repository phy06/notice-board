<!doctype html>
<?php
include 'db.php';
include 'sesstion.php';
?>
<head>
<meta charset="UTF-8">
<title>게시판</title>

</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="write_action.php" method="post">
                    
                    <div >
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div ></div>
                    <div ></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div >
                        <button type="submit">글 작성</button>
                        <button type="button" class="" id="btn" onclick="document.location.href='mainpage.php'">취소</button>
                    </div>
                </form>
                
            </div>
        </div>
    </body>
</html>