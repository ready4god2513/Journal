<?php if(frache::start('public_topic_list')): ?>
	<script type="text/javascript">
		$('#generateRandomTopic').click(function(){
			
			var suggestedTopics = [
			<?php foreach(topics::find() as $topic): ?>
				'<?=$topic->title?>',
			<?php endforeach; ?>
			'Free Write'
			];
			suggestedTopics.sort(function() {return 0.5 - Math.random()});
			
			$('#title').val(suggestedTopics[0]);
		});
	</script>
<?php frache::stop(); endif; ?>