<?php
header("Location: familypage.php") ;
include ('../inc/header_inc.php');
require_once ('../inc/db_inc.php');


$id = $_POST['id'];

$sql="UPDATE tb_housework SET `HW_FINISH`='1' WHERE `HWORK_ID`='{$id}'";
include('../inc/db_inc.php');  // データベース接続
$rs = mysql_query($sql, $conn); //SQL文を実行



?>
