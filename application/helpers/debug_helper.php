<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

function debug($data)
{
	//APPPATH
	$file = './debug.txt';
	ob_start();
	echo "\r\n\r\n--------------------------------------------------\r\n";
	echo date('Y-m-d H:i:s')."\r\n";
	echo "--------------------------------------------------\r\n";
	print_r($data);
	$content = ob_get_contents();
	ob_end_clean();
	file_put_contents($file,$content,FILE_APPEND);
}


/* End of file debug_helper.php */
/* Location: ./application/helpers/debug_helper.php */