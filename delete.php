<?php

require('./app/app.php');

if (is_get()) {
  $key = sanitize($_GET['key']);

  if (empty($key)) {
    die();
  }

  $todo = get_todo($key);
  view('delete', $todo);
}

if (is_post()) {
  $todo = sanitize($_POST['todo']);

  if (!empty($todo)) {
    delete_todo($todo);
    redirect('index.php');
  }
}