<?php
header("Location: login.php") ;
include ('inc/header_inc.php');

require_once('inc/db_inc.php');
$query = "SELECT MAX(SUBSTRING(`HOME_ID`, 5 )) FROM `tb_home`";
$rs = mysql_query($query);
if(!$rs){
	die('エラー: ' . h(mysql_error()));
}


$row = mysql_fetch_array($rs);
$maxnum=$row['MAX(SUBSTRING(`HOME_ID`, 5 ))'];

//次にDBにいれるHOME_ID
$next = "home".($maxnum+1);

?>
<?php

$uname = $_POST['uname'];
$uid = $_POST['uid'];
$pass = $_POST['pass'];
$birthday = $_POST['birthday'];
$sex = $_POST['sex'];
$postcode = $_POST['postcode'];
$prefecture = $_POST['prefecture'];
$municipality = $_POST['municipality'];
$address = $_POST['address'];
$university = $_POST['university'];
$highschool = $_POST['highschool'];
$middleschool = $_POST['middleschool'];
$elementaryschool = $_POST['elementaryschool'];
$preschool = $_POST['preschool'];

$hname=$uname.":家";


// echo $uname."<br>";
// echo $uid."<br>";
// echo $pass."<br>";
// echo $prefecture."<br>";
// echo $birthday."<br>";
// echo $sex."<br>";
// echo $postcode."<br>";
// echo $prefecture."<br>";
// echo $municipality."<br>";
// echo $school."<br>";
// echo $preschool."<br>";
// echo $next;

switch ($prefecture){
	case '北海道':
		$area="area1";
		break;
	case '青森県':
		$area="area2";
		break;
	case '岩手県':
		$area="area3";
		break;
	case '宮城県':
		$area="area4";
		break;
	case '秋田県':
		$area="area5";
		break;
	case '山形県':
		$area="area6";
		break;
	case '福島県':
		$area="area7";
		break;
	case '茨城県':
		$area="area8";
		break;
	case '栃木県':
		$area="area9";
		break;
	case '群馬県':
		$area="area10";
		break;
	case '埼玉県':
		$area="area11";
		break;
	case '千葉県':
		$area="area12";
		break;
	case '東京都':
		$area="area13";
		break;
	case '神奈川県':
		$area="area14";
		break;
	case '新潟県':
		$area="area15";
		break;
	case '富山県':
		$area="area16";
		break;
	case '石川県':
		$area="area17";
		break;
	case '福井県':
		$area="area18";
		break;
	case '山梨県':
		$area="area19";
		break;
	case '長野県':
		$area="area20";
		break;
	case '岐阜県':
		$area="area21";
		break;
	case '静岡県':
		$area="area22";
		break;
	case '愛知県':
		$area="area23";
		break;
	case '三重県':
		$area="area24";
		break;
	case '滋賀県':
		$area="area25";
		break;
	case '京都府':
		$area="area26";
		break;
	case '大阪府':
		$area="area27";
		break;
	case '兵庫県':
		$area="area28";
		break;
	case '奈良県':
		$area="area29";
		break;
	case '和歌山県':
		$area="area30";
		break;
	case '鳥取県':
		$area="area31";
		break;
	case '島根県':
		$area="area32";
		break;
	case '岡山県':
		$area="area33";
		break;
	case '広島県':
		$area="area34";
		break;
	case '山口県':
		$area="area35";
		break;
	case '徳島県':
		$area="area36";
		break;
	case '香川県':
		$area="area37";
		break;
	case '愛媛県':
		$area="area38";
		break;
	case '高知県':
		$area="area39";
		break;
	case '福岡県':
		$area="area40";
		break;
	case '佐賀県':
		$area="area41";
		break;
	case '長崎県':
		$area="area42";
		break;
	case '熊本県':
		$area="area43";
		break;
	case '大分県':
		$area="area44";
		break;
	case '宮崎県':
		$area="area45";
		break;
	case '鹿児島県':
		$area="area46";
		break;
	case '沖縄県':
		$area="area47";
		break;
}

//echo $area."<br>";




	$sql="INSERT INTO `tb_home`(`AREA_ID`, `HOME_ID`, `H_NAME`, `REPRESENTATIVE_ID`, `POSTALCODE`, `PREFECTURES`, `MUNICIPALITY`, `ADDRESS`, `UNIVERSITY`, `HIGHSCHOOL`, `MIDDLESCHOOL`, `ELEMENTARYSCHOOL`, `PRESCHOOL`)
	VALUES ('{$area}','{$next}','{$hname}','{$uid}','{$postcode}','{$prefecture}','{$municipality}','{$address}','{$university}','{$highschool}','{$middleschool}','{$elementaryschool}','{$preschool}')";
 	include('inc/db_inc.php');  // データベース接続
 	$sql2="INSERT INTO `tb_user`(`HOME_ID`, `UT_ID`, `USER_ID`, `PASSWORD`, `NAME`, `SEX`, `BIRTHDAY`, `EMAIL`)
 	VALUES('{$next}','0','{$uid}','{$pass}','{$uname}','{$sex}','{$birthday}','')";

 	$rs = mysql_query($sql, $conn); //SQL文を実行
 	$rs2 = mysql_query($sql2, $conn); //SQL文を実行




?>
