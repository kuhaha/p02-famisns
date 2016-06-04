<?php
header("Location: ../index.php") ;
//include ('../inc/header_inc.php');
require_once ('../inc/db_inc.php');
$query2 = "SELECT COUNT(*)AS COUNT FROM tb_state WHERE USER_ID='{$uid}'";
$rs2 = mysql_query($query2);

if(!$rs2) die('エラー: ' . h(mysql_error()));

$row2 = mysql_fetch_array($rs2);

$location = $_POST['location'];
$comment = $_POST['comment'];
$condition = $_POST['condition'];
$kibun = $_POST['kibun'];
/*
echo "uid:".$uid."<br>";
echo $location."<br>";
echo $comment."<br>";
echo $condition."<br>";
*/

if($row2['COUNT']==0){
 $sql="INSERT INTO tb_state(USER_ID,CONDITION_ID,LOCATION,COMMENT,KIBUN_ID) VALUES ('{$uid}',{$condition},'{$location}','{$comment}',{$kibun})";
}else{
 $sql="UPDATE tb_state SET CONDITION_ID={$condition},KIBUN_ID={$kibun},LOCATION='{$location}',COMMENT='{$comment}' WHERE USER_ID='{$uid}'";
}
$rs = mysql_query($sql, $conn); //SQL文を実行
?>