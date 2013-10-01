<?php
require_once __DIR__.'/../vendor/autoload.php';

//function setupTestDb()
//{
//    echo 'Setting up test database' . PHP_EOL;
//    $dbAdapter = new \Hairy\Lib\Dbadapter();
//    $dbAdapter->query('DROP DATABASE dbdemo_test');
//    $dbAdapter->query('CREATE DATABASE dbdemo_test');
//    exec('mysqldump -h localhost -u dbdemo -pdbdemo --no-data dbdemo | mysql -h localhost -u dbdemo -pdbdemo dbdemo_test');
//}
//
//setupTestDb();
//\Hairy\Lib\Registry::set('db', 'dbdemo_test');