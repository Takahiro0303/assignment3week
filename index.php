<?php 
require('dbconnct.php');

date_default_timezone_set('Asia/Tokyo');

$sql = 'SELECT * FROM `diary`';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<title>Nexeed Training</title>
</head>
<body>
<div class="container-Extralarge">
	<div class="row">
		<div class="col-sm-12 col-xs-12"><h1 class="header" style="margin: 0px 0px 10px 0px;height: 80px ; line-height: 80px;">NxSeed Diary</h></div>
			<div class="col-sm-3 col-xs-6">
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
						<a href=""><?php echo date("Y年m月",strtotime('-1 month')); ?>の日記</a>
					</div>
					<hr>
					<div class="date">
						<a href=""><?php echo date("Y年m月",strtotime('-2 month')); ?>の日記</a>
					</div>
					<hr>
				</div>
			</div>
			<div class="col-sm-9 col-xs-6">
				<div class="main-right">
					<a href=""><h4>こんにちわ</h4></a>
					<p>2017年8月10日</p>
				</div>
				<div class="main-right">
					<a href=""><h4>こんにちわ</h4></a>
					<p>2017年8月10日</p>
				</div>
				<div class="main-right">
					<a href=""><h4>こんにちわ</h4></a>
					<p>2017年8月10日</p>
				</div>
				<div class="main-right">
					<a href=""><h4>こんにちわ</h4></a>
					<p>2017年8月10日</p>
				</div>
				<div class="main-right">
					<a href=""><h4>こんにちわ</h4></a>
					<p>2017年8月10日</p>
				</div>
				<div class="main-right">
					<a href=""><h4>こんにちわ</h4></a>
					<p>2017年8月10日</p>
				</div>
			</div>
		<div class="col-sm-12 col-xs-12">
			<div class="footer">Copyright NexSeed inc All Rights Reserved.</div>
		</div>
	</div>
</div>

</body>
</html>
