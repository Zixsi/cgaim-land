<?php

class SystemHook
{
	public $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function profiler()
	{
		$this->CI->output->enable_profiler(false);
	}

	public function initOptions()
	{
		date_default_timezone_set('Europe/Moscow');
		setlocale(LC_ALL, 'ru_RU.UTF-8');
	}
}