<?php
 include('../inc/header_inc.php');
?>
	<div class="page-header text-center">
    <h1>家族メンバー登録画面</h1>
    </div>

    <div class="col-sm-offset-3 col-sm-6 well well-sm">
		<form class="form-horizontal" action="member_signup_save.php" method="post">
		  <fieldset>
		    <legend>メンバーの情報登録</legend>
		    <!-- ラベルとコントロールの表示 -->
		    <div class="form-group">
		      <label for="name" class="col-sm-3 control-label text-right">名前：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="mname" placeholder="表示する名前を入力">
		      </div>
		    </div>
			<div class="form-group">
			  <label for="newuid" class="col-sm-3 control-label">ユーザＩＤ:</label>
			  <div class="col-sm-4">
			    <input type="text" class="form-control" name="mid" placeholder="ID">
			  </div>
			</div>
		    <div class="form-group">
		      <label for="newpassword" class="col-sm-3 control-label text-right">仮パスワード:</label>
		      <div class="col-sm-4">
		      	<input type="password" class="form-control" name="mpassword" placeholder="新しいパスワードを入力。">
		      </div>
		    </div>
			<div class="form-group">
			  <label for="birth" class="control-label col-sm-3 text-right">生年月日：</label>
			  <div class="col-sm-8 form-inline">
			    <input type="text" name="myear" class="form-control" placeholder="年" style="width: 70px"><span style="margin: 0 5px;">年</span>
			    <input type="text" name="mmonth" class="form-control" placeholder="月" style="width: 50px"><span style="margin: 0 5px;">月</span>
			    <input type="text" name="mday" class="form-control" placeholder="日" style="width: 50px"><span style="margin: 0 5px;">日</span>
			  </div>
			</div>
			<div class="form-group">
			  <label for="sex" class="control-label col-sm-3 text-right">性別：</label>
			    <div class="col-sm-2">
				<select class="form-control" name="msex">
				  <option value="1" selected>男性</option>
				  <option value="2">女性</option>
				</select>
			    </div>
			</div>
			<div class="form-group">
			  <label for="reration" class="control-label col-sm-3 text-right">続柄：</label>
			    <div class="col-sm-2">
				<select class="form-control" name="mreration">
				  <option value="1" selected>親</option>
				  <option value="2">子</option>
				</select>
			    </div>
			</div>


		    <!-- 登録ボタンの表示 -->
		    <button type="submit" class="btn btn-default">登録</button>
		  </fieldset>
		</form>
    </div>

<?php include('../inc/footer_inc.php'); ?>