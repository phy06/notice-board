<?php
session_start();
session_destroy();
?>
<script>
    alert("로그아웃이 완료되었습니다.");
    location.replace('index.php');
</script>