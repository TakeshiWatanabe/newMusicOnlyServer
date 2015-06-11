<?php

	require_once('dbconect.php');

	// MySqlへの接続
	// $link = mysql_connect('localhost', 'root', 'camp2015');

	// // データベースへの接続
	// $db_selected = mysql_select_db('iosMusic', $link);

	mysql_set_charset('utf8');

	// 変数を用意

	$name       = $_GET['name'];
	$password   = $_GET['password'];

	if ($name == '/' || $password == '/') {
		//jsonに変更して表示
		$arr = array('name' => null, 'password' => null);
		//echo json_encode($result);
		//var_dump(1);
		echo json_encode($arr);

	} else {

		//var_dump(2);
		$result = mysql_query('SELECT id,name,password FROM users where name =\''.$name.'\' and password =\''.$password.'\'');

		if ($result) {
			$row = mysql_fetch_assoc($result);
			$id = $row["id"];
			//var_dump(3);
			//jsonに変更して表示
			$arr = array('id' => $id, 'name' => $name, 'password' => $password);
			//echo json_encode($result);
			echo json_encode($arr);

		}else{

			//var_dump(4);
			//jsonに変更して表示
			$arr = array('name' => null, 'password' => null);
			//echo json_encode($result);
			echo json_encode($arr);
		}

		// データベースから切断
		$close_flag = mysql_close($link);
	}

	$id = mysql_insert_id();
	// $name = "name";
	// $password = "vnovsm";

	//var_dump($id);

	if (!$result_flag) {
	   
	}

	
?>