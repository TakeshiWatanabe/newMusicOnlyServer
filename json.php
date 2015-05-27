<?php

//データベースへの接続
$db = mysqli_connect('localhost', 'root', 'camp2015', 'iosMusic') or die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');


//データの取得
$sql = 'select * from musics';
$recordset = mysqli_query($db, $sql) or die(mysqli_error($db));
$allEventData = array();
while ($eventData = mysqli_fetch_assoc($recordset)){

$allEventData[] = $eventData; 	
}

	

//jsonとして出力
$allEventData_encode = json_encode($allEventData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

echo $allEventData_encode;
