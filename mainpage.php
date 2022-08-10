<!doctype html>
<?php
include 'db.php';
include 'sesstion.php';

    echo "<script>console.log('Console: $id' );</script>";

    $sql = "SELECT * FROM list ORDER BY num DESC";

    $result = $con->query($sql);

    $pageTotal = mysqli_num_rows($result);


/* paging : 한 페이지 당 데이터 개수 */
$list_num = 5;

/* paging : 한 블럭 당 페이지 수 */
$page_num = 3;

/* paging : 현재 페이지 */
$page = isset($_GET["page"])? $_GET["page"] : 1;
echo "<script>console.log('Console: $page' );</script>";
/* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값, floor : 내림값, round : 반올림 */
$total_page = ceil($pageTotal / $list_num);
// echo "전체 페이지 수 : ".$total_page;

/* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
$total_block = ceil($total_page / $page_num);

/* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
$now_block = ceil($page / $page_num);

/* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
$s_pageNum = ($now_block - 1) * $page_num + 1;
// 데이터가 0개인 경우
if($s_pageNum <= 0){
    $s_pageNum = 1;
};

/* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
$e_pageNum = $now_block * $page_num;
// 마지막 번호가 전체 페이지 수를 넘지 않도록
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
};

/* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */
$start = ($page - 1) * $list_num;

/* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
$sql = "select * from list limit $start, $list_num;";

/* paging : 쿼리 전송 */
$result = $con->query($sql);

/* paging : 글번호 */
$cnt = $start + 1;


?>
<html>
    <head>
        <meta charset="utf-8">
       
    </head>    
    <body>

    <div>
        <div style="width:50%;   float:left;" >
            <h1>자유게시판</h1>
           
                <table style="    border: 1px solid #444444;border-collapse: collapse;">
                    <thead style= "border: 1px solid #444444;">
                        <tr>
                            <th width="70" >글번호</th>
                            <th width="50" >제목</th>
                            <th width="120" >내용</th>
                            <th width="100"> 작성자</th>
                            <th width="100">작성날짜</th>
                        </tr>
                    </thead>
                    <?php

                    $result = $con->query($sql);
                
                    while($row = $result->fetch_array(MYSQLI_ASSOC))
                    {
                    //title변수에 DB에서 가져온 title을 선택
                    $title=$row["title"]; 
                    if(strlen($title)>30)
                    { 
                        //title이 30을 넘어서면 ...표시
                        $title=str_replace($row["title"],mb_substr($row["title"],0,30,"utf-8")."...",$row["title"]);
                    }
                ?>
            <tbody style= "border: 1px solid #444444;">
                <tr>
                <td width="70"><?php echo $row['num']; ?></td>
                <td width="50"><a href="content.php?num=<?php echo $row['num']; ?>"><?php echo $row['title'];?></a></td>
                <td width="120"><?php echo $row['content']?></td>
                <td width="100"><?php echo $row['id']?></td>
                <td width="100"><?php echo $row['date']; ?></td>
                </tr>
            </tbody>
            <?php 
            $cnt++; 
            } ?>
                </table>
           
                <button type="button" class="btn" onclick="location.href='write.php'">
                    글쓰기
                </button>

                <p class="pager">

            <?php
            /* paging : 이전 페이지 */
            if($page <= 1){
            ?>
            <a href="mainpage.php?page=1">이전</a>
            <?php } else{ ?>
            <a href="mainpage.php?page=<?php echo ($page-1); ?>">이전</a>
            <?php };?>

            <?php
            /* pager : 페이지 번호 출력 */
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <a href="mainpage.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
            <?php };?>

            <?php
            /* paging : 다음 페이지 */
            if($page >= $total_page){
            ?>
            <a href="mainpage.php?page=<?php echo $total_page; ?>">다음</a>
            <?php } else{ ?>
            <a href="mainpage.php?page=<?php echo ($page+1); ?>">다음</a>
            <?php };?>

            </p>

           
        </div> 
        <div style=" float:left;" >
            <div class="base">
                <h2><?php echo "로그인완료, '$id'님 환영합니다";?></h2>
                <button type="button" class="btn" onclick="location.href='logout.php'">
                    로그아웃
                </button>
            </div>

        </div>      
    </div>
    
</body>     
</html>