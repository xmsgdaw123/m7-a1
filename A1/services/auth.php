<?php

include_once '../repositories/user.php';
include_once '../utils/session.php';

class AuthService {
  private static $userRepository = null;
  
  public function __construct() {
    self::$userRepository = new UserRepository();
  }

  public function handleLogin(string $inputUsername, string $inputPassword): array {
    $currentUser = self::$userRepository->getUser($inputUsername);

    $rows = $currentUser['rows'];
    $userId = (int)$currentUser['id'];
    $hashedPassword = $currentUser['hashedPassword'];

    if ($rows < 1) return array('error' => 'Usuario no encontrado o contraseña incorrecta');

    $verifiedPassword = password_verify($inputPassword, $hashedPassword);

    if (!$verifiedPassword) return array('error' => 'Usuario no encontrado o contraseña incorrecta');

    updateSession($userId, $inputUsername);
    return array(
      'id' => $userId,
      'username' => $inputUsername
    );
  }

  public function handleSignin(string $inputUsername, string $inputPassword): array {
    $currentUser = self::$userRepository->getUser($inputUsername);

    $rows = $currentUser['rows'];

    if ($rows >= 1) return array('error' => 'El usuario ya existe');

    $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
    $id = self::$userRepository->createUser($inputUsername, $hashedPassword);

    updateSession($id, $inputUsername);
    return array(
      'id' => $id,
      'username' => $inputUsername
    );
  }

  public function handleLogout() {
    deleteSession();
  }
}
