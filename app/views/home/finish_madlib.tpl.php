<?php echo $this->header; ?>

<style type="text/css">
	span.user_input{
		font-weight: bold;
		color: #00E;
	}
</style>

<h3><?=$this->movie['title'];?></h3>

<div class="row">
	<div class="span12" style="font-size: 12pt;">
		<?=stripslashes($this->final_story);?>
	</div>
</div>
<?php echo $this->footer; ?>