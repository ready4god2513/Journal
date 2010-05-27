<?=form::open($blog->update_path(), array('id' => 'blogForm'))?>
	<fieldset>
		<legend>Update Blog Entry</legend>
		<div class="formFields">
			<?=form::label('title', 'Title')?>
			<?=form::input('title', $blog->title)?>
		</div>
		<div class="formFields">
			<?=form::textarea('content', $blog->content)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Save Entry')?>
	</div>
<?=form::close()?>
<div class="left">
	<?=form::open('blogs/delete', array('class' => 'deleteObjectLink'))?>
		<?=form::hidden('id', $blog->id)?>
		<?=form::submit('submit', 'Delete Entry')?>
	<?=form::close()?>
</div>
<div class="clear"></div>