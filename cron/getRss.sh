#! /bin/bash
path2cakephp='/var/www/html/app/Console/cake.php'
path2php='/usr/local/bin/php'

eval ${path2php} ${path2cakephp} $1 $2 $3 >> ~/.getrss
