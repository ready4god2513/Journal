<?php defined('SYSPATH') or die('No direct script access.');

class format 
{
	
	/**
	 * Take a string and return it as dollar format
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (float) $amount
	 * @Return (string)
	 */
	public static function dollar_format($amount = 0.00) 
	{
		if(is_numeric($amount)){
			return'$' . number_format($amount, 2);
		}
		return '$0.00';
	}
	
	
	/**
	  * Return the city/state/zip in one line
	  * @Developer brandon
	  * @Date Apr 22, 2010
	  */
	public function city_state_zip($city, $state, $zip)
	{
		if(!$city)
		{
			return '';
		}
		else
		{
			return $city . ', ' . $state . ' ' . $zip;
		}
	}
	
	
	/**
	  * Escape Javascript
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function escape_javascript($string = NULL)
	{
		return str_replace(array(chr(13), chr(10)), '', $string);
	}
	
	
	/**
	 * Take a float and make it a dollar format.  If it is zero, then return blank
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (float) $amount
	 * @Param (string) $replace_with
	 * @Return (string)
	 */
	public static function dollar_format_blank_when_zero($amount = 0.00, $replace_with = NULL) 
	{
		if($amount != 0.00){
			return self::dollar_format($amount);
		}
		else
		{
			return $replace_with;
		}
	}
	
	
	/**
	  * Remove underscore and replace with spaces
	  * @Developer brandon
	  * @Date Apr 21, 2010
	  */
	public static function friendly_model_name($name)
	{
		return ucwords(str_replace('_', ' ', $name));
	}
	
	
	/**
	  * Convert a boolean to string
	  * @Developer brandon
	  * @Date Apr 20, 2010
	  * @Param (bool) $bool
	  * @Param (string) $true
	  * @Param (string) $false
	  * @Return (string)
	  */
	public static function to_s($bool, $true = 'True', $false = 'False')
	{
		return $bool ? $true : $false;
	}
	
	/**
	 * Round all dollar float to the nearest penny
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (float) $amount
	 * @Return (float)
	 */
	public static function dollar_round($amount)
	{
		return number_format($amount, 2, '.', '');
	}
	
	
	/**
	 * Replace spaces with dashes
	 * @Developer Brandon Hansen & Andrew Lyric
	 * @Date March 04, 2010
	 * @Param (string) $string
	 * @Return (string) $string
	 */
	public static function pretty_url($string)
	{
		$string = trim($string);
		$result = preg_replace('/[^a-zA-Z0-9\s]/','',$string);
		return str_replace(' ', '-', $result);
	}
	
	
	/**
	 * Replace "-" with "/" in a URL
	 * @Developer Brandon Hansen
	 * @Date April 16, 2010
	 * @Param (string) $date
	 * @Return (string)
	 */
	public function pretty_url_date($date)
	{
		return date('Y/m/d', strtotime($date));
	}
	
	
	/**
	 * When e-mails are being sent, there are times that variables are added to the body.  Take
	 * out those variables and replace them with the actual data
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $email
	 * @Param (obj) $obj
	 * @Return (string)
	 */
	public static function replace_email_vars($email = '', $obj = '')
	{
		//  If an object was not passed in, get out of here
		if(!is_object($obj) || !strlen($email))
		{
			return $email;
		}
		
		foreach($obj as $key => $value)
		{
			$email = str_replace('{' . $key . '}',$value, $email);
		}
		
		return $email;
	}
	
	
	/**
	 * Replace the URL's in the Twitter messages with actual links
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $ret
	 * @Return (string)
	 */
	public static function twitterify($ret = NULL) 
	{
		$ret = str_replace('ibetheltv: ', '', $ret);
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\" class=\"blog_link\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\" class=\"blog_link\">\\2</a>", $ret);
		$ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\" class=\"blog_link\">@\\1</a>", $ret);
		$ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\" class=\"blog_link\">#\\1</a>", $ret);
		return $ret;
	}
	
	
	/**
	  * Friendly credit card expiration date
	  * @Developer brandon
	  * @Date Apr 22, 2010
	  */
	public static function credit_card_expo_date($month, $year)
	{
		if($month)
		{
			return $month . '/' . $year;
		}	
	}
	
	
	/**
	  * Convert JSON to a table
	  * @Developer brandon
	  * @Date May 3, 2010
	  */
	public static function json_to_table($json)
	{
		$object = json_decode($json);
		
		$table = '<table class="defaultTable">';
		
		
		foreach($object as $key => $value)
		{
			$table .= '<tr>';
			$table .= '<th>' . $key . '</th>';
			$table .= '<td>' . $value . '</td>';
			$table .= '</tr>';
		}
		
		
		$table .= '</table>';
		
		return $table;
	}

}