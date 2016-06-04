<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');

?>
<div class="page-header text-center"><h1>お茶の間</h1></div>

<!-- ここから記事内容表示 -->
<div class="col-sm-offset-3 col-sm-6 well well-sm">
	<?php
	require_once('../function.php');
	post("画像投稿","画像投稿","album_add.php",1);
	?>
	<a href="album_list.php" class="center-block btn btn-success">一覧表示</a><br>
	<?php
	require_once('../function.php');
	$sql_post = "SELECT * FROM  `tb_album` NATURAL JOIN tb_user WHERE `HOME_ID`='{$hid}' ORDER BY  `tb_album`.`AL_POSTTIME` DESC ";
	$sql_comment = "SELECT * FROM `tb_comment` NATURAL JOIN tb_user WHERE `CTARGET_ID`='3' AND `HOME_ID`='{$hid}'";
	article_comment($sql_post,$sql_comment,1,$uid,$hid);
	?>
</div>
<!-- ここまで記事内容表示 -->
<?php include('../inc/footer_inc.php'); ?>