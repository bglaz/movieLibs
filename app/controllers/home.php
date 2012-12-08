<?php
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
    $data = <<<EOF
    {"rating":7.6,"genres":["Adventure","Western"],"rated":"PG","filming_locations":"Almer\u00eda Railway Station, Almer\u00eda, Andaluc\u00eda, Spain","language":["Italian","Spanish"],"plot":"In Mexico at the time of the Revolution, Juan, the leader of a bandit family, meets John Mallory, an IRA explosives expert on the run from the British. Seeing John's skill with explosives, Juan decides to persuade him to join the bandits in a raid on the great bank of Mesa Verde. John in the meantime has made contact with the revolutionaries, and intends to use his dynamite in their service.","runtime":["157 min","USA: 120 min (initial US release)","USA: 138 min","USA: 154 min (Laserdisc version)"],"poster":"http:\/\/ia.media-imdb.com\/images\/M\/MV5BMTY5Mjg3MzY4NV5BMl5BanBnXkFtZTcwNTM3MTc0MQ@@._V1._SY317_CR9,0,214,317_.jpg","imdb_url":"http:\/\/www.imdb.com\/title\/tt0067140\/","title":"Gi\u00f9 la testa","writers":["Sergio Leone","Sergio Donati"],"imdb_id":"tt0067140","directors":["Sergio Leone"],"rating_count":14340,"actors":["Rod Steiger","James Coburn","Romolo Valli","Maria Monti","Rik Battaglia","Franco Graziosi","Antoine Saint-John","Giulio Battiferri","Poldo Bendandi","Omar Bonaro","Roy Bosier","John Frederick","Amato Garbini","Michael Harvey","Biagio La Rocca"],"also_known_as":["A Fistful of Dynamite"],"year":1971,"country":["Italy"],"type":"M","release_date":19711020}
EOF;

  	$data = json_decode($data,true);

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
  	$tpl->display("home/do_madlib.tpl.php");
  }

  function finish_madlib() {

  }

}
