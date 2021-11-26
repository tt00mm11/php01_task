

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アンケートリスト（入力画面）</title>
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
  }
</style>
<body>
  <form action="todo_txt_create.php" method="POST">
    <fieldset>
      <legend>アンケートリスト（入力画面）</legend>
      <a href="todo_txt_read.php">一覧画面</a>
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

</body>

</html>