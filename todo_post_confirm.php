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
  <title>書道アンケート（POST）</title>
</head>

<body>
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