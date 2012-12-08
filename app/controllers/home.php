<?php
class home {
  function index() {
    $tpl = newTpl();
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
  		$tpl->results = json_decode($results);
  		$tpl->display("home/get_movies.tpl.php");
  	}
  }

}
