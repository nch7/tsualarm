<?php

	function writeLog($type, $message) {
		file_put_contents(__DIR__."/logs/{$type}.log", date('Y-m-d H:i:s').": ".$message.PHP_EOL, FILE_APPEND);
	}

	function getLastResult() {
		return file_get_contents(__DIR__."/page_status") == 'on' ? true  : false;
	}

	function writeLastResult($result) {
		file_put_contents(__DIR__."/page_status", $result);
	}
?>