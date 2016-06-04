<?php
header("Location: user_prof.php") ;
//include('../inc/header_inc.php');//画面出力開始
require_once ('../inc/db_inc.php');

$query = "SELECT COUNT(*)AS COUNT,USER_ID,U_IMAGE,COMMENT,HOBBY FROM `tb_userprof` WHERE `USER_ID`='{$uid}'";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}
$row = mysql_fetch_array($rs);

$hname=$_POST['uname'];
$comment=$_POST['comment'];
$hobby=$_POST['hobby'];

	clearstatcache();
		$updir = "userimg";
		$tmp_file = @$_FILES['upfile']['tmp_name'];
		@list($file_name,$file_type) = explode(".",@$_FILES['upfile']['name']);
		$copy_file = date("Ymd-His") . "." . $file_type;
		if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
				//chmod("homeimg/" . $_FILES["upfile"]["name"], 0644);
	//			echo $_FILES["upfile"]["name"] . "をアップロードしました。<br />";
	//			echo "（※アップロードしたファイルは <a href=\"" . $updir . "/" . $copy_file . "\" target=\"_blank\">こちら</a> から確認できます。）";

$img="$updir/$copy_file";


 if($row['COUNT']==0){
 	$sql="INSERT INTO `tb_userprof`(`USER_ID`, `U_IMAGE`, `COMMENT`,`HOBBY`) VALUES ('{$uid}','{$img}','{$comment}','{$hobby}')";
 }else{
	$sql="UPDATE `tb_userprof` SET `U_IMAGE`='{$img}',`COMMENT`='{$comment}',`HOBBY`='{$hobby}' WHERE `USER_ID`='{$uid}'";
 	$deleate_img=$row['U_IMAGE'];
 	if($row['U_IMAGE']!=" "){
 		unlink("$deleate_img");
 	}
 }
 $rs = mysql_query($sql, $conn); //SQL文を実行

			} else {
				echo "ファイルをアップロード出来ませんでした。";
			}
		} else {//選択されていない
			if($row['COUNT']==0){
				$sql="INSERT INTO `tb_userprof`(`USER_ID`, `U_IMAGE`, `COMMENT`,`HOBBY`) VALUES ('{$uid}','','{$comment}','{$hobby}')";
			}else{
				$sql="UPDATE `tb_userprof` SET `COMMENT`='{$comment}',`HOBBY`='{$hobby}' WHERE `USER_ID`='{$uid}'";
			}
			include('../inc/db_inc.php');  // データベース接続
			$rs = mysql_query($sql, $conn); //SQL文を実行

		}
?>
