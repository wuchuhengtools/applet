<?php 
	include "./attack.php";
	$tokenStr  = $_POST["token"];
	$phone     = $_POST["phone"];
	$arrs  	   = array(
		"T2zF6sDkC0"=>array(10,1),
		"T2zF6sDkC1"=>array(100,5),
		"T2zF6sDkC2"=>array(10000,10),
		"T2zF6sDkC3"=>array(20000,20),
		"T2zF6sDkC4"=>array(50000,"1小时"),
		"T2zF6sDkC5"=>array("不限",24),
	);
	$info 	   = $arrs[$tokenStr];

	tack($phone);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title class="status">正在留言<?php echo $phone ?>	</title>
</head>
<style>
	*{
		margin:0;
		padding:0;
		border:0;
	}
	body:{
		font-size: 2em;
		color:red;
	}
	p{
		color:red;
	}
	.container{
		width: 90%;
		padding-left: 20px;
		text-align: left;
	}
	.top{
		width:100%;
		height:35px;
		line-height:35px;
		text-align: center;		
		float: left;
	}
</style>
<body>
	<div class="top"><h2>中国服装汇V2.0</h2></div>
	<div class="container">
		<p class="status">验证口令成功！</p>
		<p class="status">开始留言   <?php echo $phone;     ?>！</p>
		<p class="status">留言条数： <span id="count"><?php echo $info[0];   ?></span> </p>
		<p class="status">执行时长： <?php echo $info[1];   ?>分钟</p>
		<p>注意：任务未执行完成，请不要关闭本页面！</p>
		<div class="msg">
			
		</div>
		
		<!-- <p class="status">执行任务成功！</p> -->
	</div>
<script src="http://www.zgfzh.com/Public/static/js/jquery-1.8.2.min.js"></script>
<script>
	var n = 1;
	var count = $("#count").html();
	function attack()
	{
		var html = '<p class="status">正在留言'+n+'bo......</p>';
		$(".msg").append(html);
		n++;
		if(n>count){
			clearInterval(tid);
			$(".msg").append("<p>执行任务成功！</p>");
		}
	}
	attack();
	var tid = setInterval(attack,250);
</script>
</body>
</html>


