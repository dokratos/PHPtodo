<?php

require('./app/app.php');

if (is_get()) {
  $key = sanitize($_GET['key']);

  if (empty($key)) {
    die();
  }

  $todo = get_todo($key);
  view('edit', $todo);
}

if (is_post()) {
  $todo = sanitize($_POST['todo']);
  $original_todo = sanitize(($_POST['original-todo']));

  if (!empty($todo)) {
    update_todo($original_todo, $todo);
    redirect('index.php');
  }
}