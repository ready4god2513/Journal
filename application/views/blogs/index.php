<h2>The Blog</h2>
<h4>A Journey of Journaling</h4>

<?php if(!count($blogs)): ?>
	<h2>No Entries Here Yet.</h2>
<?php endif; ?>
<?php if(frache::start('complete_blog_listing')): ?>
	<?php foreach($blogs as $blog): ?>
		<?=View::factory('blogs/_entry')->set('blog', $blog)?>
	<?php endforeach; ?>
<?php frache::stop(); endif; ?>