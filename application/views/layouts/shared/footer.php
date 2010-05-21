	</div>
</div>
<div class="container" id="footer_navigation">
	<?php foreach(statics::navigation() as $page): ?>
		<?=html::anchor($page->show_path(), $page->title)?>
	<?php endforeach; ?>
	<?=html::anchor('http://twitter.com/tojournal', 'Twitter')?>
</div>
</body>
</html>