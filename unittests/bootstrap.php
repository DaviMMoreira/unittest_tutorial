<?php
require_once __DIR__.'/../vendor/autoload.php';

function setupTestDb()
{
    echo 'Setting up test database' . PHP_EOL;
    $dbAdapter = new \Hairy\Lib\Dbadapter();
    $dbAdapter->query('DROP DATABASE tek_test');
    $dbAdapter->query('CREATE DATABASE tek_test');
    exec('mysqldump -h localhost -u tek -ptek --no-data tek | mysql -h localhost -u tek -ptek tek_test');
}

setupTestDb();
\Hairy\Lib\Registry::set('db', 'tek_test');