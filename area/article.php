<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');
?>
<div class="page-header text-center"><h1>あなたが投稿した記事一覧</h1></div>

<!-- ここから記事内容表示 -->
<div class="col-sm-offset-3 col-sm-6 well well-sm">
	<?php
	require_once('../function.php');
	post("記事投稿","記事投稿","article_post.php",0);
	$sql_post = "SELECT `AREA_ID`,`HOME_ID`, `USER_ID`, `POST_ID`, `P_TITLE`, `P_DETAIL`, `P_POSTTIME`,`NAME`,`IMAGE`,`SHARE` FROM `tb_post` NATURAL JOIN `tb_user` WHERE `USER_ID`='{$uid}' ORDER BY `P_POSTTIME` DESC";
	$sql_comment = "SELECT * FROM `tb_comment` NATURAL JOIN tb_user WHERE `CTARGET_ID`='2'";
	article_comment($sql_post,$sql_comment,0,$uid,$hid);
	?>
</div>
<!-- ここまで記事内容表示 -->

<?php include ('../inc/footer_inc.php'); ?>