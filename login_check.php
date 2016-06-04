<?php
 $u = $_POST['uid'];  //ログイン画面より送信されたユーザID、例えば,'k12jk230';
 $p = $_POST['pass'];  //ログイン画面より送信されたパスワード、例えば,'ar37';
 $sql = sprintf("SELECT * FROM tb_user NATURAL JOIN tb_area NATURAL JOIN tb_home WHERE USER_ID='%s' AND PASSWORD='%s'", $_POST['uid'], $_POST['pass']);
 include ("inc/db_inc.php");
 $rs = mysql_query($sql, $conn);
 if (!$rs)  die('エラー: ' . mysql_error());
 $row= mysql_fetch_array($rs);
if ($row){ 
    session_start();
    $_SESSION['UID']   = $row['USER_ID'];
    $_SESSION['UNAME'] = $row['NAME'];
    $_SESSION['UTID'] = $row['UT_ID'];
    $_SESSION['HID'] = $row['HOME_ID'];
    $_SESSION['AID'] = $row['AREA_ID'];
    header('Location:index.php');
 }else{
  include('inc/header_inc.php'); 
   echo '<h2>ログイン失敗！</h2>';
   echo '<h2>ユーザー名もしくはパスワードが違います！</h2>';
   include('inc/footer_inc.php'); 
 }

?>