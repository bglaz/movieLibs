<?php
require("tumblr/defaults.php");
require("tumblr/lib/autoloader.php");

class home {
  function index() {
    $tpl = newTpl();
    $tpl->header = $tpl->fetch("header.tpl.php");
    $tpl->footer = $tpl->fetch("footer.tpl.php");
    $tpl->display("home/index.tpl.php");
  }

  function get_movies() {

  	if(!empty($_POST)) {
  		$query = addslashes($_POST['movie_title']);
  		$url = "http://imdbapi.org/?title=$query&type=json&plot=full&episode=1&limit=5&yg=0&mt=none&lang=en-US&offset=&aka=simple&release=simple";

  		$ch = curl_init($url);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$results = curl_exec($ch);

  		$tpl = newTpl();
      $tpl->header = $tpl->fetch("header.tpl.php");
      $tpl->footer = $tpl->fetch("footer.tpl.php");
  		$tpl->results = json_decode($results);
  		$tpl->display("home/get_movies.tpl.php");
  	}
  }

  function do_madlib() {
  	$data = $_POST['movie'];
    $movie64 = $data;

  	$data = json_decode(base64_decode($data),true);

  	$plot = $data['plot'];

  	//send text to node server to get POS data
  	$ch = curl_init("http://localhost:8080");
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  	curl_setopt($ch, CURLOPT_POST, true);
  	curl_setopt($ch, CURLOPT_POSTFIELDS, "text=$plot");
  	
  	$results = json_decode(curl_exec($ch),true);


  	$tpl = newTpl();
    $tpl->header = $tpl->fetch("header.tpl.php");
    $tpl->footer = $tpl->fetch("footer.tpl.php");
  	$tpl->results = $results;
    $tpl->movie64 = $movie64;
  	$tpl->display("home/do_madlib.tpl.php");
  }

  function finish_madlib() {
  	$data = $_POST;
  	$movie64 = $data['movie64'];
  	$final_story = $data['final_story'];

  	$tpl = newTpl();
    $tpl->header = $tpl->fetch("header.tpl.php");
    $tpl->footer = $tpl->fetch("footer.tpl.php");
    $tpl->movie64 = $movie64;
    $tpl->final_story = $final_story;
    $tpl->display("home/finish_madlib.tpl.php");
  }

}
