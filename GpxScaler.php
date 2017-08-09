<?php

date_default_timezone_set('UTC');

$start = 1499468392; // The start time in EPOCH format
$stopSource = 1499571437; // The source stop time in EPOCH format
$stopTarget = 1499596028; // The target stop time in EPOCH format
$fileName = 'your-file.gpx'; // Enter the file name of th GPX file

$factor = ($stopTarget - $start) / ($stopSource - $start);
$pattern = '/<time>(.*)<\/time>/';
$dateFormat = 'Y-m-d\TH:i:s.000\Z';

$doc = '';
$file = fopen($fileName, 'r');
while(!feof($file)) {
	$line = fgets($file);
	$res = preg_match($pattern, $line, $matches);
	if ($res == 1) {
		//print_r($matches);
		$date = strtotime($matches[1]);
		if ($date == FALSE) {
			echo 'Cannot get the date.' .PHP_EOL;
			print_r($matches);
			die();
		}
		$dateNew = ceil($start + ($date - $start) * $factor);
		$dateStr = new DateTime("@$dateNew");
		$lineNew = '<time>' . $dateStr->format($dateFormat) . '</time>' . PHP_EOL; 
		//echo $date . ' => ' . $dateNew  . '(' . $dateStr->format($dateFormat) . ')' . PHP_EOL;
		//echo $lineNew;
		$doc .= $lineNew;
		//die();
	} else {
		$doc .= $line;
	}
}

fclose($file);

echo $doc;
?>
