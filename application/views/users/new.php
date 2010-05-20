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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16528426-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>