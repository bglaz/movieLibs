<?php
class home {
  function index() {
    $tpl = newTpl();
    $tpl->display("home/index.tpl.php");
  }

}
