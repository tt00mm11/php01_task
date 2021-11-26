<?php

// var_dump($font);
// exit();

//データの受け取り
if (isset($_POST['font']) && is_array($_POST['font'])) {
  $font = implode("、", $_POST["font"]);
}

$deadline = $_POST["deadline"];
//データ一件を1行にまとめる（最後に改行\nを入れる）
$write_data = "{$deadline}, {$font}\n";

//ファイルを開く引数が｀a｀である部分に注目
$file =fopen('data/todo.csv','a');
//ファイルをロックする
flock($file, LOCK_EX);

//指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

//ファイルのロックを解除する
flock($file, LOCK_UN);
//ファイルを閉じる
fclose($file);

//データ入力画面に移動する
header("Location:todo_txt_read.php");

?>