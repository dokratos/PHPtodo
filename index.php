<?php

require("app/app.php");
$data = new DataProvider(CONFIG['data_file']);

view('index', $data->get_todos());


// var_dump($_SERVER["REQUEST_URI"]);

// $path = $_SERVER['DOCUMENT_ROOT'];
// echo $path;