<?php
header("Location: diary.php") ;
 include('../inc/header_inc.php');//画面出力開始

 $title=$_POST['diary_title'];
 $text=$_POST['diary_text'];

 $date=date( "Y-m-d H:i:s", time() );//現在日時の取得


 $sql="INSERT INTO tb_diary(USER_ID,DIARY_ID,D_TITLE,D_DETAIL,D_POSTTIME)
 		VALUES('{$uid}',' ','{$title}','{$text}','{$date}')";
 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行


?>


