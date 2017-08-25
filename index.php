<?php 
require('dbconnct.php');
require('function.php');

date_default_timezone_set('Asia/Tokyo');

$title = '';

$errors = array();



if (!empty($_POST)) {
$title = $_POST['title'];
v($title);
	if ($title == '') {
		$errors['title'] = 'blank';
	}

	if (empty($errors)) {
		// データーベース登録
		$sql = 'INSERT INTO `diary` SET `title` =?, `created` =NOW()';
		$data = array($title);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		header('Location: index.php');
		exit();
	}

}

$sql = 'DELETE FROM `diary` WHERE id=?';
$data =[$_REQUEST['id']];
$stmt = $dbh->prepare($sql);
$stmt->execute($data);



$sql = 'SELECT * FROM `diary`';
$stmt = $dbh->prepare($sql);
$stmt->execute();
while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$tweets[] = $record;
}


$count = count($tweets);




 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="assets/css/index.css">
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<!-- <link rel="stylesheet" type="text/css" href="index.js"> -->
<title>Nexeed Training</title>
<script type="text/javascript"> 
<!-- 

function check(){

	if(window.confirm('削除してよろしいですか？')){ // 確認ダイアログを表示
		document.getElementById("frmC");
		
		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}

// -->
</script>

</head>
<body>

<div class=""><h1 class="header" style="margin: 0px auto 10px auto;height: 80px ; line-height: 80px;">
NxSeed Diary</h1>
</div>
<div class="container-fild">

		<div class="row">
			<div class="col-xs-3">
			<!-- <div class="col-xs-3 col-sm-3 col-xs-6"> -->
				<div class="main-left">
					<?php
						$time = intval(date('H'));
						if (6 <= $time && $time <= 11) { // 6～11の時間帯のとき ?>
						<p class="konnitiwa">おはようございます、ゲストさん</p>
					<?php } elseif (11 <= $time && $time <= 18) { // 11:01〜17:59の時間帯のとき ?>
						<p class="konnitiwa">こんにちわ、ゲストさん。</p>
					<?php } else { // それ以外の時間帯のとき ?>
						<p class="konnitiwa">こんばんわ、ゲストさん。</p>
					<?php } ?>
					<hr>
					<div class="date">
						<a href=""><?php echo date("Y年m月");?>の日記</a>
					</div>
					<hr>
					<div class="date">
						<a href=""><?php echo date("Y年m月",strtotime('-1 month'));?>の日記</a>
					</div>
					<hr>
					<div class="date">
						<a href=""><?php echo date("Y年m月",strtotime('-2 month'));?>の日記</a>
					</div>
					<hr>
					<div class="widget-area no-padding blank">
						<div class="status-upload">
							<form action="index.php" method="POST">
								<textarea placeholder="What are you doing right now?" name="title" ></textarea>
								<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
								<?php if (isset($errors['title']) && $errors['title'] == 'blank') { ?>
								<p class="error">何か入力してください。</p>
								<?php } ?>
							</form>
						</div><!-- Status Upload  -->
					</div><!-- Widget Area -->
				</div>
			</div>
			<form action="#" method="POST" id="frmC">
			<div class="col-xs-9">
			<?php for ($i=0; $i < $count; $i++) { ?>

			<!-- <div class="col-xs-9 col-sm-9 col-xs-6"> -->
				<div class="main-right">
					<a href=""><h4><?php echo $tweets[$i]['title']; ?></h4></a>
					<p><?php echo $tweets[$i]['created'];?></p>
					<a href="index.php?id=<?php echo $tweets[$i]['id']; ?>
					" class="btn btn-danger" onclick="check();return false;">削除</a>
				</div>
			<?php  } ?>
			</div>
			</form>
		</div>
	<div class="col-sm-12 col-xs-12">
		<div class="footer">Copyright NexSeed inc All Rights Reserved.</div>
	</div>
</div>

</body>
</html>
