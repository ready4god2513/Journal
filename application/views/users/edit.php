<?=form::open($user->update_path())?>
	<?=form::redirect_after($user->show_path())?>
	<fieldset>
		<legend>Update Account</legend>
		<div class="formFields">
			<?=form::label('email', 'Email')?>
			<?=form::input('email', $user->email)?>
		</div>
		<div class="formFields">
			<?=form::label('username', 'Username')?>
			<?=form::input('username', $user->username)?>
		</div>
		<div class="formFields">
			<?=form::label('password', 'Password')?>
			<?=form::password('password')?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Update Account')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>