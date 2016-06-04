<?php
header("Location: ../index.php") ;
// include('../inc/header_inc.php');//画面出力開始

 $name=$_POST['mname'];
 $id=$_POST['mid'];
 $pass=$_POST['mpassword'];
 $year=$_POST['myear'];
 $month=$_POST['mmonth'];
 $day=$_POST['mday'];
 $sex=$_POST['msex'];
 $reration=$_POST['mreration'];

 $birthday= $year."/".$month."/".$day;


 $sql="INSERT INTO tb_user(HOME_ID,UT_ID,USER_ID,PASSWORD,NAME,SEX,BIRTHDAY,EMAIL)
 		VALUE('{$hid}','{$reration}','{$id}','{$pass}','{$name}','{$sex}','{$birthday}',' ')";
 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行

?>
