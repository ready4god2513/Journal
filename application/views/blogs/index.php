<h1 class="fancy small">A Journey of Journaling</h1>
<div class="clear"></div>
<?php if(!count($blogs)): ?>
	<h2>No Entries Here Yet.</h2>
<?php endif; ?>
<?php if(frache::start('complete_blog_listing')): ?>
	<?php foreach($blogs as $blog): ?>
		<?=View::factory('blogs/_entry')->set('blog', $blog)?>
	<?php endforeach; ?>
<?php frache::stop(); endif; ?>