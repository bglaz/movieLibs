<?php
class home {
  function index() {
    $tpl = newTpl();
    $tpl->display("home/index.tpl.php");
  }

  function getMovies() {
  	if(!empty($_POST)) {
  		$query = mysql_real_escape_string($_POST['movie_title']);
  		$url = "http://imdbapi.org/?title=$url&type=json&plot=full&episode=1&limit=5&yg=0&mt=none&lang=en-US&offset=&aka=simple&release=simple";

  		$ch = curl_init($url);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  		$results = json_encode(curl_exec($ch),true);
  		pr($results);

  	}
  }

}
