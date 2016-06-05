var gDstUrl = "output.php";
var gTimerId;
var gXHR;
var gIsUpdate = true;
var gScrollPos;

window.onload = function() {
  var elementInputName = document.getElementById("input_name");
  var elementInputRemark = document.getElementById("input_remark");
  var elementButtonSend = document.getElementById("button_send");
  var elementButtonUpdate = document.getElementById("button_update");
  var elementTextareaLog = document.getElementById("textarea_log");

  gXHR = XMLHttpRequestCreate();

  // 周期呼び出し関数
  intervalRequest = function() {
    isScroll();
    httpRequest(null);
    console.log(gIsUpdate);
    console.log(elementTextareaLog.scrollTop);
    console.log(elementTextareaLog.scrollHeight);
  }

    // Textareaでスクロールされた時の処理
    isScroll = function() {
        if(gScrollPos != elementTextareaLog.scrollTop)
           gIsUpdate = false;
        else
           gIsUpdate = true;
    }

    // 更新ボタンがおされた時の処理
    isUpdate = function() {
      if(gIsUpdate)
        gIsUpdate = false;
      else {
        gIsUpdate = true;
        elementTextareaLog.scrollTop = elementTextareaLog.scrollHeight;
      }
    }
  // 送信ボタンが押された時の処理
  postData = function() {
    var postdata = Array();
    postdata['data'] = elementInputName.value + ":" + elementInputRemark.value + "\n";
    httpRequest(postdata);
    elementInputRemark.value = "";
    elementTextareaLog.scrollTop = elementTextareaLog.scrollHeight;
  }
  httpRequest = function(senddata) {
    // アクセス先 URL を設定するには、open() メソッドを使用します。
    // このメソッドを呼び出した段階では、まだ通信は行われません。
    // XMLHttpRequest.open(HTTPメソッド , アクセス先のURL , 非同期実行か？ , ユーザー名 , パスワード) :Void
    gXHR.open("POST", gDstUrl);
    // リクエストヘッダを設定するには、setRequestHeader() メソッドを使用します。
    // XMLHttpRequest.setRequestHeader("ヘッダの種類","値") :Void
    gXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    // 送信したいデータ」を指定し、XHR 通信を開始するには、send() メソッドを使用します
    // XMLHttpRequest.send( 送信データ ) :Void
    gXHR.send(encodeHTMLForm(senddata));
  }

  // XHR 通信の状態を取得するには、readyState プロパティを使用します。
  // 送受信状態に変更がある場合に実行されるイベント
  gXHR.onreadystatechange = function () {
    switch (gXHR.readyState) {
      case 0: // XMLHttpRequest オブジェクトを作成した状態
        break;
      case 1: // open() メソッドの呼び出しが完了している
        break;
      case 2: // レスポンスヘッダの受信は完了している
        break;
      case 3: // レスポンスボディを受信中
        break;
      case 4: // 完了
        // HTTP ステータスコードを取得するには、status プロパティを使用します。
        // readyState が、2 (HEADERS_RECEIVED) 以上であれば、アクセスできます。
        // status プロパティから 0 が得られた場合、XHR 通信の失敗を意味します。
        if (gXHR.status == 0) {
          console.log("XHR 通信失敗");
          elementTextareaLog.value = "エラー";
        } else if ((200 <= gXHR.status && gXHR.status < 300) || (gXHR.status == 304)) {
          console.log("XHR 通信成功");
          elementTextareaLog.value = gXHR.responseText;
          if(gIsUpdate){
             elementTextareaLog.scrollTop = elementTextareaLog.scrollHeight;
             gScrollPos = elementTextareaLog.scrollTop;
          }
        }
        break;
    }
  };

  gTimerId = setInterval("intervalRequest()", 10 * 50);
  httpRequest(null);
  // 「送信」ボタンが押されたらリクエストする
  elementButtonSend.onclick = postData;

  // 発言欄でEnterキーが押されたらリクエストする
  elementInputRemark.onkeypress = function() {
    if (window.event.keyCode == 13) postData();
  }
    // 「更新」ボタンが押されたらリクエストする
  elementButtonUpdate.onclick = isUpdate;
}
// HTMLフォームの形式にデータを変換する
function encodeHTMLForm(data) {
  var params = [];
  for (var name in data) {
    var value = data[ name ];
    var param = encodeURIComponent(name).replace(/%20/g, '+')
     + '=' + encodeURIComponent(value).replace(/%20/g, '+');
    params.push(param);
  }
  return params.join('&');
}