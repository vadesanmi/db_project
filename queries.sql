-- Adding a new band comment

/**
$band_name = $_POST['band_name'];
$band_id = mysql_result(mysql_query("SELECT id FROM band WHERE name = $band_name"),0); // convert the name to id value
$comment = $_POST['comment'];

switch(&bandname){
	case ""
}

**/

INSERT INTO band_comment (content, band_id, user_id)
VALUES ('$comment', '$band_id', '$comment');