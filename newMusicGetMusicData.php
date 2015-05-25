<?php
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
	    print('userId='      .$row['userId']);
	    print(',userName='    .$row['userName']);
	    print(',musicId='     .$row['musicId']);
	    print(',musicTittle=' .$row['musicTittle']);
	    print(',artistName='  .$row['artistName']);
	    print(',jacketUrl='   .$row['jacketUrl']);
	    print(',previewUrl='  .$row['previewUrl']);
	    print('</p>');
	}

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

	$sql = "INSERT INTO musics (userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl,created) VALUES 
								('$userId', '$userName', '$musicId', $musicTittle, $artistName, $jacketUrl, $previewUrl, NOW())";
	$result_flag = mysql_query($sql);

	//var_dump($sql);

	$userId = mysql_insert_id();

	//var_dump($id);

	if (!$result_flag) {
	    //die('INSERTクエリーが失敗しました。'.mysql_error());
	}

	//print('<p>iosMusic追加後のデータを取得します。</p>');

	$sql_select = "SELECT userId,userName,musicId,musicTittle,artistName,jacketUrl,previewUrl FROM musics WHERE userId= $userId";
	$result = mysql_query($sql_select);

	//var_dump($sql_select);

	if ($result) {
	    //せいこう
	    //var_dump($result);
	    //var_dump('g');
	    // echo $result;

		//jsonに変更して表示
		$arr = array('userId' => $userId, 'userName' => $userName, 'musicId' => $musicId, 'musicTittle' => $musicTittle
						, 'artistName' => $artistName, 'jacketUrl' => $jacketUrl, 'previewUrl' => $previewUrl);
		//echo json_encode($result);
		echo json_encode($arr);

	}else{
		//しっぱい

		//var_dump('gy');
	}

	///var_dump('dd');
	// while ($row = mysql_fetch_assoc($result)) {
	//     print('<p>');
	//     print('userId='      .$row['userId']);
	//     print('userName='    .$row['userName']);
	//     print('musicId='     .$row['musicId']);
	//     print('musicTittle=' .$row['musicTittle']);
	//     print('artistName='  .$row['artistName']);
	//     print('jacketUrl='   .$row['jacketUrl']);
	//     print('previewUrl='  .$row['previewUrl']);
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