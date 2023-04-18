<?php
    define('BASEDIR', dirname(__FILE__, 2));
    define('VIEWS', BASEDIR . '/View/modules/');

    $_ENV['db']['host'] = "localhost:3307";
    $_ENV['db']['user'] = "etecjau";
    $_ENV['db']['pass'] = "root";
    $_ENV['db']['dbname'] = "bancodigital";