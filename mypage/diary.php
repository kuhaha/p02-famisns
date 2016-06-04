<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');

$query = "SELECT `USER_ID`,`HOME_ID`,`DIARY_ID`,`D_TITLE`,`D_TITLE`,`D_DETAIL`,`D_POSTTIME`,`NAME` FROM `tb_diary` NATURAL JOIN `tb_user` NATURAL JOIN tb_home WHERE `HOME_ID`='{$hid}' ORDER BY `tb_diary`.`D_POSTTIME` DESC ";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}

$query2 = "SELECT * FROM `tb_comment` NATURAL JOIN tb_user WHERE `HOME_ID`='{$hid}' AND `CTARGET_ID`='0'";
$rs2 = mysql_query($query2);
if(!$rs2){
	die('エラー: ' . h(mysql_error()));
}

if(!isset($_SESSION['UTID'])){
	header("Location: ../login.php") ;
	exit(); //処理中止
}else{

?>

	<div class="page-header text-center">
    <h1>日記ページ</h1>
    </div>



    <div class="col-sm-offset-3 col-sm-6 well well-sm">
    	<div class="panel panel-primary">
		  <div class="panel-heading">記事の内容</div>
		  <div class="panel-body">

			<form class="form-horizontal" action="diary_add.php" method="post">
			  <div class="form-group">
			    <label class="col-sm-3 control-label" for="title">タイトル：</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="diary_title">
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="col-sm-3 control-label" for="text">本文：</label>
			    <div class="col-sm-5">
			      <textarea class="form-control" name="diary_text"></textarea>
			    </div>
			  </div>

			  <div class="text-center">
			  	<button type="submit" class="btn btn-default">投稿</button>
			  </div>

			</form>
		  </div>
		</div>
	</div>

<?php
//コメントを配列にいれる
while($row2 = mysql_fetch_array($rs2)){
	$tnumid[]=$row2['TARGETNUM_ID'];
	$pname[]=$row2['NAME'];
	$cdetail[]=$row2['C_DETAIL'];
	$cptime[]=$row2['C_POSTTIME'];
}

?>


<!-- 記事の表示 -->
    <div class="col-sm-offset-3 col-sm-6 well well-sm">
    <?php while($row = mysql_fetch_array($rs)){ ?>

	<div class="panel panel-info">
	  <div class="panel-heading">
	  	<?php echo $row['NAME']?>：
	  	<?php echo $row['D_TITLE']?>
	  	<div class="pull-right"><?php echo $row['D_POSTTIME']?></div>
	  </div>
	  <div class="panel-body">
	    <?php echo $row['D_DETAIL']?>
	  </div>
<div class="panel-footer">
<?php
$date=date( "Y-m-d H:i:s", time() );//現在日時の取得
//コメントの表示
for($i=0;$i<count($tnumid);$i++){
	if($tnumid[$i]==$row['DIARY_ID']){
		if(((strtotime($date) - strtotime($cptime[$i])) / ( 60 * 60 * 24))>=1){
			$t=floor(((strtotime($date) - strtotime($cptime[$i])) / ( 60 * 60 * 24)))."日前";
		}else{
			$t= floor((strtotime($date) - strtotime($cptime[$i])) / ( 60 ));
			if($t<60){
				$t.="分前";
			}else{
				$t = floor(($t / 60))."時間前";
			}
		}
		echo $pname[$i]."：".$cdetail[$i]."　(".$t.")"."<br>";
	}

}
?>
<!-- モーダルここから --><!-- モーダルここから --><!-- モーダルここから -->
<!-- 切り替えボタンの設定 -->
<div class="text-right">
<a data-toggle="modal" href="#<?php echo $row['DIARY_ID']; ?>" class="btn btn-primary btn-xs">コメントする</a>
</div>
<!-- モーダルの設定 -->
<div class="modal fade" id="<?php echo $row['DIARY_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">閉じる</span></button>
<h4 class="modal-title" id="myModalLabel"><?php echo $row['NAME']?>：「<?php echo $row['D_TITLE']?>」へのコメント</h4>
</div>
<div class="modal-body">

<form class="form-horizontal" action="diary_comment.php" method="post">
  <div class="form-group">
    <label class="col-sm-3 control-label" for="title">コメント：</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="comment">
    </div>
  </div>
	<div class="text-center">
		<input type="hidden" name="did" value="<?php echo $row['DIARY_ID'];?>" />
		<button type="submit" class="btn btn-primary">投稿</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	</div>
</form>

</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- モーダルここまで --><!-- モーダルここまで --><!-- モーダルここまで -->

</div>
	</div>

    <?php }?>

<!-- 記事の表示　ここまで -->

    </div>

<?php }?>

<?php include('../inc/footer_inc.php'); ?>