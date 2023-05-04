<?php

require('DB.php');
require('TodoClass.class.php');

class Api {
  public static function get_todos() {
    $connection = new DB();
    $db = $connection->connect();
  
    if ($db == null) {
        return [];
    }
  
    $query = $db->query('SELECT * FROM todos');
    $data = $query->fetchAll(PDO::FETCH_CLASS, 'TodoClass');
  
    $query = null;
    $db = null;
  
    return json_encode($data);
  }

  public static function get_todo($todo) {
    $connection = new DB();
    $db = $connection->connect();

    if ($db == null) {
      return [];
    }

    $query = 'SELECT * FROM todos WHERE id = :id';
    $smt = $db->prepare($query);

    $smt->execute([
      ':id' => $todo,
    ]);

    $data = $smt->fetchAll(PDO::FETCH_CLASS, 'TodoClass');

    $smt = null;
    $db = null;

    return $data[0];

  }

  public static function add_todo($todo) {
    $connection = new DB();
    $db = $connection->connect();

    if ($db == null) {
      return [];
    }

    $query= 'INSERT INTO todos (description) VALUE (:description)';

    $smt = $db->prepare($query);

    $smt->execute([
        ':description' => $todo,
    ]);

    $smt = null;
    $db = null;
  }

  public static function update_todo($oridinal_todo, $new_todo) {
    $connection = new DB();
    $db = $connection->connect();

    if ($db == null) {
      return [];
    }

    $query= 'UPDATE todos SET description = :description WHERE id = :id';

    $smt = $db->prepare($query);

    $smt->execute([
        ':description' => $new_todo,
        ':id' => $oridinal_todo
    ]);

    $smt = null;
    $db = null;
  }

  public static function delete_todo($todo) {
    $connection = new DB();
    $db = $connection->connect();

    if ($db == null) {
      return [];
    }

    $query = 'DELETE FROM todos WHERE id = :id';
    $smt = $db->prepare($query);

    $smt->execute([
      ':id' => $todo,
    ]);

    $smt = null;
    $db = null;

  }
}