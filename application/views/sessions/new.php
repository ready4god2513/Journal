<?=form::open('sessions/create')?>
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
	<div class="clear"></div>
<?=form::close()?>

<?=View::factory('shared/analytics')?>