<?php
header("Location: matching_list.php") ;
 include('../inc/header_inc.php');//画面出力開始

 $to_hid=$_POST['to_hid'];

 echo "申請者：".$hid."<br>";
 echo "申請相手：".$to_hid."<br>";

 $sql="INSERT INTO `tb_demand`(`DEMAND_ID`, `FROM_ID`, `TO_ID`, `STATE`)VALUES
 (' ','{$hid}','{$to_hid}','0')";

 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行


?>
