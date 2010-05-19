<?php if(isset($pagination)): ?>
	<div class="pagination">
		<?=$pagination?>
	</div>
<?php endif; ?>

<?php foreach($journals as $journal): ?>
	<div class="journal_entry">
		<div class="journal_meta">
			 <?=$journal->title?><span class="the_time"><?=date::full_date_time($journal->created_at)?></span>
		</div>
		<div class="journal_entry_content">
			<?=nl2br($journal->content)?>
		</div>
	</div>
<?php endforeach; ?>


<?php if(isset($pagination)): ?>
	<div class="pagination">
		<?=$pagination?>
	</div>
<?php endif; ?>