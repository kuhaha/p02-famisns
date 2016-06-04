<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');

if(!isset($_SESSION['UTID'])){
	header("Location: ../login.php") ;
	exit(); //処理中止
}else{
$query = "SELECT * FROM `tb_areaivent` WHERE `AREA_ID`='{$aid}' ORDER BY AI_DATETIME DESC ";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}
?>
	<div class="page-header text-center">
    <h1>地域トップ</h1>
    </div>

<?php
$now=date( "Y-m-d H:i:s", time() );//現在日時の取得

?>

    <div class="col-sm-offset-3 col-sm-6 well well-sm">
		<div class="panel panel-primary">
		  <div class="panel-heading">直近で開催されるイベント</div>

<!-- イベントの表示  -->
			<div class="panel-group" id="accordion">

			<?php while($row = mysql_fetch_array($rs)){ ?>
			<?php
			if($now <= $row['AI_DATETIME']){
			//日付日時の分割
			$set_date = $row['AI_DATETIME'];
			$date = array();
			preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{1,2}):([0-9]{1,2})@",$set_date,$date);
			// $date[0]; // yyyy/mm/dd hh:mm:ss
			?>
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['AIVENT_ID'];?>">
			          <?php echo $date[1]."年".$date[2]."月".$date[3]."日"."：".$row['AI_TITLE'];?>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse<?php echo $row['AIVENT_ID'];?>" class="panel-collapse collapse">
			      <div class="panel-body">
			        <?php
			        echo "場所：".$row['AI_PLACE']."<br><br>";
			        echo nl2br($row['AI_DETAIL']);
			        ?>
			      </div>
			    </div>
			  </div>
			<?php }} ?>
			</div>

		  <div class="text-center"><a href="areaivent.php" class="btn btn-link">全て表示</a></div>
		</div>
    </div>
<!-- イベントの表示 ここまで -->

<div class="col-sm-offset-3 col-sm-6 well well-sm">
<div class="text-center"><strong>みんなの投稿</strong></div>
<a href="article.php" class="center-block btn btn-success">投稿管理</a><br>

<!-- ここから記事内容表示 -->
	<?php
	require_once('../function.php');
	$sql_post = "SELECT `AREA_ID`,`HOME_ID`,`USER_ID`, `POST_ID`, `P_TITLE`, `P_DETAIL`, `P_POSTTIME`,`NAME`,`IMAGE`,`SHARE` FROM `tb_post` NATURAL JOIN `tb_user` WHERE `AREA_ID`='{$aid}' ORDER BY `P_POSTTIME` DESC";
	$sql_comment = "SELECT * FROM `tb_comment` NATURAL JOIN tb_user WHERE `CTARGET_ID`='2'";
	article_comment($sql_post,$sql_comment,0,$uid,$hid);
	?>
<!-- ここまで記事内容表示 -->
</div>
<?php }?>


<?php include ('../inc/footer_inc.php'); ?>
