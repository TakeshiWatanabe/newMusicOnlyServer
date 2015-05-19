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
    $image = $_GET['image'];

    $sql = "INSERT INTO users (image) VALUES ('$image')";
    $result_flag = mysql_query($sql);

    //var_dump($sql);

    $id = mysql_insert_id($result_flag);

    if (!$result_flag) {
        //die('INSERTクエリーが失敗しました。'.mysql_error());
    }

    //print('<p>iosMusic追加後のデータを取得します。</p>');
    $sql_select = "SELECT image FROM users WHERE image= $image";
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
        $arr = array('image' => $image);
        //echo json_encode($result);
        echo json_encode($arr);
    }

    // データベースから切断
    $close_flag = mysql_close($link);

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<p><?php
    
    if (is_uploaded_file($_FILES["iosMusic"]["image"])) {
        if (move_uploaded_file($_FILES["iosMusic"]["image"], "./" . $_FILES["iosMusic"]["image"])) {
            echo $_FILES["iosMusic"]["image"] . "をアップロードしました。";
        } else {
            echo "ファイルをアップロードできません。";
        }
    } else {
        echo "ファイルが選択されていません。";
    }
    
    ?></p>
</body>
</html>