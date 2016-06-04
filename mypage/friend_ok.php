<?php
header("Location: friend_list.php") ;
 include('../inc/header_inc.php');//画面出力開始

 $to_uid=$_POST['to_uid'];//相手のＩＤ
 $from_uid=$_POST['from_uid'];//ログインしているＩＤ


 $sql="UPDATE tb_fdemand SET STATE='1' WHERE `FROM_UID`='{$to_uid}' AND `TO_UID`='{$from_uid}'";

 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行


?>
