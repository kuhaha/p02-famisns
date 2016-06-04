<?php
include ('inc/header_inc.php');

?>
<?php

$uname = $_POST['uname'];
$uid = $_POST['uid'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$birthday = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$sex = $_POST['sex'];
$postcode = $_POST['postcode1'].$_POST['postcode2'];
$prefecture = $_POST['prefecture'];
$municipality = $_POST['municipality'];
$address = $_POST['address'];
$university = $_POST['university'];
$highschool = $_POST['highschool'];
$middleschool = $_POST['middleschool'];
$elementaryschool = $_POST['elementaryschool'];
$preschool = $_POST['preschool'];

if($pass != $pass2){
	echo"パスワードをもう一度正しく入力してください。";
}else{
	if($uname==""){
		echo "名前が入力されていません。";
	}else if($uid==""){
		echo "IDが入力されていません。";
	}else if($pass==""){
		echo "パスワードが入力されていません。";
	}else if($postcode==""){
		echo "郵便番号が入力されていません。";
	}else if($municipality==""){
		echo "市区町村が入力されていません。";
	}else if($birthday==""){
		echo "生年月日が入力されていません。";
	}else{

?>

<div class="col-sm-offset-3 col-sm-6 well well-sm">
<?php
echo "<h1>"."登録情報の確認"."</h1>";
echo "<h3>"."この内容で登録してよろしいですか？"."</h3>"."<br>";
echo "<h4>"."代表者名：".$uname."</h4><br>";
echo "<h4>"."ユーザーID：".$uid."</h4><br>";
echo "<h4>"."パスワード：".$pass."</h4><br>";
echo "<h4>"."生年月日：".$birthday."</h4><br>";
echo "<h4>"."性別：".$sex."</h4><br>";
echo "<h4>"."郵便番号：".$postcode."</h4><br>";
echo "<h4>"."都道府県名：".$prefecture."</h4><br>";
echo "<h4>"."市区町村：".$municipality."</h4><br>";
echo "<h4>"."番地：".$address."</h4><br>";
echo "<h4>"."関係のある大学名：".$university."</h4><br>";
echo "<h4>"."関係のある高校名：".$highschool."</h4><br>";
echo "<h4>"."関係のある中学校名：".$middleschool."</h4><br>";
echo "<h4>"."関係のある小学校名：".$elementaryschool."</h4><br>";
echo "<h4>"."関係のある保育園名：".$preschool."</h4><br>";
?>
<form class="form-horizontal" action="signup_save.php" method="post">
	<input type="hidden" name="uname" value=<?php echo $uname; ?>>
	<input type="hidden" name="uid" value=<?php echo $uid; ?>>
	<input type="hidden" name="pass" value=<?php echo $pass; ?>>
	<input type="hidden" name="birthday" value=<?php echo $birthday; ?>>
	<input type="hidden" name="sex" value=<?php echo $sex; ?>>
	<input type="hidden" name="postcode" value=<?php echo $postcode; ?>>
	<input type="hidden" name="prefecture" value=<?php echo $prefecture; ?>>
	<input type="hidden" name="municipality" value=<?php echo $municipality; ?>>
	<input type="hidden" name="address" value=<?php echo $addressl; ?>>
	<input type="hidden" name="university" value=<?php echo $university; ?>>
	<input type="hidden" name="highschool" value=<?php echo $highschool; ?>>
	<input type="hidden" name="middleschool" value=<?php echo $middleschool; ?>>
	<input type="hidden" name="elementaryschool" value=<?php echo $elementaryschool; ?>>
	<input type="hidden" name="preschool" value=<?php echo $preschool; ?>>
	<div class="text-center">
	    <!-- 登録ボタンの表示 -->
	    <button type="submit" class="btn btn-default">登録</button>

	    <Input type=button class="btn btn-default" value="戻る" onClick="javascript:history.go(-1)">
	</div>
</form>
</div>
<?php } }?>