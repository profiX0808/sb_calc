<?php
// @package sb_calc @version 1.0

$date = isset( $_POST['date'] ) ? $_POST['date'] : '00/00/0000';
$dollars = 0;

if ( ! validateDate( $date ) ) { die(); }

if ( isset( $_POST['dollars'] ) && is_numeric( $_POST['dollars'] ) ) {
	$dollars = $_POST['dollars'];
}

$date = date_create($date);
$formatDate = $date->format('Y-m-d');

$json = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'btc.json' );
$data = json_decode($json);

foreach ($data->dataset->data as $key => $value) {
	if ( $formatDate === $data->dataset->data[$key]['0'] ) {
		$currency = $data->dataset->data[$key]['7'];
		$usd = round( $currency * $dollars, 2 );
		echo '$ ' . $usd;
		die();
	}
}

function validateDate($date, $format = 'Y-m-d'){
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) === $date;
}

die();
