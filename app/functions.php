<?php

function view($name, $model) {
  require("view/$name.view.php");
}

function redirect($url) {
  header("Location: $url");
  die();
}