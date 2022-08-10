<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>예제 회원가입</title>
    </head>
    <h1>회원가입</h1>
    <body>
     
            <form method="post" action="./signup_action.php" style="width:100px; height:200px;">
                <fieldset>
                    <label>이름 <input type="text" name='name'> </label><br>
                    <label>아이디 <input type="text" name='id'> </label><br>
                    <label>비밀번호 <input type="text" name='pw'> </label><br>
                    <br>
                    <input type="submit" value='가입하기'>
                    <button type="button" class="" id="btn" onclick="document.location.href='index.php'">취소</button>
                </fieldset>
            </form>
        
    </body>
</html>