
'use strict';

var fs = require('fs');

const session_path = __dirname  + '/../storage/framework/sessions';
const fire_time = new Date();

fs.readdir(session_path, function (err, files) {
    if (err) {
        console.error(err);
        return;
    }
    files.shift();
    for (var x in files) {
        var path = session_path + '/' + files[x];
        fs.stat(path, function (err, stats) {
            if (err) {
                console.log(err);
                return null;
            }
            if ((fire_time - stats.mtime) > 3600) {
                fs.unlink(path);
            }
        });
    }

});