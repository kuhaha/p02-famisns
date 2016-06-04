<?php
header("Location: album.php") ;
include('../inc/header_inc.php');//画面出力開始

$title=$_POST['title'];
$detail=$_POST['detail'];

if($title=="" || $detail==""){
	echo "未入力項目があります。";

}else{

	clearstatcache();
		$updir = "files";
		$tmp_file = @$_FILES['upfile']['tmp_name'];
		@list($file_name,$file_type) = explode(".",@$_FILES['upfile']['name']);
		$copy_file = date("Ymd-His") . "." . $file_type;
		if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
			if (move_uploaded_file($tmp_file,"$updir/$copy_file")) {
				//chmod("files/" . $_FILES["upfile"]["name"], 0644);
	//			echo $_FILES["upfile"]["name"] . "をアップロードしました。<br />";
	//			echo "（※アップロードしたファイルは <a href=\"" . $updir . "/" . $copy_file . "\" target=\"_blank\">こちら</a> から確認できます。）";

	$img="$updir/$copy_file";
	 $date=date( "Y-m-d H:i:s", time() );//現在日時の取得

	 $sql="INSERT INTO `tb_album`(`ALBUM_ID`,`USER_ID`,`AL_TITLE`,`AL_DETAIL`,`IMAGE`,`AL_POSTTIME`)
	 VALUES(' ','{$uid}','{$title}','{$detail}','{$img}','{$date}')";
	 include('../inc/db_inc.php');  // データベース接続
	 $rs = mysql_query($sql, $conn); //SQL文を実行


			} else {
				echo "ファイルをアップロード出来ませんでした。";
			}
		} else {
			echo "ファイルが選択されていません。";
		}
}

?>
