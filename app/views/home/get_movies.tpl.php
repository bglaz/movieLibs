<style type="text/css">
a{ cursor: pointer;}
</style>

<?php echo $this->header; ?>

<form id="myForm" action="/do_madlib" method="POST">
	<input id="movie" type="hidden" name="movie" value="" />
</form>

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
	<a data-json="<?= json_encode($result);?>"><?= $result->title ?></a>
</div>
<?php } ?>
</div>

<?php echo $this->footer; ?>

<script type="text/javascript">

$(function() {
	$('a').click(function() {
	 	$('#movie').val($(this).data('json'));
	 	$('#myForm').submit();
 	});
});

</script>
