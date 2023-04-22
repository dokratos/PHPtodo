<?php

require('todo.class.php');

class DataProvider {
  public $source;
    function __construct($source) {
        $this->source = $source;
    }

    public function get_todos() {
        
    }
    
    public function get_todo($todo) {
        
    }
    
    public function search_todo($search) {
            
    }
    
    public function add_todo($todo, $description) {
        
    }
    
    public function update_todo($original_todo, $new_todo, $description) {
        
    }
    
    public function delete_todo($todo) {
        
    }
}