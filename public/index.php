<?php
	include '../init.php';
	$status = getLastResult();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TSUAlarm</title>
	</head>
	<style type="text/css">
		audio {
			display:none;	
		}
	</style>
	<body>
		<?php 
			if($status == true) {
				echo 'გაიხსნა!';
		?>
			<audio autoplay loop>
			  	<source src="assets/sounds/alarm.mp3" type="audio/mp3">
				Your browser does not support the audio element.
			</audio>
			<a href="http://sms.tsu.ge/sms/Students/StudentMain.aspx">გადადი sms.tsu.ge -ზე!</a>
		<?php
			} else {
				echo 'ჯერ არ გახსნილა';
		?>
				<script type="text/javascript">
					setTimeout(function() {
						location.reload();
					},1000);
				</script>
		<?php
			}
		?>
	</body>
</html>