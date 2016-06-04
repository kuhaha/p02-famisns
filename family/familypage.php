<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');
if(!isset($_SESSION['UTID'])){
	header("Location: ../login.php") ;
	exit(); //処理中止
}else{


$query = "SELECT * FROM tb_housework";
$rs = mysql_query($query);
if(!$rs){
  die('エラー: ' . h(mysql_error()));
}

$query2 = "SELECT * FROM `tb_familyivent` WHERE `HOME_ID`='{$hid}' ORDER BY FI_DATETIME DESC ";
$rs2 = mysql_query($query2);
if(!$rs2){
	die('エラー: ' . h(mysql_error()));
}

//ここからボタン初期化処理
$query3 = "SELECT * FROM tb_housework ORDER BY `UPDATE` DESC";
$rs3 = mysql_query($query3);
if(!$rs3){
  die('エラー: ' . h(mysql_error()));
}
$row3 = mysql_fetch_array($rs3);
$now=date( "Y-m-d H:i:s", time() );//現在日時の取得
//日付日時の分割
$set_date1 = $row3['UPDATE'];
$date1 = array();
preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{1,2}):([0-9]{1,2})@",$set_date1,$date1);
// $date[0]; // yyyy/mm/dd hh:mm:ss
$updtime=$date1[1].$date1[2].$date1[3];

$set_date2 = $now;
$date2 = array();
preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{1,2}):([0-9]{1,2})@",$set_date2,$date2);
// $date[0]; // yyyy/mm/dd hh:mm:ss
$now2=$date2[1].$date2[2].$date2[3];
if($now2 != $updtime){
	$sql="UPDATE tb_housework SET `HW_FINISH`='0'";
	include('../inc/db_inc.php');  // データベース接続
	$rs4 = mysql_query($sql, $conn); //SQL文を実行
}
//ここまでボタン初期化処理


?>

<html>
  <head>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <title>家族詳細画面</title>
  </head>
  <body>
  	<div class="page-header text-center">
    <h1>家族詳細</h1>
    </div>

    <div class="col-sm-offset-3 col-sm-6 well well-sm">
		<div class="panel panel-primary">
		  <div class="panel-heading">直近の家族予定</div>

<!-- 家族予定の表示  -->
			<div class="panel-group" id="accordion">

			<?php while($row2 = mysql_fetch_array($rs2)){ ?>
			<?php
			if($now <= $row2['FI_DATETIME']){
			//日付日時の分割
			$set_date = $row2['FI_DATETIME'];
			$date = array();
			preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{1,2}):([0-9]{1,2})@",$set_date,$date);
			// $date[0]; // yyyy/mm/dd hh:mm:ss
			?>
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row2['FIVENT_ID'];?>">
			          <?php echo $date[1]."年".$date[2]."月".$date[3]."日"."：".$row2['FI_TITLE'];?>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse<?php echo $row2['FIVENT_ID'];?>" class="panel-collapse collapse">
			      <div class="panel-body">
			        <?php
			        echo "場所：".$row2['FI_PLACE']."<br><br>";
			        echo nl2br($row2['FI_DETAIL']);
			        ?>
			      </div>
			    </div>
			  </div>
			<?php }} ?>
			</div>

		  <div class="text-center"><a href="family_ivent.php" class="btn btn-link">全て表示</a></div>
		</div>
    </div>
<!-- 家族予定の表示 ここまで -->



<?php
include('../function.php');
?>

    <div class="col-sm-offset-3 col-sm-6 well well-sm">
		<div class="col-sm-6">
		<div class="panel panel-primary">
		  <div class="panel-heading">家事やることリスト</div>
			<ul class="list-group">
				<?php
				while($row = mysql_fetch_array($rs)){
					echo '<li class="list-group-item">'.$row['HW_NAME'];
					dispFinish($row['HWORK_ID'],$row['HW_NAME'],$row['HW_FINISH'],1);
				}
				?>
			</ul>
		  <div class="panel-footer text-center">編集</div>
		</div>
		</div>

		<div class="col-sm-6">
		<div class="panel panel-primary">
		  <div class="panel-heading">ＴＯＤＯランキング</div>
			<ul class="list-group">
				<li class="list-group-item"><span class="badge">１００Ｐｔ</span>１位：太郎
				</li>
				<li class="list-group-item"><span class="badge">８０Ｐｔ</span>２位：ダイスケ
				</li>
				<li class="list-group-item"><span class="badge">５０Ｐｔ</span>３位：花子
				</li>
			</ul>
		  <div class="panel-footer text-center">詳細</div>
		</div>
		</div>
    </div>


    <div class="col-sm-offset-3 col-sm-6 well well-sm"><div class="text-center">最近更新された日記</div>
		<div class="panel panel-info">
		  <div class="panel-heading">ダイスケ：オープンキャンパス</div>
		  <div class="panel-body">
		    学校のオープンキャンパスに行ってきた。<br>
		    ・・・
		  </div>
		  <div class="panel-footer text-right">コメントする</div>
		</div>
    </div>

<?php }?>

<?php include('../inc/footer_inc.php'); ?>