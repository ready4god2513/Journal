<div class="journal_entry">
	<div class="journal_meta">
		 <?=html::anchor($journal->show_path(), $journal->title)?>
		 <span class="edit_journal_link"><?=html::anchor($journal->edit_path(), '(Edit)')?></span>
		 <span class="the_time"><?=date::full_date_time($journal->created_at)?></span>
	</div>
	<div class="journal_entry_content">
		<?=nl2br($journal->content)?>
	</div>
</div>