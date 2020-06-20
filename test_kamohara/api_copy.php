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
$sql2 = "SELECT * FROM talk"; 
//SQLステートメントを実行し、結果を変数に格納
$stmt_2 = $dbh->query($sql2);
$result_2 = $stmt_2->fetch(PDO::FETCH_ASSOC);






$sql = 'select count(*) from user';
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);



$match = "SELECT pass FROM user WHERE name =".'"'.$_GET['name'].'"';
$stmt_3 = $dbh->query($match);
$result_3 = $stmt_3->fetch(PDO::FETCH_ASSOC);

// Databaseから参照に変更

if($result_3['pass'] == $_GET['pass']){



// foreach文で配列の中身を一行ずつ出力

echo '[';


foreach ($stmt_2 as $row){

echo '{';
echo '"id":'.'"'.$row['id'].'",';
echo '"parent_id":"'.$row['parent_id'].'",';
echo '"message":"'.$row['message'].'",';
echo '"user_id":"'.$row['user_id'].'",';
echo '"user_name":"'.$row['user_name'].'",';
echo '"user_image_url":"'.$row['user_image_url'].'"';

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




