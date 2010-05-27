SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `journals`;

CREATE TABLE `journals` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `journals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `missing_pages`;

CREATE TABLE `missing_pages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `roles` values('1','login','Allow the user to login to the site'),
 ('2','admin','Administer the site');

DROP TABLE IF EXISTS `roles_users`;

CREATE TABLE `roles_users` (
  `user_id` int(10) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `roles_users` values('1','1'),
 ('1','2');

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `session_id` varchar(127) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

insert into `sessions` values('2070e8394a973e3c68769e1acbfae099','1274992881','c2Vzc2lvbl9pZHxzOjMyOiIyMDcwZTgzOTRhOTczZTNjNjg3NjllMWFjYmZhZTA5OSI7dG90YWxfaGl0c3xpOjY5O19rZl9mbGFzaF98YTowOnt9dXNlcl9hZ2VudHxzOjk1OiJNb3ppbGxhLzUuMCAoTWFjaW50b3NoOyBVOyBJbnRlbCBNYWMgT1MgWCAxMC42OyBlbi1VUzsgcnY6MS45LjIuMykgR2Vja28vMjAxMDA0MDEgRmlyZWZveC8zLjYuMyI7aXBfYWRkcmVzc3xzOjk6IjEyNy4wLjAuMSI7bGFzdF9hY3Rpdml0eXxpOjEyNzQ5OTI4ODE7cmVkaXJlY3R8czo4OiJqb3VybmFscyI7YXV0aF91c2VyfE86MTA6IlVzZXJfTW9kZWwiOjY6e3M6MTQ6IgAqAG9iamVjdF9uYW1lIjtzOjQ6InVzZXIiO3M6OToiACoAb2JqZWN0IjthOjk6e3M6MjoiaWQiO2k6MTtzOjU6ImVtYWlsIjtzOjIwOiJicmFuZG9uaEBpYmV0aGVsLm9yZyI7czo4OiJ1c2VybmFtZSI7czo3OiJicmFuZG9uIjtzOjg6InBhc3N3b3JkIjtzOjUwOiJlYmFmYjY0MTJkZTIwMDI2YmFjOGYxZGVhNjgyODRiZGZhY2RkZWEzOTNkZTg3NzE0YSI7czoxNDoic2VuZF9yZW1pbmRlcnMiO2k6MDtzOjY6ImxvZ2lucyI7aTo1O3M6MTA6Imxhc3RfbG9naW4iO2k6MTI3NDk5MjU1MztzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDEwLTA1LTE5IDIyOjU5OjE0IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDEwLTA1LTIxIDEwOjE4OjEyIjt9czoxMDoiACoAY2hhbmdlZCI7YTowOnt9czo5OiIAKgBsb2FkZWQiO2I6MTtzOjg6IgAqAHNhdmVkIjtiOjE7czoxMDoiACoAc29ydGluZyI7YToxOntzOjI6ImlkIjtzOjM6ImFzYyI7fX0=');

DROP TABLE IF EXISTS `statics`;

CREATE TABLE `statics` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `statics` values('1','About','I like to write.  Writing has been a huge part of human interaction for thousands of years.  But there are just those times that I don\'t really desire for other people to see my writing.  That is why I wrote this application.  I wrote it, I use it, and I love it.\n\nSo, I am sure you want to know a little bit about what is going on behind the scenes. Or maybe you don\'t care.  But I like to write, remember?\n\nWell, this app has been built for security and speed.  The application is built to let me write whatever I want, but not worry about prying eyes getting into it.  That is why there are multiple levels of encryption.  The first level is at the client level.  Before you even submit the journal entry, your computer encrypts the text (both the title and the entry content).  Once the encrypted text hits the server, the application then encrypts the data again.  This ensures that even if one key is compromised, your journal entry (and mine, since I use it too, and that is why I wrote it in the first place) is still safe.\n\nYou will also notice that the application is pretty simple.  And why should it not be?  This isn\'t some high-end game.  This is an application designed for one thing- to write.  So let the application get out of your way.  Write away.  Let your heart not be troubled.\n\nI hope that you will enjoy this application as much as I do.  And if you have any issues, feel free to <a href=\"/contact\">drop me a line.</a>','2010-05-19 14:08:07','2010-05-19 21:59:55'),
 ('2','Privacy','All data is encrypted (It looks something like this- mn&^$JH#bd0f) before we save it.  Even if we wanted to (we don\'t), we couldn\'t look at your journal entries.\n\nThis application was written so that we could securely write journal entries from wherever we are.  Since we use it, we make sure that it is reliable, safe, and secure.','2010-05-19 14:31:11','2010-05-19 14:31:11');

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `used` bit(1) default '\0',
  `topic_of_day` timestamp NOT NULL default '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `topics` values('1','Comparing Goals with Reality',b'0','0000-00-00 00:00:00','2010-05-23 18:17:30','2010-05-23 18:17:30'),
 ('2','Am I where I want to be?',b'0','0000-00-00 00:00:00','2010-05-23 18:17:38','2010-05-23 18:17:38'),
 ('3','What a struggle it has been',b'0','0000-00-00 00:00:00','2010-05-23 18:17:51','2010-05-23 18:17:51'),
 ('4','Excitement Abounds',b'0','0000-00-00 00:00:00','2010-05-23 18:17:59','2010-05-23 18:17:59'),
 ('5','What do I need to improve?',b'0','0000-00-00 00:00:00','2010-05-23 18:18:10','2010-05-23 18:18:10'),
 ('6','Am I happy?',b'0','0000-00-00 00:00:00','2010-05-23 18:18:17','2010-05-23 18:18:17'),
 ('7','What does one year from now look like?',b'0','0000-00-00 00:00:00','2010-05-23 18:18:25','2010-05-23 18:18:25'),
 ('8','What is going on in the world today?',b'0','0000-00-00 00:00:00','2010-05-23 18:18:32','2010-05-23 18:18:32'),
 ('9','Who would I give my life for?',b'0','0000-00-00 00:00:00','2010-05-23 18:18:39','2010-05-23 18:18:39'),
 ('10','The meaning of life',b'0','0000-00-00 00:00:00','2010-05-23 18:18:45','2010-05-23 18:18:45'),
 ('11','Who am I?',b'0','0000-00-00 00:00:00','2010-05-23 18:18:52','2010-05-23 18:18:52'),
 ('12','My Dreams and Desires',b'0','0000-00-00 00:00:00','2010-05-23 18:18:58','2010-05-23 18:18:58'),
 ('13','Where do I see myself in 1 year?',b'0','0000-00-00 00:00:00','2010-05-23 18:19:05','2010-05-23 18:19:05'),
 ('14','What gives me joy?',b'0','0000-00-00 00:00:00','2010-05-23 18:19:13','2010-05-23 18:19:13'),
 ('15','What Makes Life Crazy?!',b'0','0000-00-00 00:00:00','2010-05-24 11:35:32','2010-05-24 11:35:32');

DROP TABLE IF EXISTS `user_tokens`;

CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL default '',
  `password` char(50) NOT NULL,
  `send_reminders` int(1) default '0',
  `logins` int(10) unsigned NOT NULL default '0',
  `last_login` int(10) unsigned default NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `users` values('1','brandonh@ibethel.org','brandon','ebafb6412de20026bac8f1dea68284bdfacddea393de87714a','0','5','1274992553','2010-05-19 22:59:14','2010-05-21 10:18:12');

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `blogs` values('1','This is a test entry','This is a test journal entry','2010-05-27 13:21:54','2010-05-27 13:21:54');

SET FOREIGN_KEY_CHECKS = 1;
