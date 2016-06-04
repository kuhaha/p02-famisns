<?php
include ('../inc/header_inc.php');
require_once ('../inc/db_inc.php');

$query = "SELECT COUNT(*)AS COUNT,USER_ID,NAME,U_IMAGE,COMMENT,HOBBY FROM `tb_userprof` NATURAL JOIN tb_user WHERE `USER_ID`='{$uid}'";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}
$row = mysql_fetch_array($rs)
?>
	<div class="page-header text-center">
		<h1>個人プロフ編集画面</h1>
    </div>

<div class="col-sm-offset-3 col-sm-6 well well-sm">
	<div class="panel panel-primary">
		<div class="panel-heading">個人のプロフィール</div>
		<div class="panel-body">
			<form class="form-horizontal" action="user_prof_save.php" method="post" enctype="multipart/form-data">
			<?php if($row['COUNT']!=0){ //個人プロフが登録されているならば  ?>
				<div class="form-group">
			    	<div class="col-md-3">
			    	<?php
			    	if($row['U_IMAGE']==""){
			    	?>
			    	<a href="../img/sample1.png" class="thumbnail"><img src="../img/sample1.png"></a>
			    	<?php
			    	}else{
			    	?>
			    	<a href="<?php echo $row['U_IMAGE'];?>" class="thumbnail"><img src="<?php echo $row['U_IMAGE'];?>"></a>
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
					<label class="col-sm-3 control-label" for="name">名前：</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="uname" value="<?= $row['NAME']?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="comment">フリーコメント：</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="comment" value="<?= $row['COMMENT']?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="comment">趣味：</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="hobby" value="<?= $row['HOBBY']?>">
					</div>
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-default">更新</button>
				</div>

			<?php }else{ //個人プロフが登録されていないならば、 ?>
				<div class="form-group">
			    	<div class="col-md-3">
			    	<a href="../img/sample1.png" class="thumbnail"><img src="../img/sample1.png"></a>
			    	</div>
				</div>

			    <div class="form-group">
			      <label for="name" class="col-sm-3 control-label text-right">画像(JPG)：</label>
			      <div class="col-sm-4">
			      	<input type="file" name="upfile" size="30" />
			      </div>
			    </div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="name">名前：</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="uname" value="<?= $row['NAME']?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="comment">コメント：</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="comment" value="未登録">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="comment">趣味：</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="hobby" value="未登録">
					</div>
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-default">更新</button>
				</div>
			<?php }?>
			</form>
		</div>
	</div>
</div>


<?php include('../inc/footer_inc.php'); ?>
