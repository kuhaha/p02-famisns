<?php
include ('../inc/header_inc.php');
require_once('../inc/db_inc.php');
$query = "SELECT * FROM  `tb_album` NATURAL JOIN tb_user WHERE `HOME_ID`='{$hid}' ORDER BY  `tb_album`.`AL_POSTTIME` DESC ";
$rs = mysql_query($query);
if(!$rs)die('エラー: ' . h(mysql_error()));

?>

  	<div class="page-header text-center">
    <h1>画像一覧</h1>
    </div>
<?php
  while($row = mysql_fetch_array($rs)){
  	$img[]=$row['IMAGE'];
  	$dt[]=$row['AL_POSTTIME'];
  }
?>
<!-- カルーセルはじまり -->
<div class="col-sm-offset-4 col-sm-4 well well-sm">
<div id="carousel-examples" class="carousel slide" data-ride="carousel">
  <!-- 標識の設定 -->
  <ol class="carousel-indicators">
  <?php
  for($i=0;$i<count($img);$i++){
  	if($i==0){
  ?>
    <li data-target="#carousel-examples" data-slide-to="<?= $i ?>" class="active"></li>
  <?php
   }else{
  ?>
    <li data-target="#carousel-examples" data-slide-to="<?= $i ?>"></li>
  <?php
   }}?>

  </ol>

  <!-- スライドさせる画像の設定 -->
  <div class="carousel-inner">
  <?php
  for($i=0;$i<count($img);$i++){
  	if($i==0){
  ?>
    <div class="item active">
      <img src="<?= $img[$i] ?>">
    </div>
  <?php
   }else{
  ?>
    <div class="item">
      <img src="<?= $img[$i] ?>">
    </div>
  <?php
   }}?>
  </div>
  <!-- スライドコントロールの設定 -->
  <a class="left carousel-control" href="#carousel-examples" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  </a>
  <a class="right carousel-control" href="#carousel-examples" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </a>
</div>
</div>
<!-- カルーセルおわり -->


<div class="col-sm-offset-3 col-sm-6 well well-sm">
<?php for($i=0;$i<count($img);$i++){
//日付日時の分割
			$set_date = $dt[$i];
			$date = array();
			preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{2}):([0-9]{1,2}):([0-9]{1,2})@",$set_date,$date);
			// $date[0]; // yyyy/mm/dd hh:mm:ss
if($i==0){
?>
<div class="row">
<?php
}
?>

    <div class="col-md-3 col-xs-3">
    <?php echo $date[1]."/".$date[2]."/".$date[3]; ?>
        <a href="<?= $img[$i] ?>" class="thumbnail">
            <img src="<?= $img[$i] ?>">
        </a>
    </div>
    <?php if(($i+1)%4==0){echo '</div><div class="row">';}//画像4つで改行 ?>
<?php }?>

</div>
</div>

<?php include('../inc/footer_inc.php'); ?>