<?php

require('todo.class.php');

class DataProvider {
    public $file_path;
    function __construct($file_path) {
        $this->file_path = $file_path;
    }

    public function get_data() {
      $json = '';
    
      if (!file_exists($this->file_path)) {
        $json = file_put_contents($this->file_path, '');
      } else {
        $json = file_get_contents($this->file_path);
      }
    
      return $json;
    }

    public function set_data($items) {
      $file_name = $this->file_path;
      $json = json_encode($items);
    
      file_put_contents($file_name, $json);
    }

    public function get_todos() {
      $json = $this->get_data();
      return json_decode($json);
    }
    
    public function get_todo($todo) {
      $todos = $this->get_todos();

      foreach ($todos as $item) {
        if ($item->todo == $todo) {
          return $item;
        }
      }
    
      return false;
    }
    
    public function search_todo($search) {
            
    }
    
    public function add_todo($todo) {
      $todos = $this->get_todos();

      $todos[] = new Todo($todo);
    
      $this->set_data($todos);
    }
    
    public function update_todo($original_todo, $new_todo) {
      $todos = $this->get_todos();

      foreach ($todos as $item) {
        if ($item->todo == $original_todo) {
          $item->todo = $new_todo;
          break;
        }
      }
    
      $this->set_data($todos);
    }
    
    public function delete_todo($todo) {
      $todos = $this->get_todos();

      for ($i = 0; $i < count($todos); $i++) {
        if ($todos[$i]->todo === $todo) {
          unset($todos[$i]);
          break;
        }
      }
    
      $new_todos = array_values($todos);
    
      $this->set_data($new_todos);
    }
}