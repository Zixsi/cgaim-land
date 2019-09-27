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