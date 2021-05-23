<?php
$str = '';
$file = fopen('data/data.csv', 'r'); // ファイルを開く 引数はa
flock($file, LOCK_EX); // ファイルをロック
//var_dump($file);
//exit();

if ($file) {
  while ($line = fgets($file)) {
    $str .= "<tr><td>{$line}</td></tr>";
  }
}
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイルを閉じる
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
    <a href="todo_txt_read.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <?= $str ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>