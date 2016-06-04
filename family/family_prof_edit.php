<?php
include ('../inc/header_inc.php');
require_once ('../inc/db_inc.php');

$query = "SELECT * FROM `tb_homeprof` NATURAL JOIN tb_home WHERE `HOME_ID`='{$hid}'";
$rs = mysql_query($query);
if(!$rs) 	die('エラー: ' . h(mysql_error()));

$row = mysql_fetch_array($rs)
?>

	<div class="page-header text-center">
	<?php
	if ($_SESSION ['UTID'] == 0) {
		echo "<h1>家庭プロフ編集画面</h1>";
	} else {
		echo "<h1>代表者のみの機能です。</h1>";
	}
	?>
    </div>



<div class="col-sm-offset-3 col-sm-6 well well-sm">
	<div class="panel panel-primary">
		<div class="panel-heading">家庭のプロフィール</div>
		<div class="panel-body">
			<form class="form-horizontal" action="family_prof_edit_save.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
			    	<div class="col-md-3">
			    	<?php
			    	if($row['IMAGE']==""){
			    	?>
			    	<a href="homeimg/nohome.png" class="thumbnail"><img src="homeimg/nohome.png"></a>
			    	<?php
			    	}else{
			    	?>
			    	<a href="<?php echo $row['IMAGE'];?>" class="thumbnail"><img src="<?php echo $row['IMAGE'];?>"></a>
			    	<?php } ?>
			    	</div>
				</div>
			    <div class="form-group">
			      <label for="name" class="col-sm-3 control-label text-right">画像(JPG)：</label>
			      <div class="col-sm-4">
			      	<input type="file" name="upfile" size="30" />
			      </div>
			    </div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="name">家庭名：</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="hname" value="<?= $row['H_NAME']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="comment">フリーコメント：</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="comment"><?= $row['COMMENT']?></textarea>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-default">更新</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php include('../inc/footer_inc.php'); ?>