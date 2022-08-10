<!DOCTYPE html>
<?php
echo "<script>console.log('Console: id' );</script>";
session_start();
if(isset($_SESSION['id'])) {
    echo "<script>console.log('a' );</script>";
    echo "<script>location.replace('mainpage.php');</script>";            
}
else {
    echo "<script>console.log('b' );</script>";
    
} 
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>로그인</title>
    </head>
    
    <body>
    <h1>로그인</h1>
        <form method="post" action="./login.php" style="width:300px;height:200px;">
            <fieldset>
                <label>아이디 <input type="text" name='id'> </label><br>
                <label>비밀번호 <input type="text" name='pw'> </label><br>
                <input type="submit" value='로그인'>
                <button type="button" class="btn btn-primary active" id="btn" onclick="document.location.href='signup.php'">회원가입</button>
            </fieldset>
        </form>
    </body>
</html>