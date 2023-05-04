<?php

require('app/app.php');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

function is_post() {
  return $_SERVER['REQUEST_METHOD'] === 'POST';
}

if (is_post()) {
  // $todo = sanitize($_POST['todo']);
  echo('there was a request');
  if (empty($todo)) {
    // TODO
  } else {
    Api::add_todo($todo);
    // redirect('index.php');
  }
}


function getRequest() {
  $data = Api::get_todos();
  // $connection = new DB();
  // $db = $connection->connect();

  // if ($db == null) {
  //     return [];
  // }

  // $query = $db->query('SELECT * FROM todos');
  // $data = $query->fetchAll(PDO::FETCH_CLASS, 'TodoClass');

  // $query = null;
  // $db = null;

  return json_encode($data);
};

function writeToFile() {
  $filename = 'data.json';
  $json = getRequest();

  if (!file_exists($filename)) {
    $json = file_put_contents($filename, $json);
  } else {
    $json = file_get_contents($filename);
  }

  return $json;
}

echo(writeToFile());