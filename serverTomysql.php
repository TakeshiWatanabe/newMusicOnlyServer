<?php
  // $dsn = 'mysql:dbname=iosMusic;host=localhost';
  // $user = "root";
  // $pass = "camp2015";
  // $dbh = new PDO($dsn,$user,$pass);

  // // MySQLへ接続する
  // $link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

  // // データベースを選択する
  // $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

  // // クエリを送信する
  // $sql = "SELECT * FROM iosMusic";
  // $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

  // //結果セットの行数を取得する
  // $rows = mysql_num_rows($result);

  // //結果保持用メモリを開放する
  // mysql_free_result($result);

  // // MySQLへの接続を閉じる
  // mysql_close($link) or die("MySQL切断に失敗しました。");
	//var_dump('expression');

	// MySqlへの接続
	$link = mysql_connect('localhost', 'root', 'camp2015');
	if (!$link) {
	    //die('接続失敗です。'.mysql_error());
	}
	//print('<p>接続に成功しました。</p>');

	// データベースへの接続
	$db_selected = mysql_select_db('iosMusic', $link);
	if (!$db_selected){
	    //die('データベース選択失敗です。'.mysql_error());
	}
	//var_dump($db_selected);

	// データの取得(SELECT)
	//print('<p>iosMusicデータベースを選択しました。</p>');

	mysql_set_charset('utf8');

	// 変数を用意
	//$id       = $_GET['id'];
	$name       = $_GET['name'];
	$country    = $_GET['country'];
	$genre      = $_GET['genre'];
	//$userImg    = $_GET['userImg'];
	//$countryImg = $_GET['countryImg'] 
	//$password = $_GET['password'];
	//$signup   = $_GET['signup'];

	// $result = mysql_query('SELECT id,name,country,genre,password,sginup FROM users');
	// if (!$result) {
	//     //die('クエリーが失敗しました。'.mysql_error());
	// }

	// while ($row = mysql_fetch_assoc($result)) {
	//     print('<p>');
	//     print('id='      .$row['id']);
	//     print('name='    .$row['name']);
	//     print('country=' .$row['country']);
	//     print('genre='   .$row['genre']);
	//     print('password='.$row['password']);
	//     print('sginup='  .$row['sginup']);
	//     print('</p>');
	// }

	//登録を記録
	// if (!empty($_GET)) {
	// 	if ($_GET['name'] != '') {
	// 		$sql = sprintf('INSERT INTO users SET id=%d, name="%s", country="%s", sginup=NOW()',
	// 			mysql_real_escape_string(iosMusic, $_GET['id']),
	// 			mysql_real_escape_string(iosMusic, $_GET['name']),
	// 			mysql_real_escape_string(iosMusic, $_GET['country']),
	// 			);
	// 		mysql_query(iosMusic, $sql) or die(mysqli_error($db));

	// 		header('Location: serverTomysql.php');
	// 	}
	// }

	// データの追加(INSERT)
	//print('<p>iosMusicデータを追加します。</p>');

	$sql = "INSERT INTO users (name,country,genre) VALUES ('$name', '$country', '$genre')";
	$result_flag = mysql_query($sql);

	//var_dump($sql);

	$id = mysql_insert_id($result_flag);


	if (!$result_flag) {
	    //die('INSERTクエリーが失敗しました。'.mysql_error());
	}

	//print('<p>iosMusic追加後のデータを取得します。</p>');

	$sql_select = "SELECT name,country,genre FROM users WHERE id= $id";
	$result = mysql_query($sql_select);

	//var_dump($sql_select);

	if ($result) {
	    //die('SELECTクエリーが失敗しました。'.mysql_error());
	     //var_dump($result);
	     //var_dump('g');
	    // echo $result;
	}else{
		//var_dump('gy');
		//jsonに変更して表示
		$arr = array('name' => $name, 'country' => $country, 'genre' => $genre);
		//echo json_encode($result);
		echo json_encode($arr);
	}

	// while ($row = mysql_fetch_assoc($result)) {
	//     print('<p>');
	//     print('id='      .$row['id']);
	//     print('name='    .$row['name']);
	//     print('country=' .$row['country']);
	//     print('genre='   .$row['genre']);
	//     print('password='.$row['password']);
	//     print('sginup='  .$row['sginup']);
	//     print('</p>');
	// }

	// print('<p>iosMusicデータベースを選択しました。</p>');

	// データベースから切断
	$close_flag = mysql_close($link);

	// if ($close_flag){
	//     print('<p>切断に成功しました。</p>');
	// }

	//var_dump('wd');
?>