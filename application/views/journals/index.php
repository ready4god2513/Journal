<?php if(isset($pagination)): ?>
	<div class="pagination">
		<?=$pagination?>
	</div>
<?php endif; ?>

<?php if(!count($journals)): ?>
	<h2>No Journals Here Yet.  <?=html::anchor('new', 'Write One')?></h2>
<?php endif; ?>
<?php foreach($journals as $journal): ?>
	<?=View::factory('journals/_journal')->set('journal', $journal)?>
<?php endforeach; ?>


<?php if(isset($pagination)): ?>
	<div class="pagination">
		<?=$pagination?>
	</div>
<?php endif; ?>