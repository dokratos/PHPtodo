<?php

define('APP_PATH',  dirname(__FILE__) . '/../');

require('config.php');
require('functions.php');
require('data/data.class.php');
// require('data/file_functions.php');
require('app/data/dataprovider.class.php');
require('data/mysqldata.class.php');

Data::initialize(new MySqlData(CONFIG['db']));