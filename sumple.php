<?php
    
    if (is_uploaded_file(!$_FILES["file"]["tmp_name"])) {
    	//var_dump($_FILES);
        if (move_uploaded_file(!$_FILES["file"]["name"], "./" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . "をアップロードしました。";
        } else {
            echo "ファイルをアップロードできません。";
        }
    } else {
        echo "ファイルが選択されていません..。";
        var_dump($_FILES);
    }
    
?>