<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>To Journal: <?=meta::get_title()?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="<?=meta::get_description()?>" />
<meta name="keywords" content="<?=meta::get_keywords()?>" />
<?=html::static_css('public/css/application')?>
<?php if(request::is_mobile()): ?>
	<?=html::static_css('public/css/mobile')?>
<?php endif; ?>
<?=html::static_js(ssl::correct_http() . '://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js')?>
<?=html::static_js('public/js/libraries.jquery')?>
<?=html::static_js('public/js/application')?>
</head>
<body id="<?=Router::$controller?>" class="<?=Router::$method?>">

<div class="container" id="navigation">
	<?php if(user::logged_in()): ?>
		<?=html::anchor('users/show', 'Account')?>
		<?=html::anchor('new', 'New Entry')?>
		<?=html::anchor('', 'All Entries')?>
		<?=html::anchor('logout', 'Logout')?>
	<?php else: ?>
		<?=html::anchor('login', 'Login')?>
		<?=html::anchor('register', 'Register')?>
	<?php endif; ?>
</div>
<div class="container white">
	<div class="margining">
		<?php if(flash::get_message()): ?>
			<div class="user_message" id="flash_message"><?=flash::get_message()?></div>
		<?php endif; ?>
	
		<?php if(flash::get_error()): ?>
			<div class="user_message" id="flash_error"><?=flash::get_error()?></div>
		<?php endif; ?>