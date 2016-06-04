<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');
require_once('../function.php');

$query = "SELECT * FROM `tb_fdemand` NATURAL JOIN tb_user WHERE (`FROM_UID`=`USER_ID` OR `TO_UID`=`USER_ID`) AND `STATE`='1' AND `USER_ID`!='{$uid}' AND (`FROM_UID`='{$uid}' OR `TO_UID`='{$uid}')";
$rs = mysql_query($query);
if(!$rs){
  die('エラー: ' . h(mysql_error()));
}

$query2 = "SELECT * FROM `tb_fdemand` NATURAL JOIN tb_user WHERE (`FROM_UID`=`USER_ID` OR `TO_UID`=`USER_ID`) AND `STATE`='0' AND `USER_ID`!='{$uid}' AND `FROM_UID`='{$uid}'";
$rs2 = mysql_query($query2);
if(!$rs2){
  die('エラー: ' . h(mysql_error()));
}

$query3 = "SELECT * FROM `tb_fdemand` NATURAL JOIN tb_user WHERE (`FROM_UID`=`USER_ID` OR `TO_UID`=`USER_ID`) AND `STATE`='0' AND `USER_ID`=`FROM_UID` AND `TO_UID`='{$uid}'";
$rs3 = mysql_query($query3);
if(!$rs3){
  die('エラー: ' . h(mysql_error()));
}


?>

	<div class="page-header text-center">
    <h1>フレンドリスト</h1>
    </div>




<div class="col-sm-offset-3 col-sm-3">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title text-center">未登録のユーザー</div>
	</div>
<div class="panel-body">
<!-- ここからパネル内容 -->
<!-- ここから承認待ちリスト -->
<div class="text-center"><h4>あなたへのリクエスト</h4></div><br>
<?php
while($row3 = mysql_fetch_array($rs3)){
	userprof($uid,$row3['USER_ID'],1);
}
?>
<!-- ここまで承認待ちリスト -->
<!-- ここから申請リスト -->
<hr style="border:none;border-top:dashed 1px #CCCCCC;height:1px;color:#FFFFFF">
<div class="text-center"><h4>あなたが申請中</h4></div><br>
<?php
while($row2 = mysql_fetch_array($rs2)){
	userprof($uid,$row2['USER_ID'],2);
}
?>
<!-- ここまで申請リスト -->
<!-- ここまでパネル内容 -->
</div>
</div>
</div>

<!-- ここからご近所さんリスト -->
<div class="col-sm-3">
<div class="panel panel-info">
	<div class="panel-heading">
		<div class="panel-title text-center">フレンドリスト</div>
	</div>
	<div class="panel-body">
<?php
while($row = mysql_fetch_array($rs)){
	userprof($uid,$row['USER_ID'],4);
}
?>
	</div>
</div>
</div>
<!-- ここまでご近所さんリスト -->
<?php include('../inc/footer_inc.php'); ?>