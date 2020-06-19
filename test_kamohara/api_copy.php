<?php
// データベースに接続するために必要なデータソースを変数に格納
  // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';

  // データベースのユーザー名
$user = 'localhost';
 

//パスワードの設定
  // データベースのパスワード
$password = '';
 
// tryにPDOの処理を記述
try {
 
  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);
 



// userから全選択したものをsql_2に格納
$sql_2 = "SELECT * FROM user"; 
//SQLステートメントを実行し、結果を変数に格納
$stmt_2 = $dbh->query($sql_2);
$result_2 = $stmt_2->fetch(PDO::FETCH_ASSOC);






$sql = 'select count(*) from user';
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);




// Databaseから参照に変更

if(($_GET['name']=="hijiri"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="kuroyanagi"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="matsubara"&&$_GET['pass']=="55itolab!!")||($_GET['name']=="kamohara"&&$_GET['pass']=="55itolab!!")){
// foreach文で配列の中身を一行ずつ出力

echo '[';


foreach ($stmt_2 as $row){

echo '{';
echo '"id":'.'"'.$row['id'].'",';
echo '"name":"'.$row['name'].'",';
echo '"mail":"'.$row['mail'].'",';
echo '"pass":"'.$row['pass'].'"';


 

if($row['id'] == $result["count(*)"]){
echo '}';
}
else{
echo '},';
}
}


echo ']';








}








// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {
 
  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();
 
  // 強制終了
  exit;
 
}
