<?php echo $this->header; ?>

<style type="text/css">
	label{
		font-weight: bold;
		float: left;
		width: 160px;
	}
</style>

</style>

<div class="row">
	<div class="span12">
		<div class="well">
			<b>Build Your Madlib:</b> Fill out the form below to build your madlib
		</div>
	</div>
</div>

<div class="row">
	<? foreach($this->results['data'] as $word) { ?>
		<div class="span6 clearfix">
			<label><?=$word['pos'];?>:</label>
			<input type="text" />
		</div>
	<? } ?>
</div>

<div class="row" style="margin: 10px 0px;">
	<input type="button" id="go_btn" class="btn btn-info btn-large" value="Make a Madlib!" />
</div>

<script type="text/javascript">
	var orig_story = "<?=$this->results['orig_text'];?>";
	$(function() {
		$('#go_btn').click(function() {
			;
		});
	});
</script>

<?php echo $this->footer; ?>