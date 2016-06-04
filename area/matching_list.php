<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');
require_once('../function.php');

$query = "SELECT * FROM tb_home NATURAL JOIN tb_user WHERE `REPRESENTATIVE_ID`=`USER_ID` AND NOT EXISTS
(SELECT * FROM tb_demand
WHERE (tb_home.HOME_ID=tb_demand.FROM_ID
OR tb_home.HOME_ID=tb_demand.TO_ID)
AND (FROM_ID='{$hid}' OR TO_ID='{$hid}')
)";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}

$query2 = "SELECT * FROM `tb_home` NATURAL JOIN tb_user WHERE `REPRESENTATIVE_ID`=`USER_ID`";
$rs2 = mysql_query($query2);
if(!$rs2){
	die('エラー: ' . h(mysql_error()));
}

$query3 = "SELECT * FROM  `tb_demand`,`tb_user` NATURAL JOIN tb_home WHERE FROM_ID=HOME_ID AND `REPRESENTATIVE_ID`=`USER_ID`";
$rs3 = mysql_query($query3);
if(!$rs3){
	die('エラー: ' . h(mysql_error()));
}

$query4 = "SELECT * FROM  `tb_demand`,`tb_user` NATURAL JOIN tb_home WHERE TO_ID=HOME_ID AND `REPRESENTATIVE_ID`=`USER_ID` ";
$rs4 = mysql_query($query4);
if(!$rs4){
	die('エラー: ' . h(mysql_error()));
}

$query5 = "SELECT `TO_ID` FROM `tb_demand` WHERE `FROM_ID`='{$hid}'";
$rs5 = mysql_query($query5);
if(!$rs5){
	die('エラー: ' . h(mysql_error()));
}

$query6 = "SELECT COUNT(*)AS COUNT FROM `tb_demand` WHERE 1";
$rs6 = mysql_query($query6);
if(!$rs6){
	die('エラー: ' . h(mysql_error()));
}

$query7 = "SELECT `FROM_ID` FROM `tb_demand` WHERE `TO_ID`='{$hid}'";
$rs7 = mysql_query($query7);
if(!$rs7){
	die('エラー: ' . h(mysql_error()));
}
/*
$query8 = "SELECT COUNT(*)AS COUNT,HOME_ID,H_NAME,NAME,UNIVERSITY,HIGHSCHOOL,MIDDLESCHOOL,ELEMENTARYSCHOOL,PRESCHOOL,FROM_ID,TO_ID FROM  `tb_demand`,`tb_user` NATURAL JOIN tb_home WHERE FROM_ID=HOME_ID AND `REPRESENTATIVE_ID`=`USER_ID` AND `STATE`='1'";
$rs8 = mysql_query($query8);
if(!$rs8){
	die('エラー: ' . h(mysql_error()));
}
*/
$query9 = "SELECT HOME_ID,H_NAME,NAME,UNIVERSITY,HIGHSCHOOL,MIDDLESCHOOL,ELEMENTARYSCHOOL,PRESCHOOL,FROM_ID,TO_ID FROM  `tb_demand`,`tb_user` NATURAL JOIN tb_home WHERE (FROM_ID=HOME_ID OR TO_ID=HOME_ID) AND `REPRESENTATIVE_ID`=`USER_ID` AND `STATE`='1'";
$rs9 = mysql_query($query9);
if(!$rs9){
	die('エラー: ' . h(mysql_error()));
}

?>
	<div class="page-header text-center">
    <h1>ご近所さんリスト</h1>
    </div>


<?php if($utid==0){ ?>

<div class="col-sm-offset-2 col-sm-5">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title text-center">未登録のご近所さん</div>
	</div>
<div class="panel-body">
<!-- ここからパネル内容 -->
<div class="col-sm-6 well well-sm">


<?php
while($row2 = mysql_fetch_array($rs2)){
	if($uid==$row2['USER_ID']){
		$pcode=$row2['POSTALCODE'];
	}
}


while($row = mysql_fetch_array($rs)){
	if(($pcode==$row['POSTALCODE']) && ($uid!=$row['USER_ID'])){
		modal($row['HOME_ID'],$row['NAME'],$row['H_NAME'],$row['UNIVERSITY'],$row['PRESCHOOL'],0);
	}
}
?>
</div>
<!-- ここから承認待ちリスト -->
<div class="col-sm-6 well well-sm">
<div class="text-center"><h4>あなたへのリクエスト</h4></div><br>
<?php
while($row3 = mysql_fetch_array($rs3)){
	if(($hid==$row3['TO_ID']) && ($row3['STATE']==0)){
		modal($row3['HOME_ID'],$row3['NAME'],$row3['H_NAME'],$row3['UNIVERSITY'],$row3['PRESCHOOL'],1);
	}else{
		//echo '<div class="text-center">なし</div>';
	}
}
?>
<!-- ここまで承認待ちリスト -->
<!-- ここから申請リスト -->
<hr style="border:none;border-top:dashed 1px #CCCCCC;height:1px;color:#FFFFFF">
<div class="text-center"><h4>あなたが申請中</h4></div><br>
<?php
while($row4 = mysql_fetch_array($rs4)){
	if(($hid==$row4['FROM_ID']) && ($row4['STATE']==0)){
		modal($row4['HOME_ID'],$row4['NAME'],$row4['H_NAME'],$row4['UNIVERSITY'],$row4['PRESCHOOL'],2);
	}else{
		//echo '<div class="text-center">なし</div>';
	}
}
?>
<!-- ここまで申請リスト -->
<!-- ここまでパネル内容 -->
</div>
</div>
</div>
</div>

<?php
}else{//代表者じゃない場合
?>
<div class="col-sm-4"></div>
<?php
}?>
<!-- ここからご近所さんリスト -->
<div class="col-sm-3">
<div class="panel panel-success">
	<div class="panel-heading">
	<div class="panel-title text-center">ご近所さんリスト</div>
	</div>
	<div class="panel-body">
<?php
	while($row9 = mysql_fetch_array($rs9)){
		if($row9['HOME_ID']!=$hid){
			modal($row9['HOME_ID'],$row9['NAME'],$row9['H_NAME'],$row9['UNIVERSITY'],$row9['PRESCHOOL'],3);
		}
	}
?>
</div>
</div>
</div>
<!-- ここまでご近所さんリスト -->
<?php include ('../inc/footer_inc.php'); ?>