<?php
 include('inc/header_inc.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>新規登録画面</title>
  </head>
  <body>
<!-- 郵便スクリプト -->
<script src="//code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="//jpostal.googlecode.com/svn/trunk/jquery.jpostal.js" type="text/javascript"></script>

	<div class="page-header text-center">
    <h1>新規登録画面</h1>
    </div>

    <div class="col-sm-offset-3 col-sm-6 well well-sm">
    <div class="text-right">※は必須項目です。</div>
		<form class="form-horizontal" action="signup_confirm.php" method="post">
		  <fieldset>
		    <legend>代表者の情報登録</legend>
		    <!-- ラベルとコントロールの表示 -->
		    <div class="form-group">
		      <label for="name" class="col-sm-3 control-label text-right">※名前：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="uname" placeholder="表示する名前を入力">
		      </div>
		    </div>
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">※ユーザＩＤ:</label>
			  <div class="col-sm-4">
			    <input type="text" class="form-control" name="uid" placeholder="ID">
			  </div>
			</div>
		    <div class="form-group">
		      <label for="Password" class="col-sm-3 control-label text-right">※パスワード:</label>
		      <div class="col-sm-4">
		      	<input type="password" class="form-control" name="pass" placeholder="新しいパスワードを入力。">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Password" class="col-sm-3 control-label text-right">※確認用パスワード:</label>
		      <div class="col-sm-4">
		      	<input type="password" class="form-control" name="pass2" placeholder="上と同じパスワードを入力。">
		      </div>
		    </div>
			<div class="form-group">
			  <label for="birth" class="control-label col-sm-3 text-right">※生年月日：</label>
			  <div class="col-sm-8 form-inline">
			    <input type="text" class="form-control" placeholder="年" style="width: 70px" name="year"><span style="margin: 0 5px;">年</span>
			    <input type="text" class="form-control" placeholder="月" style="width: 50px" name="month"><span style="margin: 0 5px;">月</span>
			    <input type="text" class="form-control" placeholder="日" style="width: 50px" name="day"><span style="margin: 0 5px;">日</span>
			  </div>
			</div>
			<div class="form-group">
			  <label for="sex" class="control-label col-sm-3 text-right">※性別：</label>
			    <div class="col-sm-2">
				<select class="form-control" name="sex">
				  <option value="1" selected>男性</option>
				  <option value="0">女性</option>
				</select>
			    </div>
			</div>

		    <legend>家庭の情報登録</legend>


			<div class="form-group">
			<label for="" class="col-sm-3 control-label text-right">※郵便番号:</label>
			<div class="col-sm-5 form-inline">
			〒<input class="form-control" type="text" id="postcode1" name="postcode1" maxlength="3" style="width: 50px">
			 - <input class="form-control" type="text" id="postcode2" name="postcode2" maxlength="4" style="width: 60px">
			</div>
			</div>

			<div class="form-group">
			<label for="" class="col-sm-3 control-label text-right">※都道府県:</label>
			   <div class="col-sm-3">
			   <select class="form-control" id="address1" name="prefecture">
					<option value="" selected>都道府県</option>
					<option value="北海道">北海道</option>
					<option value="青森県">青森県</option>
					<option value="岩手県">岩手県</option>
					<option value="宮城県">宮城県</option>
					<option value="秋田県">秋田県</option>
					<option value="山形県">山形県</option>
					<option value="福島県">福島県</option>
					<option value="茨城県">茨城県</option>
					<option value="栃木県">栃木県</option>
					<option value="群馬県">群馬県</option>
					<option value="埼玉県">埼玉県</option>
					<option value="千葉県">千葉県</option>
					<option value="東京都">東京都</option>
					<option value="神奈川県">神奈川県</option>
					<option value="新潟県">新潟県</option>
					<option value="富山県">富山県</option>
					<option value="石川県">石川県</option>
					<option value="福井県">福井県</option>
					<option value="山梨県">山梨県</option>
					<option value="長野県">長野県</option>
					<option value="岐阜県">岐阜県</option>
					<option value="静岡県">静岡県</option>
					<option value="愛知県">愛知県</option>
					<option value="三重県">三重県</option>
					<option value="滋賀県">滋賀県</option>
					<option value="京都府">京都府</option>
					<option value="大阪府">大阪府</option>
					<option value="兵庫県">兵庫県</option>
					<option value="奈良県">奈良県</option>
					<option value="和歌山県">和歌山県</option>
					<option value="鳥取県">鳥取県</option>
					<option value="島根県">島根県</option>
					<option value="岡山県">岡山県</option>
					<option value="広島県">広島県</option>
					<option value="山口県">山口県</option>
					<option value="徳島県">徳島県</option>
					<option value="香川県">香川県</option>
					<option value="愛媛県">愛媛県</option>
					<option value="高知県">高知県</option>
					<option value="福岡県">福岡県</option>
					<option value="佐賀県">佐賀県</option>
					<option value="長崎県">長崎県</option>
					<option value="熊本県">熊本県</option>
					<option value="大分県">大分県</option>
					<option value="宮崎県">宮崎県</option>
					<option value="鹿児島県">鹿児島県</option>
					<option value="沖縄県">沖縄県</option>
			   </select></div><br/>
			</div>

			<div class="form-group">
			<label for="" class="col-sm-3 control-label text-right">※市区町村:</label>
			   <div class="col-sm-5"><input class="form-control" type="text" id="address2" name="municipality"></div>
			</div>


			<div class="form-group">
			<label for="" class="col-sm-3 control-label text-right">番地・建物名:</label>
			   <div class="col-sm-5"><input class="form-control" type="text"  name="address"></div>
			</div>


			<script type="text/javascript">
			   $(window).ready( function() {
			      $('#postcode1').jpostal({
			         postcode : [
			            '#postcode1',
			            '#postcode2'
			         ],
			         address : {
			            '#address1'  : '%3',
			            '#address2'  : '%4%5'
			         }
			      });
			   });
			</script>

			<legend>関係のある学校名・保育園名/幼稚園名</legend>
			<div class="form-group">
		      <label for="" class="col-sm-3 control-label text-right">学校名(大学)：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="university" placeholder="○○大学">
		      </div>
		    </div>
			<div class="form-group">
		      <label for="" class="col-sm-3 control-label text-right">学校名(高校)：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="highschool" placeholder="○○高校">
		      </div>
		    </div>
			<div class="form-group">
		      <label for="" class="col-sm-3 control-label text-right">学校名(中学校)：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="middleschool" placeholder="○○中学校">
		      </div>
		    </div>
			<div class="form-group">
		      <label for="" class="col-sm-3 control-label text-right">学校名(小学校)：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="elementaryschool" placeholder="○○小学校">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="" class="col-sm-3 control-label text-right">保育園名/幼稚園名：</label>
		      <div class="col-sm-4">
		      	<input type="text" class="form-control" name="preschool" placeholder="○○保育園または○○幼稚園">
		      </div>
		    </div>



		    <!-- 登録ボタンの表示 -->
		    <button type="submit" class="btn btn-default">登録</button>
		  </fieldset>
		</form>
    </div>





  </body>
</html>