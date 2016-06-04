<?php
header("Location: ../mypage/friend_list.php") ;
 include('../inc/header_inc.php');//画面出力開始

 $to_uid=$_POST['to_uid'];//相手のＩＤ
 $from_uid=$_POST['from_uid'];//ログインしているＩＤ
/*
 echo "申請者：".$from_uid."<br>";
 echo "申請相手：".$to_uid."<br>";
*/
 $sql="INSERT INTO `tb_fdemand`(`FROM_UID`, `TO_UID`, `STATE`)VALUES
 ('{$from_uid}','{$to_uid}','0')";

 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行


?>
