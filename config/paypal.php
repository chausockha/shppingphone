<?php


	return [

	'client_id' => 'AeNJkpyc87BsedgBNCYPE0JE5-ePaWvdKfAzpsIPg7rcwL5CSbjiXaVJqz3IMlpgEA0O9gD-H_Bolugz',
	'secret'=>'EMpPyqPQgCXAQJKP2sripeETtBp_4LKcxSvQDRweRTVoiA3vrZcqdq15IW05KAHuGwMTOhKlP03zm56F',
	'settings'=> [
		'http.CURLOPT_CONNECTTIMEOUT' => 30,
		'mode' =>'sandbox', //live
		'log.LogEnabled' =>true,
		'log.FileName'=> storage_path().'/logs/paypal.php',
		'log.LogLevel'=>'INFO',
	],

	];