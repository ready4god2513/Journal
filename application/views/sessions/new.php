<?=form::open('sessions/create', array('id' => 'loginForm'))?>
	<fieldset>
		<legend>Login</legend>
		<div class="formFields">
			<?=form::label('username', 'Username')?>
			<?=form::input('username')?>
		</div>
		<div class="formFields">
			<?=form::label('password', 'Password')?>
			<?=form::password('password')?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Login')?>
	</div>
<?=form::close()?>
<div class="left">
	<?=html::anchor('passwords/forgot', 'Reset Password', array('class' => 'buttons'))?>
</div>
<div class="clear"></div>