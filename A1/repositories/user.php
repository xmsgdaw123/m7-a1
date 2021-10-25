<?php

include_once '../database/connection.php';

class UserRepository {
  public function __construct() {
  }

  public function getUser(string $username): array {
    global $mysqli;

    $query = 'SELECT id, hashedPassword FROM users WHERE username = ?';

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword);
    $stmt->store_result();
    $stmt->fetch();

    return array(
      'rows' => $stmt->num_rows,
      'id' => $id,
      'hashedPassword' => $hashedPassword
    );
  }

  public function getUserById(int $id): array {
    global $mysqli;

    $query = 'SELECT id, username FROM users WHERE id = ?';

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->bind_result($id, $username);
    $stmt->store_result();
    $stmt->fetch();

    return array(
      'id' => $id,
      'username' => $username
    );
  }

  public function createUser(string $username, string $hashedPassword): int {
    global $mysqli;

    $query = 'INSERT INTO users (username, hashedPassword) VALUES (?, ?)';

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $username, $hashedPassword);
    $stmt->execute();

    return $stmt->insert_id;
  }
}
