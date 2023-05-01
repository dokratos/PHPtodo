<?php


require('TodoClass.class.php');


class MySqlData {
  public $source;
  function __construct($source) {
      $this->source = $source;
  }

  public function get_todos() {
    $db = $this->connect();

    if ($db == null) {
        return [];
    }

    $query = $db->query('SELECT * FROM todos');

    $data = $query->fetchAll(PDO::FETCH_CLASS, 'TodoClass');

    $query = null;
    $db = null;

    return $data;
  }

  public function get_todo($todo) {
    $db = $this->connect();

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

  public function add_todo($todo) {
    $db = $this->connect();

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

  public function update_todo($oridinal_todo, $new_todo) {
    $db = $this->connect();

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

  public function delete_todo($todo) {
    $db = $this->connect();

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

  private function connect() {
    try {
        return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
    } catch (PDOException $e) {
        return null;
    }
}
}