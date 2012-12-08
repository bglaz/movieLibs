var http = require("http");
var url = require("url");
var pos = require('pos');
var qs = require('querystring');

function posTag(text) {
	var results;
	var words = new pos.Lexer().lex(text);
	var taggedWords = new pos.Tagger().tag(words);
	for(var i in taggedWords) {
		;
	}
	return taggedWords;
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