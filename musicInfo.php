<?
require_once('dbconect.php');

	mysql_set_charset('utf8');

	// 変数を用意
	
	$userId       = $_GET['userId'];
	$trackId      = $_GET['trackId'];
	$musicTittle  = $_GET['musicTittle'];
	$artistName   = $_GET['artistName'];
	$jacketUrl    = $_GET['jacketUrl'];
	$previewUrl   = $_GET['previewUrl'];
	
	//var_dump($row);
	$sql = "INSERT INTO musics (userId,trackId,musicTittle,artistName,jacketUrl,previewUrl,created) VALUES ('$userId', '$trackId', '$musicTittle', '$artistName', '$jacketUrl', '$previewUrl', NOW())";
	$result = mysql_query($sql);
	//var_dump($sql);
	

	if ($result) {
		var_dump($result);
		//jsonに変更して表示
		$arr = array('userId' => $userId, 'userName' => $userName, 'musicId' => $musicId, 'musicTittle' => $musicTittle, 'artistName' => $artistName, 'jacketUrl' => $jacketUrl, 'previewUrl' => $previewUrl);
		echo json_encode($arr);

	}else{
		
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>