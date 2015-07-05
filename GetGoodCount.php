<?
// いいねをサーバーに送って、取ってくる

require_once('dbconect.php');

	mysql_set_charset('utf8');

	// 変数を用意
	$id          = $_GET['id'];
	$userId      = $_GET['userId'];
	$musicId     = $_GET['musicId'];
	
	//ページ数を計算
        $count ="SELECT count(*) as cnt FROM goodCountes";
        $count_result = mysql_query($count, $link) or die("クエリの送信に失敗しました。<br />SQL:".$count);
        $count_num = mysql_fetch_array($count_result);
        
        if($count_num['cnt']%$col==0){
            $pages= floor($count_num['cnt']/$col)-1;
        }else{                
          $pages = floor($count_num['cnt']/$col);
        }

	//var_dump($row);
	$sql = “INSERT INTO goodCountes (userId,musicId,created)VALUES($userId,$musicId,NOW());”;
	$result = mysql_query($sql);
	//var_dump($sql);

	if ($result) {
		var_dump($result);
		//jsonに変更して表示
		$arr = array('goodCount' => $goodCount);
		echo json_encode($arr);

	}else{
		
	}

	// データベースから切断
	$close_flag = mysql_close($link);
?>