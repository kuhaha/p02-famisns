<?php
    $file = 'log.txt';

    if (isset($_POST['data'])) {
        //POSTされたときは書き込み処理をする
        // fopen関数のモードにaを指定すると追加になる
        $fp = @fopen($file, 'a');
        if ($fp == false) {
        //console.log("このファイルには書き込みできません。");
        } else {
            $contents = htmlspecialchars($_POST['data']);
            fwrite($fp, $contents);
            fclose($fp);
       //console.log("書き込み完了しました。");
       }
    }

    // ファイルを読み込み専用でオープンする
    $fp = fopen('log.txt', 'r');
    // 終端に達するまでループ
    while (!feof($fp)) {
    // ファイルから一行読み込む
        $line = fgets($fp);
    // 読み込んだ行を出力する
        print $line;
    }
    // ファイルをクローズする
    fclose($fp);
?>