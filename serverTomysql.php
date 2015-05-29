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
	$name       = $_GET['name'];
	$country    = $_GET['country'];
	$genre      = $_GET['genre'];
	$password   = $_GET['password'];

	$sql = "INSERT INTO users (name,country,genre,password,created) VALUES ('$name', '$country', '$genre', '$password',NOW())";
	$result_flag = mysql_query($sql);

	//var_dump($sql);

	$id = mysql_insert_id();
	// $name = "name";
	// $password = "vnovsm";

	//var_dump($id);

	if (!$result_flag) {
	   
	}

	$result = mysql_query('SELECT id,name,country,genre,password FROM users');

	if ($result) {

		//jsonに変更して表示
		$arr = array('id' => $id, 'name' => $name, 'country' => $country, 'genre' => $genre, 'password' => $password);
		//echo json_encode($result);
		echo json_encode($arr);

	}else{
	
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>