<?php
// データベースに接続するために必要なデータソースを変数に格納
  // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';

  // データベースのユーザー名
$user = 'localhost';

  // データベースのパスワード
$password = '';

// tryにPDOの処理を記述
try {

  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);


// SELECT文を変数に格納
$sql = 'SELECT id,name FROM user WHERE name='.'"'.$_GET['name'].'"';

// SQLステートメントを実行し、結果を変数に格納
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Databaseから参照に変更


if(($_GET['name']=="hijiri"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="kuroyanagi"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="matsubara"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="kamohara"&&$_GET['pass']=="55itolab!!")){
// foreach文で配列の中身を一行ずつ出力

//ユーザid検索結果格納


echo '[';

echo '{';
echo '"user_id":"'.$result['id'].'",';
echo '"user_name":"'.$result['name'].'"';
echo '}]';

}




// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {

  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();

  // 強制終了
  exit;

}
