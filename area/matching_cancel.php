<?php
header("Location: matching_list.php") ;
 include('../inc/header_inc.php');//画面出力開始

 $to_hid=$_POST['to_hid'];


 $sql="DELETE FROM tb_demand  WHERE `FROM_ID`='{$hid}' AND `TO_ID`='{$to_hid}'";

 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行


?>



