<?php

require('./app/app.php');

if (is_get()) {
  $key = sanitize($_GET['key']);

  if (empty($key)) {
    die();
  }

  $todo = Data::get_todo($key);
  view('delete', $todo);
}

if (is_post()) {
  $todo = sanitize($_POST['todo']);

  if (!empty($todo)) {
    Data::delete_todo($todo);
    redirect('index.php');
  }
}