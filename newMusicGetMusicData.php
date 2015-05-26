<?php
	// MySqlへの接続
	$link = mysql_connect('localhost', 'root', 'camp2015');
	if (!$link) {
	
	}

	// データベースへの接続
	$db_selected = mysql_select_db('iosMusic', $link);
	if (!$db_selected){
	   
	}

	mysql_set_charset('utf8');

	// 変数を用意
	$userId       = $_GET['userId'];
	$userName     = $_GET['userName'];
	$musicId      = $_GET['musicId'];
	$musicTittle  = $_GET['musicTittle'];
	$artistName   = $_GET['artistName'];
	$jacketUrl    = $_GET['jacketUrl'];
	$previewUrl   = $_GET['previewUrl'];

	$result = mysql_query('SELECT userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl FROM musics');
	if (!$result) {
	    die('クエリーが失敗しました。'.mysql_error());
	}

	//var_dump($result);
	while ($row = mysql_fetch_assoc($result)) {
	    print('<p>');
	    print('userId='       .$row['userId']);
	    print(',userName='    .$row['userName']);
	    print(',musicId='     .$row['musicId']);
	    print(',musicTittle=' .$row['musicTittle']);
	    print(',artistName='  .$row['artistName']);
	    print(',jacketUrl='   .$row['jacketUrl']);
	    print(',previewUrl='  .$row['previewUrl']);
	    print('</p>');
	}
	
	//var_dump($row);
	// $sql = "INSERT INTO musics (userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl,created) VALUES ('$userId', '$userName', '$musicId', '$musicTittle', '$artistName', '$jacketUrl', '$previewUrl', NOW())";
	// $result_flag = mysql_query($sql);

	// var_dump($sql);

	//$userId = mysql_insert_id();

	// //var_dump($id);

	// if (!$result_flag) {
	   
	// }

	// $sql_select = "SELECT userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl FROM musics WHERE userId= $userId";
	// $result = mysql_query($sql_select);

	if ($result) {
		//var_dump($userId);
		//jsonに変更して表示
		$arr = array('userId' => $userId, 'userName' => $userName, 'musicId' => $musicId, 'musicTittle' => $musicTittle, 'artistName' => $artistName, 'jacketUrl' => $jacketUrl, 'previewUrl' => $previewUrl);
		echo json_encode($arr);

	}else{
		
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>