<?=form::open('passwords/send_email', array('id' => 'forgotPasswordForm'))?>
	<fieldset>
		<legend>Reset Password</legend>
		<div class="formFields">
			<?=form::label('email', 'email')?>
			<?=form::input('email')?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Email Me')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>