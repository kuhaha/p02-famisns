<?php
include ('../inc/header_inc.php');

require_once('../inc/db_inc.php');
$query = "SELECT * FROM `tb_areaivent` ORDER BY `tb_areaivent`.`AI_DATETIME` DESC ";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}

if(!isset($_SESSION['UTID'])){
	header("Location: login.php") ;
	exit(); //処理中止
}else{
?>
	<div class="page-header text-center">
    <h1>イベント一覧</h1>
    </div>

<div class="col-sm-offset-3 col-sm-6 well well-sm">
<!-- 切り替えボタンの設定 -->
<a data-toggle="modal" href="#myModal" class="center-block btn btn-success">イベント投稿</a><br>
<!-- モーダルの設定 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">閉じる</span></button>
        <h4 class="modal-title" id="myModalLabel">イベント投稿</h4>
      </div>
      <div class="modal-body">

		<form class="form-horizontal" action="areaivent_add.php" method="post">
		  <fieldset>

		    <!-- ラベルとコントロールの表示 -->
		    <div class="form-group">
		      <label for="name" class="col-sm-3 control-label text-right">イベント名：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="ivent_title">
		      </div>
		    </div>


		    <div class="form-group">
		      <label for="name" class="col-sm-3 control-label text-right">日時：</label>
		      <div class="col-sm-5">
		      	<input type="datetime-local" class="form-control" name="ivent_stime">
		      </div>記入例：2015/11/11 09:00:00
		    </div>


		    <div class="form-group">
		      <label for="name" class="col-sm-3 control-label text-right">場所：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="location">
		      </div>
		    </div>

			  <div class="form-group">
			    <label class="col-sm-3 control-label" for="text">内容：</label>
			    <div class="col-sm-5">
			      <textarea class="form-control" name="ivent_detail"></textarea>
			    </div>
			  </div>

		    <!-- 登録ボタンの表示 -->
		    <div class="text-center">
		    <button type="submit" class="btn btn-primary">投稿</button>
		    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
		    </div>
		  </fieldset>
		</form>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php

$now = date( "Y-m-d H:i:s", time() );//現在日時の取得
?>

		<div class="panel panel-primary">
		  <div class="panel-heading">イベント一覧</div>

<!-- イベントの表示  -->
<div class="panel-group" id="accordion">

<?php while($row = mysql_fetch_array($rs)){


?>
<?php
//日付日時の分割
$set_date = $row['AI_DATETIME'];
$date = array();
preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{1,2}):([0-9]{1,2})@",$set_date,$date);
// $date[0]; // yyyy/mm/dd hh:mm:ss
// $date[1]; // year
// $date[2]; // month
// $date[3]; // day
// $date[4]; // hours
// $date[5]; // minutes
// $date[6]; // seconds
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

<?php } ?>

</div>
<!-- イベントの表示 ここまで -->
		</div>
    </div>
<?php }?>


<?php
include ('../inc/footer_inc.php'); 
?>