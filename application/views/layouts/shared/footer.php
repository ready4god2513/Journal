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

<?php if(layout::output('pre_footer', false)): ?>
	<div class="container" id="pre_footer">
		<?=layout::output('pre_footer')?>
	</div>
<?php endif; ?>

<?=layout::output('footer')?>
</body>
</html>