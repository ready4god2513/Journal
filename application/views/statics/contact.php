<?=form::open('statics/contact_submit')?>
	<fieldset>
		<legend>Contact Us</legend>
		<div class="formFields">
			<?=form::label('name', 'Name')?>
			<?=form::input('name')?>
		</div>
		<div class="formFields">
			<?=form::label('email', 'Email')?>
			<?=form::input('email')?>
		</div>
		<div class="formFields">
			<?=form::label('comments', 'Comments')?>
			<?=form::textarea('comments')?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Send Message')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>