<?php

function view($name, $model = '') {
  require("view/$name.view.php");
}

function redirect($url) {
  header("Location: $url");
  die();
}

function is_post() {
  return $_SERVER['REQUEST_METHOD'] === 'POST';
}
function is_get() {
  return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function sanitize($value) {
  $temp = htmlspecialchars(trim($value));

  if ($temp === false) {
    return '';
  }

  return $temp;
}