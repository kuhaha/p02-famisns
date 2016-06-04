<?php
header("Location: family_prof_edit.php") ;
include('../inc/header_inc.php');//画面出力開始
require_once ('../inc/db_inc.php');

$query = "SELECT COUNT(*)AS COUNT,IMAGE FROM `tb_homeprof` WHERE `HOME_ID`='{$hid}'";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}
$row = mysql_fetch_array($rs);

$hname=$_POST['hname'];
$comment=$_POST['comment'];

	clearstatcache();
		$updir = "homeimg";
		$tmp_file = @$_FILES['upfile']['tmp_name'];
		@list($file_name,$file_type) = explode(".",@$_FILES['upfile']['name']);
		$copy_file = date("Ymd-His") . "." . $file_type;
		if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
			//	chmod("homeimg/" . $_FILES["upfile"]["name"], 0644);
	//			echo $_FILES["upfile"]["name"] . "をアップロードしました。<br />";
	//			echo "（※アップロードしたファイルは <a href=\"" . $updir . "/" . $copy_file . "\" target=\"_blank\">こちら</a> から確認できます。）";

$img="$updir/$copy_file";


 if($row['COUNT']==0){
 	echo $sql="INSERT INTO `tb_homeprof`(`HOME_ID`, `IMAGE`, `COMMENT`) VALUES ('{$hid}','{$img}','{$comment}')";
 }else{
 	echo $sql="UPDATE `tb_homeprof` SET `IMAGE`='{$img}',`COMMENT`='{$comment}' WHERE `HOME_ID`='{$hid}'";
 	$deleate_img=$row['IMAGE'];
 	unlink("$deleate_img");
 }
 include('../inc/db_inc.php');  // データベース接続
 $rs = mysql_query($sql, $conn); //SQL文を実行

			} else {
				echo "ファイルをアップロード出来ませんでした。";
			}
		} else {//選択されていない
			if($row['COUNT']==0){
				echo $sql="INSERT INTO `tb_homeprof`(`HOME_ID`, `IMAGE`, `COMMENT`) VALUES ('{$hid}','','{$comment}')";
			}else{
				echo $sql="UPDATE `tb_homeprof` SET `COMMENT`='{$comment}' WHERE `HOME_ID`='{$hid}'";
			}
			include('../inc/db_inc.php');  // データベース接続
			$rs = mysql_query($sql, $conn); //SQL文を実行

		}


?>
