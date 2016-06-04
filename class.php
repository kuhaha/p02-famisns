<?php

Class Finish{
	//完了or未完了の表示
	function dispFinish($num){
		if($num==0){
			echo '<input type="button" class="btn btn-danger btn-xs pull-right" value="未完了">';
		}else{
			echo '<input type="button" class="btn btn-success btn-xs pull-right" value="完了">';
		}
	}
}

?>