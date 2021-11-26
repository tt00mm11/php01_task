<?php

// var_dump($_POST);
// exit();
if (isset($_POST['font']) && is_array($_POST['font'])) {
  $font = implode("、", $_POST["font"]);
}//文字列に変換

$deadline = $_POST['deadline'];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アンケート</title>
</head>
<style>
  label img{
    width: 100px;
    height: 100px;
    margin: 3px;
    padding: 8px;
  }
  .selection_group input[type="radio"]{
    display: none;
  }
  .selection_group input[type="radio"]:checked + label img{
    background: red;
    line-size:
  }
</style>
<body>
  <!-- formにはaction, method, nameを設定！ -->
  <form action method="POST">
    <fieldset>
      <legend>アンケート（POST）</legend>
      <div class="selection_group">
      質問:どんな書体が好きですか？ <br>
        <input id = "kai" type="radio" name="font[]" value="楷書"> <label for ="kai"><img src = "img/IMG_0082.jpeg"></label>
        <input id = "gyo" type="radio" name="font[]" value="行書">
        <label for ="gyo"><img src = "img/IMG_0082.jpeg"></label>
        <input id = "so" type="radio" name="font[]" value="草書">
        <label for ="so"><img src = "img/IMG_0082.jpeg"></label>
        <input id = "rei" type="radio" name="font[]" value="隷書">
        <label for ="rei"><img src = "img/IMG_0082.jpeg"></label>
        <input id = "rin" type="radio" name="font[]" value="臨書">
        <label for ="rin"><img src = "img/IMG_0082.jpeg"></label>
      </div>
      <div>
        日時: <input type="date" name="deadline">
      </div>
      <div>
        <button>送信</button>
      </div>
    </fieldset>
  </form>
  <fieldset>
    <legend>アンケート結果画面（POST）</legend>
    <table>
      <thead>
        <tr>
          <th>font</th>
          <th>日時</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?=$font ?></td>
          <td><?=$deadline ?></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</body>

</html>