
'use strict';

var es = require('elasticsearch');
var mysql = require('mysql');

var client = new es.Client({
    host: 'localhost:9200',
    log: 'trace'
});