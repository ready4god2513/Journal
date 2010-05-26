<?=form::open($user->update_path(), array('id' => 'editUserForm'))?>
	<?=form::redirect_after($user->show_path())?>
	<?=form::hidden('send_reminders', false)?>
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
		<div class="formFields">
			<?=form::checkbox('send_reminders', $user->send_reminders, $user->send_reminders)?> Send Daily Journal Topics
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Update Account')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>