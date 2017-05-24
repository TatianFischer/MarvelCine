<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * print_r coké
 * @param  mixed $var La variable a déboger
 */
function debug($var)
{
	echo '<div style="padding: 10px; font-family: Consolas, Monospace; background-color: #'.rand('111111','999999').'; color: #FFF;">';
	$trace = debug_backtrace();
	echo 'Le debug a été demandé dans le fichier : '.$trace[0]['file'].' à la ligne : '.$trace[0]['line'].'<hr>';
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	echo '</div>';
}