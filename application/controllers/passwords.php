<?php

class Passwords_Controller extends Users_Controller
{
	
	
	/**
	  * Allow users to retrieve/reset their password
	  * @developer Brandon Hansen
	  * @date May 31, 2010
	  */
	public function forgot()
	{
		$this->template
			->set('content', View::factory('passwords/forgot'));
	}
	
	
	/**
	  * Reset the password
	  * @developer Brandon Hansen
	  * @date May 31, 2010
	  */
	public function reset($email = NULL, $code = NULL)
	{
		$user = ORM::factory('user')->find_by_email($email);
		
		if($user->loaded && $user->password == $code)
		{
			Auth::instance()->force_login($user->username);
			flash::set_message('You have been logged in.  Please change your password');
			url::redirect('users/edit');
		}
		else
		{
			flash::set_message('The reset code you have entered is invalid');
			url::redirect('');
		}
	}
	
	
	/**
	  * Send out the e-mail to the user if we can find their email
	  * @developer Brandon Hansen
	  * @date May 31, 2010
	  */
	public function send_email()
	{
		$user = ORM::factory('user')->find_by_email($this->input->post('email'));
		
		if($user->loaded)
		{
			$email = new Email();
			$email->reset_password($user);
			flash::set_message('We have sent you an e-mail with password reset instructions');
			url::redirect('login');
		}
		else
		{
			flash::set_message('We were unable to locate an account with that e-mail address');
			url::redirect(request::referrer());
		}
		
	}
	
}