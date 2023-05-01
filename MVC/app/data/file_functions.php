<?php

require('todo.class.php');
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

function add_todo($todo) {
  $todos = get_todos();

  $todos[] = new Todo($todo);

  // $arr = (object) [
  //   "todo" => $todo
  // ];

  // $todos[] = $arr;

  set_data($todos);
}

function update_todo($original_todo, $new_todo) {
  $todos = get_todos();

  foreach ($todos as $item) {
    if ($item->todo == $original_todo) {
      $item->todo = $new_todo;
      break;
    }
  }

  set_data($todos);
}

function delete_todo($todo) {
  $todos = get_todos();

  for ($i = 0; $i < count($todos); $i++) {
    if ($todos[$i]->todo === $todo) {
      unset($todos[$i]);
      break;
    }
  }

  $new_todos = array_values($todos);

  set_data($new_todos);
}

function set_data($items) {
  $file_name = CONFIG['data_file'];
  $json = json_encode($items);

  file_put_contents($file_name, $json);
}