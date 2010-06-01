<?php

class Email_Core
{
	
	/**
	  * The body of the e-mail
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	private $body;
	
	/**
	  * The subject of the email
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	private $subject;
	
	/**
	  * Recipient
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	private $recipient;
	
	/**
	  * The mailer
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	private $mailer;
	
	
	/**
	  * Load up the e-mailer
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function __construct($mailer = NULL)
	{
		if($mailer)
		{
			$this->mailer = $mailer;
		}
		else
		{
			$this->mailer = new Phpmailer();
		}
	}

	
	/**
	  * Send out the daily topic e-mail
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function send_daily_email()
	{
		if($topic = ORM::factory('topic')->topic_of_the_day())
		{
			$users = ORM::factory('user')->users_subscribed_to_topic_of_the_day();
			$this->subject = 'Topic of the Day for ' . date::user_friendly_date(date('Y-m-d'));
			
			$this->body = View::factory('emails/daily_topic')
				->set('topic', $topic)
				->render();
				
			foreach($users as $user)
			{
				$this->recipient = $user->email;
				$this->send();
			}
		}
		
	}
	
	
	/**
	  * Send the reset password e-mail
	  * @developer Brandon Hansen
	  * @date May 31, 2010
	  */
	public function reset_password(User_Model $user)
	{
		$this->subject = 'Reset your To Journal password';
			
		$this->body = View::factory('emails/reset_password')
			->set('user', $user)
			->render();
			
		$this->recipient = $user->email;
		$this->send();
	}
	
	
	/**
	  * Send out the e-mails
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	private function send()
	{
		$header = View::factory('layouts/emails/header')->render();
		$footer = View::factory('layouts/emails/footer')->render();
		$body = $header . $this->body . $footer;
		
		
		$this->mailer->Host = Kohana::config('email.host');
		$this->mailer->Subject = $this->subject;
		$this->mailer->FromName = Kohana::config('email.from_name');
		$this->mailer->From = Kohana::config('email.from');
		$this->mailer->recipient = $this->recipient;

		$this->mailer->IsHTML(true);
		$this->mailer->Body = $body;
		$this->mailer->AltBody = string::email_plain_text($this->mailer->Body);
		$this->mailer->AddAddress($this->mailer->recipient, ' ');
		$this->mailer->Send();

		$this->mailer->ClearAddresses();
	}
	
}