<?php

function get_data() {
  $file_name = CONFIG['data_file'];

  $json = '';

  if (!file_exists($file_name)) {
    $json = file_put_contents($file_name, '');
    // $handle = fopen($file_name, 'w+');
    // fclose($handle);
  } else {
    $json = file_get_contents($file_name);
    // $handle = fopen($file_name, 'r');
    // $json = fread($handle, filesize($file_name));
    // fclose($handle);
  }

  return $json;
}

function get_todos() {
  $json = get_data();
  return json_decode($json);
}

function get_todo($todo) {
  $todos = get_todos();

  foreach ($todos as $item) {
    if ($item->todo == $todo) {
      return $item;
    }
  }

  return false;
}