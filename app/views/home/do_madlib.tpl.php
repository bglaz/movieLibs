<?php echo $this->header; ?>

<div class="row">
	<div class="span12">
		<div class="well">
			<b>Build Your Madlib:</b> Fill out the form below to build your madlib
		</div>
	</div>
</div>

<? foreach($this->results['data'] as $word) { ?>
	<?=$word['pos'];?><br />
<? } ?>
<?= json_encode($this->results); ?>
<?php echo $this->footer; ?>
