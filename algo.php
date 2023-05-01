<?php

function toWeirdCase($string) {
  $exploded = explode(' ', $string);
  $weirdArray = [];
  foreach ($exploded as $word) {
    $weirdWord = '';
    for ($key = 0; $key < strlen($word); $key++){
      if ($key == 0 || $key % 2 == 0) {
        $weirdWord = $weirdWord . strtoupper($word[$key]);
      } else {
        $weirdWord = $weirdWord . strtolower($word[$key]);
      }
    }
    $weirdArray[] = $weirdWord;
  };

  $string = implode(' ', $weirdArray);
  echo $string;
}

toWeirdCase('hello world');