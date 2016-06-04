<?php
header("Location: matching_list.php") ;
// include('../inc/header_inc.php');//画面出力開始
include('../inc/db_inc.php');  // データベース接続
 
 $to_hid=$_POST['to_hid'];
 $sql="UPDATE tb_demand SET STATE='1' WHERE `FROM_ID`='{$to_hid}' AND `TO_ID`='{$hid}'";
 $rs = mysql_query($sql, $conn); //SQL文を実行
?>