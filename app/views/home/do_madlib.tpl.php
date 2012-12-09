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
			<input type="text" data-orig_word="<?=$word['word'];?>" />
		</div>
	<? } ?>
</div>

<div class="row" style="margin: 10px 0px;">
	<input type="button" id="go_btn" class="btn btn-info btn-large" value="Make a Madlib!" />
</div>

<form id="myForm" action="/finish_madlib" method="POST">
	<input type="hidden" name="movie64" value="<?=$this->movie64;?>" />
	<input id="final_story" type="hidden" name="final_story" value="" />
</form>

<script type="text/javascript">
	var orig_story = "<?=$this->results['orig_text'];?>";
	$(function() {
		$('#go_btn').click(function() {
			var user_inputs = $('input[type="text"]');
			var success = true;
			user_inputs.each(function() {
				if($(this).val() == '') {
					alert('Please fill out all the fields');
					success = false;
					return false;
				}

				var search_for = $(this).data('orig_word');
				var replace_with = "<span class='user_input'>" + $(this).val() + "</span>";
				var regex = new RegExp(search_for,"gi");

				orig_story = orig_story.replace(regex,replace_with);
			});

			if(success) {
				$('#final_story').val(orig_story);
				$('#myForm').submit();
			}

		});
	});
</script>

<?php echo $this->footer; ?>