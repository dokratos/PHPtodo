<?php

class Data {
  static private $ds;
  static public function initialize($data_provider) {
    return self::$ds = $data_provider;
  }

  static public function get_todos() {
    return self::$ds->get_todos();
  }
  static public function get_todo($todo) {
    return self::$ds->get_todo($todo);
  }
  static public function add_todo($todo) {
    return self::$ds->add_todo($todo);
  }
  static public function update_todo($original_todo, $new_todo) {
    return self::$ds->update_todo($original_todo, $new_todo);
  }
  static public function delete_todo($todo) {
    return self::$ds->delete_todo($todo);
  }
}