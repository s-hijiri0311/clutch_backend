<?php
// データベースに接続するために必要なデータソースを変数に格納
  // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
 
  // データベースのユーザー名
$user = 'hijiri';
 
  // データベースのパスワード
$password = '';
 
// tryにPDOの処理を記述
try {
 
  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);
 

// SELECT文を変数に格納
$sql = "SELECT * FROM user";
 
// SQLステートメントを実行し、結果を変数に格納
$stmt = $dbh->query($sql);

if(($_GET['name']=="hijiri"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="kuroyanagi"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="matsubara"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="kamohara"&&$_GET['pass']=="55itolab!!")){
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {

echo $row['name'].'：'.$row['mail'];
echo '<br>';
}
}


// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {
 
  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();
 
  // 強制終了
  exit;
 
}
