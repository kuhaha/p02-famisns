<?php
 $did=$_POST['did'];
 $sw=$_POST['sw'];
if($sw==0){
	header("Location: area/areatop.php") ;
}else{
	header("Location: family/album.php") ;
}

 include('inc/header_inc.php');//画面出力開始




 if($sw==0){
 	$sql="DELETE FROM tb_post  WHERE `POST_ID`='{$did}'";
 	include('inc/db_inc.php');  // データベース接続
 	$rs = mysql_query($sql, $conn); //SQL文を実行
 	//header("Location: area/areatop.php") ;
 }else if($sw==1){
 	$sql="DELETE FROM tb_album  WHERE `ALBUM_ID`='{$did}'";
 	include('inc/db_inc.php');  // データベース接続
 	$rs = mysql_query($sql, $conn); //SQL文を実行
 	//header("Location: family/album.php") ;
 }





?>