<?php

//データまとめ用の空文字変数
$str = '';
$array = [];
// $line_array = '';

//ファイルを開く（読み取り専用）
$file = fopen('data/todo.csv', 'r');
//ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→＄lineに格納
if ($file){
  while ($line = fgetcsv($file)){
    //取得したデータを｀$str｀に追加する
    $str .="<tr><td>{$line[0]}{$line[1]}</td></tr>";//日時と名前の番号を指定
    array_push($array, $line);
    // var_dump($line[0]);
    // exit();
  }
}


//ロックを解除する
flock($file, LOCK_UN);
//ファイルを閉じる
fclose($file);


//`$str`に全てのデータ（タグに入った状態）がまとまるので、HTML内の任意の場所に表示する。

// <!-- //（key/val(配列)）JSON形式に変換する object
//配列にデータを分ける push -->
// 連想配列の形式にする

// var_dump($str);
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>
<style>
  body {
    background-image: url("img/IMG_8217.jpeg");
    background-size: cover;
    font-family:
  }

  html{
   
  }
  label img{
    width: 100px;
    height: 180px;
    margin: 3px;
    padding: 8px;
  }

  img{
    width: 310px;
    height: 75px;
    margin: 3px;
    padding: 8px;
  }
  .selection_group input[type="radio"]{
    display: none;
  }
  .selection_group input[type="radio"]:checked + label img{
    background: red;
  }
  .canvas{
    width: 100px;
    height: 100px;
  }
  .result{
    display: flex;
  }

  #modalArea {
  display: none;
  position: fixed;
  z-index: 10; /*サイトによってここの数値は調整 */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  }

  .modalBg {
  width: 100%;
  height: 100%;
  background-color: rgba(30,30,30,0.9);
  }

  .modalWrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  transform:translate(-50%,-50%);
  width: 70%;
  max-width: 500px;
  padding: 10px 30px;
  background-color: #fff;
}

  #closeModal {
  position: absolute;
  top: 0.5rem;
  right: 1rem;
  cursor: pointer;
  }

  #openModal {
  position: absolute;
  top: 36%;
  left: 30%;
  transform:translate(-50%,-50%);
  background: white;
  border: 1px solid black;
  }

</style>
<body>
<form action="todo_txt_create.php" method="POST">
    <fieldset>
      <legend>アンケートリスト（入力画面）</legend>
      <!-- <a href="todo_txt_read.php">一覧画面</a> -->
      <div class="selection_group">
      質問:どんな書体が好きですか？ <br>
        <input id = "kai" type="radio" name="font[]" value="楷書"> <label for ="kai"><img src = "img/kai-cutout.png"></label>
        <input id = "gyo" type="radio" name="font[]" value="行書">
        <label for ="gyo"><img src = "img/gyo-cutout.png"></label>
        <input id = "sou" type="radio" name="font[]" value="草書">
        <label for ="sou"><img src = "img/sou-cutout.png"></label>
        <input id = "rei" type="radio" name="font[]" value="隷書">
        <label for ="rei"><img src = "img/rei-cutout.png"></label>
        <input id = "ten" type="radio" name="font[]" value="篆書">
        <label for ="ten"><img src = "img/ten-cutout.png"></label>
      </div>
      <div>
        日時: <input type="date" name="deadline">
      </div>
      <div id = "openModal" >送信</div>
      <section id = "modalArea" >
      <div id="modalBg" class="modalBg"></div>
        <div class="modalWrapper">
          <div class = "modalContents">
            <img src = "img/set-cutout.png">
          </div>
          <button type ="submit" id ="closeModal">×</div>
        </div>
      </section>
    </fieldset>
  </form>

  <fieldset>
    <legend>アンケートリスト（一覧画面）</legend>
    <!-- <a href="todo_txt_input.php">入力画面</a> -->
    <div class ="result">
      <div>
      <table>
      <thead>
        <tr>
          <th>日時</th>
          <th>font</th>
        </tr>
      </thead>
      <tbody>
      <?= $str ?>
      </tbody>
    </table>
    </div>
    <div>
    <canvas id = "chart">
      Canvas not supported...
    </canvas>
    </div>
    </div>
  </fieldset>
  
<script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
//モーダル
$(function () {
  $('#openModal').on("click",function(){
    console.log("こんにちは");
      $('#modalArea').fadeIn();
  });
  $('#closeModal').click(function(){
    $('#modalArea').fadeOut();
  });
});
  //  'use strict';
  //JSではPHPの配列を扱えないため、サーバー上でJSON形式に変換する。

 
  //json_encodeでJS形式に変換する
  const hoge = <?=json_encode($array)?>;
  console.log(hoge);
  //今は配列になってない
  // const json_data = JSON.parse(array);
  // console.log(json_data);//JSになる
  
let array = [];
for(let i=0; i<hoge.length; i++){
  array.push({
    data:hoge[i][0],
    name:hoge[i][1],
  });
};
console.log(array);

//書式を定義する
let kai = 0;
let gyo = 0;
let sou = 0;
let rei = 0;
let ten = 0;
let none = 0;

//for文で１足されたら増やしていくようにする。
for (let i=0; i < array.length; i++){
  if(array[i].name === " 楷書"){
    kai++;
  }else if(array[i].name === " 行書"){
    gyo++;
  }else if(array[i].name === " 草書"){
    sou++;
  }else if(array[i].name === " 隷書"){
    rei++;
  }else if(array[i].name === " 篆書"){
    ten++;
  }
  // else if(array[i].name === " "){
  //   continue;
  // }
}



// 円グラフチャートJS
  var type = 'pie';
  var data = {
      labels:['楷書','行書','草書','隷書','篆書'],
      datasets:[{
         data: [kai, gyo, sou, rei, ten],
         backgroundColor: ['#000000', '#454545', '#7d7d7d', '#b8b8b8', '#e6e6e6']
      }]
    };
  var options = {};

  var ctx = document.getElementById('chart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: type,
    data: data,
    options: options
  });

</script>

</body>
</html>