<?php
//var_dump($_GET);
//exit();

$todo = $_POST['todo'];
$deadline = $_POST["deadline"]; //データをもらう

$write_data = "{$deadline} {$todo}\n"; // スペース区切りで最後に改行
$file = fopen('data/data.csv', 'a'); // ファイルを開く 引数はa
flock($file, LOCK_EX); // ファイルをロック
fwrite($file, $write_data); // データに書き込み,
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイルを閉じる

//exit();
header("Location:todo_txt_input.php"); // 入力画面に移動