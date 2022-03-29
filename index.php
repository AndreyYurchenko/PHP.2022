<?php

$dbh = new PDO('pgsql:host=db;port=5432;', 'root', 'secret');

phpinfo();
var_dump($dbh);