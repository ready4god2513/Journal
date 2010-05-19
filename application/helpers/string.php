<?php
class string_Core 
{

	
	/**
	 * Generate a hash of requested length, but make sure that we don't use characters that might get confused
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $input
	 * @Param (int) $length
	 * @Return (string)
	 */
	public static function generate_readable_hash($input = NULL, $length = 12)
	{
		if($input == NULL)
		{
			$input = microtime();
		}
		
		$shady_characters = array('0','o','O','1','l');
		$replacements = array('4','d','t','n','m');
		
		// Get rid of characters that might be confusing to the user
		return strtoupper(str_replace($shady_characters, $replacements, substr(md5($input),0, $length)));
	}
	
	
	/**
	 * Strip the tags from the email body and return the plain-text version
	 * @Developer Brandon Hansen
	 * @Date February 09, 2010
	 * @Param (string) $body
	 * @Return (string) $body
	 */
	public function email_plain_text($body)
	{
		$body = str_replace("<br","\n\r<br", $body);
		$body = str_replace("&nbsp;", " ", $body);
		$body = strip_tags($body);
		return trim($body);	
	}
	
	
}