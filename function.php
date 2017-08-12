<?php 

function e($var){
	echo $var;
	echo '<br>';
}

function h($var){
	return htmlspecialchars($var);
}

function get_login_user($dbh){
	$sql = 'SELECT * FROM `members` WHERE `member_id`=?';
	$data = array($_SESSION['id']);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$login_user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $login_user;
}

function v($var){
	echo'<pre>';
	var_dump($var);
	echo'</pre>';

}


 ?>