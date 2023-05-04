<?php

class DB {
  private $server = 'localhost';
  private $db_name = 'ToDo';
  private $port = '8889';
  private $db_user = 'root';

  private $db_password = 'root';

  public function connect() {
    try {
        return new PDO('mysql:host=' .$this->server .';dbname=' . $this->db_name, $this->db_user, $this->db_password);
    } catch (PDOException $e) {
        return null;
    }
  }

}