'use strict';

var http = require('http');
var xml2js = require('xml2js');

var parser = new xml2js.Parser();

const rss = ['http://rthk.hk/rthk/news/rss/c_expressnews_clocal.xml'];

for (var x in rss) {
    http.get(rss[x]).on('response', function (response) {
        var buffer = '';
        response.on('data', function (chunk) {
            buffer += chunk;
        });
        response.on('end', function () {
            parser.parseString(buffer, function (err, result) {
                console.dir(result);
                console.log('Done');
            });
        });
    });
}
