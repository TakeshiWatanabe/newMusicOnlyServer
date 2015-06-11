<?php


require_once('dbconect.php');

mysql_set_charset('utf8');

echo "receive";

//GETでobjective-cからデータを取得して変数に代入
//$id = $_GET['id'];
//var_dump($userId);

$userId = $_GET['userId'];
var_dump($userId);

$trackId = $_GET['trackId'];
var_dump($trackId);

$musicTittle = $_GET['musicTittle'];
var_dump($musicTittle);

$artistName = $_GET['artistName'];
var_dump($artistName);

$jacketUrl = $_GET['jacketUrl'];
var_dump($jacketUrl);

$previewUrl = $_GET['previewUrl'];
var_dump($previewUrl);



// try{
//     //データベースへ接続
//     //PDO(PHP Data Object)
//     $dbh = new PDO('mysql:host=localhost; dbname=myApp', 'root', 'camp2015');
// }catch(PDOException $e){
//     //例外処理
//     var_dump($e->getMessage());
//     //エラーが発生したら終了
//     exit;
// }



//データの挿入
$stmt = $dbh->prepare("insert into musics (id,userId,trackId,musicTittle,artistName,jacketUrl,previewUrl,created) values (:id,:userId,:trackId,:musicTittle,:artistName,:jacketUrl,:previewUrl,NOW())");
// insert into event (eventName, place, date,vision,whatDo,result,humor,created) values ("j","j",'2012-06-12 11:00:00',"j","j","j","j",NOW()); 

$stmt->bindParam(":userId", $userId,PDO::PARAM_STR,1000);
$stmt->bindParam(":trackId", $trackId,PDO::PARAM_STR,1000);
$stmt->bindParam(":musicTittle", $musicTittle);
$stmt->bindParam(":artistName", $artistName,PDO::PARAM_STR,1000);
$stmt->bindParam(":jacketUrl", $jacketUrl,PDO::PARAM_STR,1000);
$stmt->bindParam(":previewUrl", $previewUrl,PDO::PARAM_STR,1000);

$stmt->execute();
//切断
$dbh = null;


 ?>