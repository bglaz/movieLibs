var http = require("http");
var url = require("url");
var pos = require('pos');
var qs = require('querystring');

var parts = {
	JJ: 	"Adjective",
	JJR: 	"-Er Adjective",
	JJS: 	"-Est Adjective",
	NN: 	"Noun",
	NNP: 	"Proper Noun",
	NNS: 	"Plural Noun",
	RB: 	"Adverb",
	UH: 	"Interjection",
	VB: 	"Verb",
	VBD: 	"Verb (past tense)",
	VBG: 	"-Ing Verb",
	VBZ: 	"Verb (present tense)",
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function posTag(text) {
	var results = {orig_text: text, data: Array()};

	var words = new pos.Lexer().lex(text);
	var taggedWords = new pos.Tagger().tag(words);
	var candidates = Array();

	for(var i in taggedWords) {

		//check to see if word matches a part of speech that we want
		if(parts[taggedWords[i][1]]) {
			candidates.push({
				word: 	taggedWords[i][0],
				pos: 	parts[taggedWords[i][1]]
			});
		}
	}

	//get a percentage of the total words to use for mad lib
	var word_count = Math.min(25,Math.floor(candidates.length * .20));

	var indexes = Array();
	while(indexes.length < word_count) {
		var num = getRandomInt(0,candidates.length);
		if(indexes.indexOf(num) === -1) {
			indexes.push(num);
		}
	}
	
	for(var i = 0, len = indexes.length; i < len; i++) {
		results['data'].push(candidates[indexes[i]]);
	}

	return results;
}

http.createServer(function(request, response) {

	if(request.method == 'POST') {
	    request.on('data', function (data) {
	    	var body = '';
	    	body += data;
	        if (body.length > 1e6) {
	        	request.connection.destroy();
	        }
	        var data = qs.parse(body);
	        var results = posTag(data['text']);
	        response.writeHead(200, {'Cotent-type': 'application/json'});
			response.end(JSON.stringify(results));
	    });
	}
}).listen(8080);