<?php defined('SYSPATH') or die('No direct script access.');

class date 
{
	
	/**
     * Find the number of days between two dates
     * @Developer Brandon Hansen
     * @Date April 19, 2010
     * @Param (string) $beginDate
     * @Param (string) $endDate
     * @Return (int)
	 */
	public static function days_diff($beginDate, $endDate) 
	{
		return (strtotime($endDate) - strtotime($beginDate)) / (60 * 60 * 24);
	}
	
	
	/**
	 * Determines the current day for the current timezone. Returns the three-letter
	 * abbreviation of the current day.
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (string)
	 */
	public static function current_day_abbr()
	{
		$julian_day = cal_to_jd(CAL_GREGORIAN, date('m'), date('d'), date('Y'));
		$day_of_week = (jddayofweek($julian_day, 1));
		return substr($day_of_week, 0, 3);
	}
	
	
	/**
	 * Returns the 4-digit year, the month, hours ( 0-23 ), minutes, and seconds
	 * as a javascript-friendly string. 
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (string)
	 */
	public static function get_javascript_friendly_date_string()
	{
		$now = strtotime( 'now' );
		return date( 'F d, Y h:i:s' , $now );
	}
	
	
	/**
	 * Return the date to the user in the following format- Full name of month, two digit day, Year (IE- January 29, 2010)
	 * @Developer Brandon Hansen
	 * @Date January 29, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function user_friendly_date($date)
	{
		if(!$date || $date == '0000-00-00')
		{
			return '---------';
		}
		
		return date('F d, Y', strtotime($date));
	}
	
	
	/**
	 * Database friendly dates
	 * @Developer Brandon Hansen
	 * @Date February 26, 2010
	 * @Param (string) $date
	 * @Param (bool) $include_hours (default true)
	 * @Return string
	 */
	public static function database_friendly($date, $include_hours = true)
	{
		if($include_hours)
		{
			return date('Y-m-d H:i:s', strtotime($date));
		}
		else
		{
			return date('Y-m-d', strtotime($date));
		}
	}
	
	
	/**
	 * Give a full day/time string to the user
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function full_date_time($date = NULL) 
	{
		return date('F j, Y h:i A',strtotime($date));
	}
	
	
	/**
	 * Give a medium day
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function medium_date($date = NULL) 
	{
		return date('m.d.y',strtotime($date));
	}
	
	
	/**
	 * Give a medium day/time string to the user
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function medium_date_time($date = NULL) 
	{
		return date('m.d.y h:i A',strtotime($date));
	}

	
	/**
	 * Give a short day/time string to the user
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function short_date_time($date = NULL) 
	{
		return date('m.d.y h:i A',strtotime($date));
	}

	
	/**
	 * Give a short day
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function short_date($date = NULL) 
	{
		return date('m.d.y',strtotime($date));
	}
	
	
	/**
	 * Force the string to have a leading '0' if the number is less than 10
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	private static function force_double_digits($digit = NULL) 
	{
		if ($digit < 10) 
		{
			return '0' . $digit;
		}
		return $digit;
	}
	
	
	/**
	 * Find the year (int) of the fiscal year based on the input date.  Any date after August 01 will return the current year.  
	 * Any date before shall return the previous year
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function fiscal_year($inputDate) 
	{
	    $date = strtotime($inputDate);
	    $inputMonth = (int) strftime('%m',$date);
	    $inputYear = strftime('%Y', $date);
	    $fiscal_year = $inputYear;
	    
	    if($inputMonth < 8) 
	    {
	    	$fiscal_year -= 1;
	    }
	    
	    return date('Y-m-d', mktime(0, 0, 0, '08', '01', $fiscal_year));
	}
	
	
	/**
	  * Time between two timestamps
	  * @Developer brandon
	  * @Date Apr 22, 2010
	  */
	public static function time_between($date1, $date2)
	{
		if(!$date1 || !$date2)
		{
			return 'Unknown';
		}
		else
		{
			return self::readable_seconds(strtotime($date1) - strtotime($date2));
		}
	}
	
	
	/**
	 * Display the time in H:i:s based on an integer
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (int) $seconds
	 * @Return (string)
	 */
	public static function readable_seconds($seconds = NULL) 
	{
		
		if (!is_numeric($seconds)) return $seconds;
		$seconds = abs($seconds);

		$value = array(
			'years' => 0, 'days' => 0, 'hours' => 0,
			'minutes' => 0, 'seconds' => 0,
			);
			
		if($seconds >= 3600)
		{
			$value['hours'] = floor($seconds/3600);
			$seconds = ($seconds%3600);
		}
		if($seconds >= 60)
		{
			$value['minutes'] = floor($seconds/60);
			$seconds = ($seconds%60);
		}
		$value['seconds'] = floor($seconds);

		return self::force_double_digits($value['hours']) . ':'  .self::force_double_digits($value['minutes']) . ':' . self::force_double_digits($value['seconds']);

	}
	
	
	/**
	 * Format a date for RSS feeds
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public static function rss($date)
	{
		return date('D, d M Y, H:i:s e', strtotime($date));
	}

}