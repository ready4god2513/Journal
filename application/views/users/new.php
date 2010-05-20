<?=form::open($user->create_path())?>
	<fieldset>
		<legend>Create an Account</legend>
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
			<?=form::password('password', $user->password)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Create Account')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>

<?=View::factory('shared/analytics')?>