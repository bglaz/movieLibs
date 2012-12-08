<style type="text/css">
a{ cursor: pointer;}
</style>

<?php echo $this->header; ?>

<div class="row">
	<div class="span12">
		<div class="well">
			<b>Results:</b> Click a movie title to select it for your madlib!
		</div>
	</div>
</div>

<div class="row">
<?php
foreach($this->results as $result){
//echo json_encode($result);
?>

<div class="span2">
	<img src="<?= $result->poster ?>" /><br />
	<a><?= $result->title ?></a>
</div>
<?php } ?>
</div>

<?php echo $this->footer; ?>
