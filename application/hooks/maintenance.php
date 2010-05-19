<?php defined('SYSPATH') OR die('No direct access allowed.');

if (MAINTENANCE && ALLOW_DEVELOPER_ACCESS) 
{
	flash::set_message(Kohana::lang('messages.maintenance_mode'));
}