<?php
 include('../inc/header_inc.php');//画面出力開始

 $did=$_POST['did'];
 $comment=$_POST['comment'];
if($comment==""){

}else{
 header("Location: album.php") ;
 $date=date( "Y-m-d H:i:s", time() );//現在日時の取得
 $sql="INSERT INTO `tb_comment`(`USER_ID`,`CTARGET_ID`, `COMMMENT_ID`, `C_DETAIL`, `C_POSTTIME`, `TARGETNUM_ID`)
 		VALUES ('{$uid}','3',' ','{$comment}','{$date}','{$did}')";
 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行
}
?>
