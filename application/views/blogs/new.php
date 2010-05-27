<?=form::open($blog->create_path(), array('id' => 'blogForm'))?>
	<fieldset>
		<legend>New Blog Entry</legend>
		<div class="formFields">
			<?=form::label('title', 'Title')?>
			<?=form::input('title')?>
		</div>
		<div class="formFields">
			<?=form::textarea('content', $blog->content)?>
		</div>
	</fieldset>
	<div class="right">
		<?=form::submit('submit', 'Save Entry')?>
	</div>
	<div class="clear"></div>
<?=form::close()?>