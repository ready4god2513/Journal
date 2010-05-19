<?=form::open($journal->create_path())?>
	<fieldset>
		<legend>New Journal Entry</legend>
		<div class="formFields">
			<?=form::label('title', 'Title')?>
			<?=form::input('title', $journal->title)?>
		</div>
		<div class="formFields">
			<?=form::textarea('content', $journal->content)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Save Journal')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>