
#! /bin/bash
cd /home/masato/2chmatomeru/app/webroot/js/
cat jquery-1.7.2.js all.js static.js > combine.js
docker run --rm --user 1000 -v /home/masato/2chmatomeru/app/webroot/js:/home/masato/2chmatomeru/app/webroot/js -w /home/masato/2chmatomeru/app/webroot/js openjdk:7 java -jar compiler.jar --js combine.js --js_output_file combine.min.js
gzip -k -f combine.min.js