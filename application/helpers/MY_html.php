<?php

class html extends html_Core 
{
	
	/**
	 * Return the html for a static image using the static file path
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $src
	 * @Param (string) $alt
	 * @Param (string) $index
	 * @Return (string)
	 */
	public static function static_image($src, $alt = NULL, $index = NULL)
	{
		return self::image(self::static_path($src), $alt, $index);
	}
	
	
	/**
	 * Return the html for javascript
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $script
	 * @Param (string) $index
	 * @Return (string)
	 */
	public static function static_js($script, $index = NULL)
	{
		return self::script(self::static_path($script), $index);
	}
	
	
	/**
	 * Return the html for stylesheets
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $style
	 * @Param (string) $media
	 * @Param (string) $index
	 * @Return (string)
	 */
	public static function static_css($style, $media = NULL, $index = NULL)
	{
		return self::stylesheet(self::static_path($style), $media, $index);
	}
	
	
	/**
	 * Return the html for static anchor tags
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $uri
	 * @Param (string) $title 
	 * @Param (array) $attributes
	 * @Param (protocol) $index
	 * @Return (string)
	 */
	public static function static_anchor($uri, $title = NULL, $attributes = NULL, $protocol = NULL)
	{
		return self::anchor(self::static_path($uri), $title, $attributes, $protocol);
	}
	
	
	/**
	 * Return the static file path
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $url
	 * @Return (string)
	 */
	public static function static_path($url = '')
	{
		return $url;
		return str_replace('http://', ssl::correct_http() . '://', url::site($url));
		return str_replace('http', ssl::correct_http(), Kohana::config('config.static_file_path')) . $url;
	}
	
}