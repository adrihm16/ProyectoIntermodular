<?php
/**
 * Login Handler
 * Processes POST requests from the login form
 */

require_once __DIR__ . '/../includes/auth.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$errors = [];

// Get form data
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$rememberMe = isset($_POST['remember']);

// Validation
if (empty($email)) {
    $errors[] = 'El email es obligatorio';
} elseif (!isValidEmail($email)) {
    $errors[] = 'El formato del email no es válido';
}

if (empty($password)) {
    $errors[] = 'La contraseña es obligatoria';
}

// If no validation errors, attempt login
if (empty($errors)) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['contrasena'])) {
            // Login successful
            setUserSession($user);
            
            // Set remember me cookie if requested
            if ($rememberMe) {
                setRememberMe($user['id_usuario'], $pdo);
            }
            
            // Redirect to previous page or home
            $redirectPath = $_POST['redirect'] ?? 'index.php';
            // Clean the redirect path - if it starts with BASE_URL, use it as-is
            if (strpos($redirectPath, '/') === 0) {
                header('Location: ' . $redirectPath);
            } else {
                redirect($redirectPath);
            }
            exit;
            
        } else {
            $errors[] = 'Email o contraseña incorrectos';
        }
        
    } catch (PDOException $e) {
        $errors[] = 'Error al iniciar sesión. Por favor, inténtalo de nuevo.';
        // Log error in production: error_log($e->getMessage());
    }
}

// If there are errors, store them in session and redirect back
$_SESSION['login_errors'] = $errors;
$_SESSION['login_old'] = ['email' => $email];

// Redirect back to the referring page or home
$referer = $_SERVER['HTTP_REFERER'] ?? null;
if ($referer) {
    header('Location: ' . $referer);
} else {
    redirect('index.php');
}
exit;
?>
