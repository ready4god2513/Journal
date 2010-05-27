	</div>
</div>

<?php if(frache::start('footer_navigation')): ?>
	<div class="container" id="footer_navigation">
		<?php foreach(statics::navigation() as $page): ?>
			<?=html::anchor($page->show_path(), $page->title)?>
		<?php endforeach; ?>
		<?=html::anchor('blog', 'Blog')?>
		<?=html::anchor('http://twitter.com/tojournal', 'Twitter')?>
	</div>
<?php frache::stop(); endif; ?>

<?=layout::output('footer')?>
</body>
</html>