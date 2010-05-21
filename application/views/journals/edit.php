<?=form::open($journal->update_path(), array('id' => 'journalForm'))?>
	<fieldset>
		<legend>Update Journal Entry</legend>
		<div class="formFields">
			<?=form::label('title', 'Title')?>
			<?=form::input('title', $journal->title)?>
		</div>
		<div class="formFields">
			<?=form::textarea('content', $journal->content)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Save Entry')?>
	</div>
<?=form::close()?>
<div class="left">
	<?=form::open('journals/delete', array('class' => 'deleteObjectLink'))?>
		<?=form::hidden('id', $journal->id)?>
		<?=form::submit('submit', 'Delete Entry')?>
	<?=form::close()?>
</div>
<div class="clear"></div>