<?php
// mainViewで使用

	require_once('dbconect.php');

	mysql_set_charset('utf8');

	// 変数を用意
	$userId       = $_GET['userId'];
	$trackId      = $_GET['trackId'];
	$musicTittle  = $_GET['musicTittle'];	
	$artistName   = $_GET['artistName'];
	$jacketUrl    = $_GET['jacketUrl'];
	$previewUrl   = $_GET['previewUrl'];
	$goodCount    = $_GET['goodCount'];

	// ドメインを変えた時にURLの変更が必要
	$result = mysql_query('SELECT userId, trackId, musicTittle, artistName, jacketUrl, previewUrl, IFNULL(`count_favorites`.`count_number`,0) `count_number` , users.name AS `userName` , CONCAT(\'http://takeshi-w.sakura.ne.jp/userImg/prof\', userId, \'.png\') AS `userProfImage` FROM musics INNER JOIN users ON musics.userId = users.id LEFT OUTER JOIN(SELECT `musicId`, COUNT( * ) AS `count_number` FROM `goodCountes` GROUP BY `musicId`) `count_favorites` ON `musics`.`trackId` = `count_favorites`.`musicId`');

	// $result = mysql_query('SELECT * FROM musics');

	if ($result) {
		$i = 0;
		while ($page = mysql_fetch_assoc($result)) {

		// var_dump($page);
		//jsonに変更して表示
		// $arr = array('userId' => $userId, 'trackId' => $trackId, 'musicTittle' => $musicTittle, 'artistName' => $artistName, 'jacketUrl' => $jacketUrl, 'previewUrl' => $previewUrl);
		//echo json_encode($result);
		$arr[$i] = array('userId' => $page['userId'], 'trackId' => $page['trackId'], 'musicTittle' => $page['musicTittle'], 'artistName' => $page['artistName'], 'jacketUrl' => $page['jacketUrl'], 'previewUrl' => $page['previewUrl'], 'goodCount' => $page['count_number'], 'userProfImage' => $page['userProfImage'], 'userName' => $page['userName']);
		$i++;
		}
		echo json_encode($arr);

	}else{
	
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>