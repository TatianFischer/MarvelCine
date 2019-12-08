<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function date_fr($date, $format)
{
	$date = date_create($date);
	return date_format($date, $format);
}


function minutesToHours($duration){
	$duree = intval($duration / 60).'h';
	$duree .= (($duration % 60) < 10) ? '0' : '';
	$duree .= ($duration % 60).'min';
	return $duree;
}