<?php

require('./app/app.php');

if (is_post()) {
  $todo = sanitize($_POST['todo']);

  if (empty($todo)) {
    // TODO
  } else {
    Data::add_todo($todo);
    redirect('index.php');
  }
}

view('create');