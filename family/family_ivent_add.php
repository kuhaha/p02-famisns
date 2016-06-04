<?php
 include('../inc/header_inc.php');//画面出力開始

 $title=$_POST['ivent_title'];
 $time=$_POST['ivent_stime'];
 $location=$_POST['location'];
 $detail=$_POST['ivent_detail'];
if($title==""||$time==""||$location==""||$detail==""){
	echo "未入力項目があります。";
}else{
header("Location: family_ivent.php") ;
 $date=date( "Y-m-d H:i:s", time() );//現在日時の取得


 $sql="INSERT INTO `tb_familyivent`(`HOME_ID`, `FI_TITLE`, `FI_PLACE`, `FI_DATETIME`, `FI_DETAIL`)
 VALUES('{$hid}','{$title}','{$location}','{$time}','{$detail}')";
 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行
}

?>
