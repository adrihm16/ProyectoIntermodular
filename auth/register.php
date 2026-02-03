<?php
/**
 * Registration Handler
 * Processes POST requests from the registration form
 */

require_once __DIR__ . '/../includes/auth.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('registro.php');
}

$errors = [];
$success = false;

// Get form data
$nombre = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$passwordConfirm = $_POST['password_confirm'] ?? '';
$acceptedTerms = isset($_POST['terms']);

// Validation
if (empty($nombre)) {
    $errors[] = 'El nombre es obligatorio';
}

if (empty($email)) {
    $errors[] = 'El email es obligatorio';
} elseif (!isValidEmail($email)) {
    $errors[] = 'El formato del email no es válido';
} elseif (emailExists($email, $pdo)) {
    $errors[] = 'Este email ya está registrado';
}

$passwordValidation = validatePassword($password);
if (!$passwordValidation['valid']) {
    $errors[] = $passwordValidation['message'];
}

if ($password !== $passwordConfirm) {
    $errors[] = 'Las contraseñas no coinciden';
}

if (!$acceptedTerms) {
    $errors[] = 'Debes aceptar los términos y condiciones';
}

// If no errors, create the user
if (empty($errors)) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare('
            INSERT INTO usuarios (nombre, email, contrasena, rol) 
            VALUES (?, ?, ?, ?)
        ');
        $stmt->execute([$nombre, $email, $hashedPassword, 'cliente']);
        
        // Get the new user
        $userId = $pdo->lastInsertId();
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
        
        // Auto-login the user
        setUserSession($user);
        
        $success = true;
        
        // Redirect to home or previous page
        $redirectPath = $_POST['redirect'] ?? 'index.php';
        redirect($redirectPath);
        
    } catch (PDOException $e) {
        $errors[] = 'Error al crear la cuenta. Por favor, inténtalo de nuevo.';
        // Log error in production: error_log($e->getMessage());
    }
}

// If there are errors, store them in session and redirect back
$_SESSION['register_errors'] = $errors;
$_SESSION['register_old'] = [
    'name' => $nombre,
    'email' => $email
];
redirect('registro.php');
?>
