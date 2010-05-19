<?php

class math 
{
	
	/**
	 * Find the percentage that a number is of the total
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (int) $num
	 * @Param (int) $total
	 * @Param (int) $round
	 * @Return (float)
	 */
	public static function percentage($num, $total, $round = 2) 
	{
		return (int) round(($num * 100) / $total, $round);
	}
	
	
	/**
	  * Pagination calculator
	  * @Developer brandon
	  * @Date Apr 23, 2010
	  * @Param (int) $page
	  */
	public static function page($page)
	{
		return (int) ($page > 1) ? Kohana::config('pagination.default.items_per_page') * ($page - 1) : 0;
	}
	
}