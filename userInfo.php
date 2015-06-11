<?php
// userの画像、名前をサーバーに取ってくる

	require_once('dbconect.php');

	mysql_set_charset('utf8');

	// 変数を用意
	$userId       = $_GET['userId'];
	$trackId      = $_GET['trackId'];

	$result = mysql_query('SELECT userId, trackId, musicTittle, artistName, jacketUrl, previewUrl, goodCount, users.name AS  \'userName\', CONCAT(  \'./userImg/prof\', userId,  \'.png\' ) AS  \'userProfImage\'　FROM musics　INNER JOIN users ON musics.userId = users.id');

	// $result = mysql_query('SELECT * FROM musics');

	if ($result) {
		$i = 0;
		while ($page = mysql_fetch_assoc($result)) {

		// var_dump($page);
		
		$arr[$i] = array('userId' => $page['userId'], 'trackId' => $page['trackId']);
		$i++;
		}
		echo json_encode($arr);

	}else{
	
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>