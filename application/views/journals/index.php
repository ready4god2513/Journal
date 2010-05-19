<?php if(isset($pagination)): ?>
	<div class="pagination">
		<?=$pagination?>
	</div>
<?php endif; ?>

<?php foreach($journals as $journal): ?>
	<?=View::factory('journals/_journal')->set('journal', $journal)?>
<?php endforeach; ?>


<?php if(isset($pagination)): ?>
	<div class="pagination">
		<?=$pagination?>
	</div>
<?php endif; ?>