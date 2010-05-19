<?php

class upload extends upload_Core
{
	
	
	/**
	  * Upload an image and return the filename.  Makes the assumption that it is in the "public/files/" directory.
	  * Will change the post field to the URL of the image after saving.
	  * @Developer brandon
	  * @Date Apr 20, 2010
	  * @Param (string) $post_field
	  * @Param (string) $directory
	  * @Param (int) $width
	  * @Param (int) $height
	  * @Return (any) (either the filename that was saved, or false if couldn't save)
	  */
	public static function process($post_field = 'image', $directory = NULL, $width = 100, $height = 100)
	{
		$files = Validation::factory($_FILES)->add_rules($post_field, 'upload::valid', 'upload::required', 'upload::type[gif,jpg,png]');
		
		if($files->validate())
		{
			// Temporary file name
			$filename = upload::save($post_field);
		 	$new_filename = preg_replace('/[^0-9a-zA-Z_.]/', '', basename($filename));
			
			// Resize, sharpen, and save the image
			Image::factory($filename)
				->resize($width, $height, Image::WIDTH)
				->crop($width, $height)
				->save(Kohana::config('upload.directory') . $directory . $new_filename);
		 
			// Remove the temporary file
			unlink($filename);
			
			// Set the post field
			$_POST[$post_field] = $new_filename;
			
			return $new_filename;
		}
		else
		{
			unset($_POST[$post_field]);
			return false;
		}
	}
	
}