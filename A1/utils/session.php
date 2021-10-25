<?php

session_start();

function getUserId() {
  return $_SESSION['id'];
}

function isLoggedIn() {
  return array_key_exists('loggedIn', $_SESSION);
}

function updateSession(int $id, string $username) {
  $_SESSION['id'] = $id;
  $_SESSION['loggedIn'] = true;
  $_SESSION['username'] = $username;

  $expiryTime = time() + 60 * 60 * 24 * 7;
  setcookie('lastVisit', date("Y-m-d H:i:s"), $expiryTime, '/');
}

function deleteSession() {
  session_destroy();
  setcookie('lastVisit', null, -1, '/');
}
