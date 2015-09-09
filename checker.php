<?php

include 'init.php';

if(!isset($argv[1])) {
    die('You need to specify sleeping time as the first argument!');
}

sleep($argv[1]);

writeLog('info', 'Checking');

$curl = new Curl\Curl();

$curl->setOpt(CURLOPT_TIMEOUT, 5000);
$curl->setHeader('Cookie', $config['cookie']);
$curl->setHeader('Upgrade-Insecure-Requests', '1');

$curl->get('http://sms.tsu.ge/sms/Students/StudIndCxrili.aspx');


if ($curl->error) {
    file_put_contents('errors.log', time().': '.$curl->error_code.PHP_EOL, FILE_APPEND);
    writeLog('info', 'Error');
    writeLog('error', $curl->error_message);
    die($curl->error_message);
}

file_put_contents(__DIR__.'/lastResponse.txt', $curl->response);

if(strpos($curl->response,$config['loggedInText']) == false) {
    writeLog('error', 'Cookie issue');
    die('Cookie -ით შესვლა ვერ მოხერხდა'.PHP_EOL);
}

if(strpos($curl->response,$config['succussText']) !== false) {
    writeLog('info', 'Opened');
	writeLastResult('on');
    die('გაიხსნა!'.PHP_EOL);
}

writeLog('info', 'Closed');
writeLastResult('off');

echo 'ჯერ არ არის გახსნილი!'.PHP_EOL;

?>