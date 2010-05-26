<?php

class Topic_Model extends ORM
{
	
	
	/**
	  * URL to write a topic
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function url()
	{
		return url::site('new?title=' . $this->title);
	}
	
	
	/**
	  * Find a topic to send to all of the users
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function topic_of_the_day()
	{
		if(!$this->has_topic_been_created())
		{
			return false;
		}
		else
		{
			$topic = $this->where('used', false)->find();
			$topic->used = true;
			$topic->topic_of_day = date('Y-m-d H:i:s');
			$topic->save();
			
			return $topic;
		}
	}
	
	
	/**
	  * Check to see if the topic of the day has already been created
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function has_topic_been_created()
	{
		$topic = $this->where('topic_of_day >', date('Y-m-d 00:00:00'))->find();
		return $topic->loaded;
	}
	
	
	/**
	  * List past "topic of the day" items
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function topic_of_the_day_history()
	{
		return $this->where('used', true)->orderby('topic_of_day', 'DESC')->find_all();
	}

}