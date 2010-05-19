</div>
<div class="container" id="footer_navigation">
	<?php foreach(statics::navigation() as $page): ?>
		<?=html::anchor($page->show_path(), $page->title)?>
	<?php endforeach; ?>
</div>
</body>
</html>