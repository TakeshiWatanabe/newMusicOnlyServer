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
	$jacketUrl     = $_GET['jacketUrl'];
	$previewUrl   = $_GET['previewUrl'];

	$sql = "INSERT INTO musics (userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl,created) VALUES ('$userId','$userName','$musicId','$musicTittle','$artistName','$jacketUrl','$previewUrl',NOW())";
	$result_flag = mysql_query($sql);

	//var_dump($sql);

	$id = mysql_insert_id();
	// $name = "name";
	// $password = "vnovsm";

	//var_dump($id);

	if (!$result_flag) {
		//var_dump(1);
	   
	}

	$result = mysql_query('SELECT userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl FROM musics');

	if ($result) {

		//jsonに変更して表示
		$arr = array('userId' => $userId, 'userName' => $userName, 'musicId' => $musicId, 'musicTittle' => $musicTittle, 'artistName' => $artistName, 'jacketUrl' => $jacketUrl, 'previewUrl' => $previewUrl);
		//echo json_encode($result);
		echo json_encode($arr);

	}else{
	
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>