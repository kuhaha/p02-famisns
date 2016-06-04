<?php
$sww= $_POST_['sww'];
$id = $_POST['id'];
if($sww==0){
header("Location: mypage.php");
}else{
header("Location: familypage.php");
}
include ('../inc/header_inc.php');
require_once ('../inc/db_inc.php');


$sql="UPDATE tb_todo SET `T_FINISH`='1' WHERE `TODO_ID`='{$id}'";
include('../inc/db_inc.php');  // データベース接続
$rs = mysql_query($sql, $conn); //SQL文を実行

?>
