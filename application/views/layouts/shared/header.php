<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>To Journal: <?=meta::get_title()?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="<?=meta::get_description()?>" />
<meta name="keywords" content="<?=meta::get_keywords()?>" />
<meta name="viewport" content="width=device-width" />
<?=html::static_css('public/css/application')?>
<?php if(request::is_mobile()): ?>
	<?=html::static_css('public/css/mobile')?>
<?php endif; ?>
<script src="<?=ssl::correct_http()?>://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?=ssl::correct_http()?>://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
<script type="text/javascript">
	WebFont.load({
		google: {
			families: [ 'Reenie Beanie' ]
		}
	});
</script>
<?=html::static_js('public/js/libraries.jquery')?>
<?=layout::output('header')?>
<?=html::static_js('public/js/application')?>
</head>
<body id="<?=Router::$controller?>" class="<?=Router::$method?>">

<div class="container">
	<h1 class="left" id="logo">
		<?=html::anchor('journals', 'To Journal <span id="tagline">Remembering Life</span>')?>
	</h1>
	<div id="navigation">
		<?php if(user::logged_in()): ?>
			<?=nav::add('account', 'Account')?>
			<?=nav::add('new', 'New Entry')?>
			<?=nav::add('journals', 'All Entries')?>
			<?=nav::add('logout', 'Logout')?>
		<?php else: ?>
			<?=nav::add('login', 'Login')?>
			<?=nav::add('register', 'Register')?>
		<?php endif; ?>
		
		<?=nav::output()?>
	</div>
	<div class="clear"></div>
</div>

<div class="container white">
	<div class="margining">
		<div id="error_container"></div>
		<?php if(flash::get_message()): ?>
			<div class="user_message" id="flash_message"><?=flash::get_message()?></div>
		<?php endif; ?>
	
		<?php if(flash::get_error()): ?>
			<div class="user_message" id="flash_error"><?=flash::get_error()?></div>
		<?php endif; ?>