<?php echo $this->header; ?>

<style type="text/css">
	span.user_input{
		font-weight: bold;
		color: #00E;
	}
</style>

<h3><?=$this->movie['title'];?></h3>

<div class="row">
	<div class="span12" style="font-size: 12pt; line-height: 1.3em;">
		<img src="<?=$this->img;?>" /><br />

		<?=stripslashes($this->final_story);?>
	</div>
</div>

<input style="margin: 10px 0px;" id="post_btn" type="submit" class="btn btn-info btn-large" value="Post to Tumblr!" />

<form id="myForm">
	<input type="hidden" name="story" value="<?=strip_tags($this->final_story);?>" />
	<input type="hidden" name="img" value="<?=$this->img;?>" />
</form>

<script type="text/javascript">
	$(function() {
		$('#post_btn').click(function() {
			$.ajax({
				url: 	"/post_madlib",
				type: 	"POST",
				data: 	$('#myForm').serialize(),
				success: 	function() {
					alert('Your madlib is now live on movelibs.tumblr.com !');
				},
				error: 	function() {
					alert('Oops... Something went wrong. Please try again.')
				}
			});
		});
	});
</script>

<?php echo $this->footer; ?>