<?php
include_once '../utils/http.php';
include_once '../services/auth.php';

$operation = filter_input(INPUT_POST, 'operation');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if (!isset($operation)) {
  sendHttpResponse('error', 'Falta el código de la operación');
  exit();
}

if (!isset($username) or !isset($password)) {
  sendHttpResponse('error', 'Faltan las credenciales de inicio de sesión');
  exit();
}

$authService = new AuthService();

if ($operation === 'login') {
  $data = $authService->handleLogin($username, $password);
} else {
  $data = $authService->handleSignin($username, $password);
}

if (array_key_exists('error', $data)) {
  sendHttpResponse('error', $data['error']);
} else {
  header('Location: ../dashboard.php');
  // sendHttpResponse('success', json_encode($data));
}