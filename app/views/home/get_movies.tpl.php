<?php echo $this->header; ?>
<?php
foreach($this->results as $result){
?>
<img src="<?= $result->poster ?>" />
<?php
}
?>
<?php echo $this->footer; ?>
