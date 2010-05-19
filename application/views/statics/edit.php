<?=form::open($static->update_path())?>
	<fieldset>
		<legend>Update Page</legend>
		<div class="formFields">
			<?=form::label('title', 'Title')?>
			<?=form::input('title', $static->title)?>
		</div>
		<div class="formFields">
			<?=form::textarea('content', $static->content)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Save Page')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>