<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

if (!function_exists('get_notices'))
{
	/*
	 * Returns the notices with the Twitter Bootstrap notices formatting, and unsets
	 * the array lines from the flash
	 * 
	 * @author Woxxy
	 */
	function get_notices()
	{
		$CI = & get_instance();
		$merge = array_merge($CI->notices, $CI->flash_notice_data);
		$CI->flash_notice_data = '';
		$CI->session->set_flashdata('notices', array());
		$echo = '';
		foreach ($merge as $key => $value)
		{
			$echo .= '<div class="alert alert-' . $value["type"] . ' alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p>' . $value["message"] . '</p></div>';
		}
		return $echo;
	}


}

if (!function_exists('clear_notices'))
{
	/*
	 * Flushes flashdata and standard notices
	 * 
	 * @author Woxxy
	 */
	function clear_notices()
	{
		$CI = & get_instance();
		unset($CI->notices);
		$CI->session->set_flashdata('notices', array());
	}


}

if (!function_exists('set_notice'))
{
	/*
	 * Sets a notice in the currently loading page. Can be used for multiple notices
	 * Notice types: error, warn, notice
	 * 
	 * @author Woxxy
	 */
	function set_notice($type, $message, $data = FALSE)
	{
		if ($type == 'warn')
			$type = 'warning';
		if ($type == 'notice')
			$type = 'info';
        if ($type == 'error')
            $type = 'danger';

		$CI = & get_instance();
		$CI->notices[] = array("type" => $type, "message" => $message, "data" => $data);

		if ($CI->input->is_cli_request())
		{
			echo '[' . $type . '] ' . $message . PHP_EOL;
		}
	}


}

if (!function_exists('flash_notice'))
{
	/*
	 * Sets a notice in the next loaded page. Can be used for multiple notices
	 * Notice types: error, warn, notice
	 * 
	 * @author Woxxy
	 */
	function flash_notice($type, $message)
	{
		if ($type == 'warn')
			$type = 'warning';
		if ($type == 'notice')
			$type = 'success';

		$CI = & get_instance();
		$CI->flash_notice_data[] = array('type' => $type, 'message' => $message);
		$CI->session->set_flashdata('notices', $CI->flash_notice_data);
	}


}