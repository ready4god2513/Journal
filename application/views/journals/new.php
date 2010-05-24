<?=form::open($journal->create_path(), array('id' => 'journalForm'))?>
	<fieldset>
		<legend>New Journal Entry</legend>
		<div class="formFields">
			<?=form::label('title', 'Title')?>
			<?=form::input('title', Input::instance()->get('title'))?>
			<a id="generateRandomTopic">Suggest a Topic</a>
		</div>
		<div class="formFields">
			<?=form::textarea('content', $journal->content)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Save Entry')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>