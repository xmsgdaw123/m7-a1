<?php
include_once '../services/auth.php';
include_once '../utils/http.php';

$authService = new AuthService();
$authService->handleLogout();

header('Location: ../index.php');