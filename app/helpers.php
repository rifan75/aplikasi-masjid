<?php

function flash($title=null, $message=null)
{

	$flash=app('App\Http\Flash');

	if (func_num_args()==0 ) {
	    return $flash;
	}

	return $flash->info($title, $message);

}

function uang($angka){
	$hasil = number_format($angka,0,',',',');
	return $hasil;
}