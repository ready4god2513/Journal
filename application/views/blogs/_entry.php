<?php if(frache::start('blog_entry_' . (string) $blog)): ?>
<div class="journal_entry">
	<div class="journal_meta">
		 <?=html::anchor($blog->show_path(), $blog->title)?>
		 <span class="the_time"><?=date::full_date_time($blog->created_at)?></span>
	</div>
	<div class="journal_entry_content">
		<?=nl2br($blog->content)?>
	</div>
</div>
<?php frache::stop(); endif; ?>