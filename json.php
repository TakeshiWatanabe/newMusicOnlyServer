<?php
require_once('config.php');
require_once('functions.php');

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

$dbh = connectDb();

$sth = $dbh->prepare("SELECT * FROM musics");
$sth->execute();

$userData = array();

while($row = $sth->fetch(PDO::FETCH_ASSOC)){
    $userData[]=array(
    'userId'=>$row['userId'],
    'userName'=>$row['userName'],
    'musicId'=>$row['musicId']
    // 'musicTittle'=>$row['musicTittle'],
    // 'artistName'=>$row['artistName'],
    // 'jacketUrl'=>$row['jacketUrl'],
    // 'previewUrl'=>$row['previewUrl']
    );	
}

//jsonとして出力
header('Content-type: application/json');
echo json_encode($userData);