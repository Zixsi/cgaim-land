<?php

function debug($data)
{
	echo '<pre>';
	var_dump($data);
	echo '<pre>';
}

function getSchoolFileUrl($file)
{
	$ci = & get_instance();
	$url = $ci->config->item('school_url');
	$url .= DIRECTORY_SEPARATOR.$file;

	return $url;
}

function getDefaultFileUrl()
{
	return IMG_DEFAULT_16_9;
}

function getVideoId($url)
{
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);

	return $match[1] ?? '';
}

function isActiveMenuItem($c, $a = null)
{
	$CI =& get_instance();
	$cr = strtolower($CI->router->fetch_class());		
	$ar = strtolower($CI->router->fetch_method());
	$c = strtolower($c);
	$a = strtolower($a);
	
	return (($c === $cr) && (empty($a) || $a === null || $a === $ar))?true:false;
}


function nextMondayTs()
{
	$date = new \DateTime('next monday');
	return $date->getTimestamp();
}

function getNumEnding($number, $endingArray)
{
    $number = $number % 100;
    if ($number>=11 && $number<=19) {
        $ending=$endingArray[2];
    }
    else {
        $i = $number % 10;
        switch ($i)
        {
            case (1): $ending = $endingArray[0]; break;
            case (2):
            case (3):
            case (4): $ending = $endingArray[1]; break;
            default: $ending=$endingArray[2];
        }
    }
    return $ending;
}

function time2minutes($val)
{
	$val = (int) $val;
	$m = floor($val / 60);
	$s = $val - ($m * 60);
	$m = str_pad($m, 2, '0', STR_PAD_LEFT);
	$s = str_pad($s, 2, '0', STR_PAD_LEFT);

	return $m.':'.$s;
}

function time2hours($val)
{
	$val = (int) $val;
	$h = floor($val / 3600);
	$val = $val - ($h * 3600);
	$m = floor($val / 60);
	$s = $val - ($m * 60);
	$h = str_pad($h, 2, '0', STR_PAD_LEFT);
	$m = str_pad($m, 2, '0', STR_PAD_LEFT);
	$s = str_pad($s, 2, '0', STR_PAD_LEFT);

	return $h.':'.$m.':'.$s;
}