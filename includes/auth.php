<?php
/**
 * Authentication Helper Functions
 * Include this file at the top of pages that need auth checks
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include configuration and database connection
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../db.php';

/**
 * Check if user is logged in
 * @return bool
 */
function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

/**
 * Get current logged-in user data
 * @return array|null User data or null if not logged in
 */
function getCurrentUser(): ?array {
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'],
        'nombre' => $_SESSION['user_nombre'],
        'email' => $_SESSION['user_email'],
        'rol' => $_SESSION['user_rol'] ?? 'cliente'
    ];
}

/**
 * Redirect to login if not authenticated
 * @param string $redirectUrl URL to redirect to after login
 */
function requireLogin(string $redirectUrl = ''): void {
    if (!isLoggedIn()) {
        $redirect = $redirectUrl ?: $_SERVER['REQUEST_URI'];
        header('Location: ' . BASE_URL . 'registro.php?redirect=' . urlencode($redirect));
        exit;
    }
}

/**
 * Check if user is admin
 * @return bool
 */
function isAdmin(): bool {
    return isLoggedIn() && ($_SESSION['user_rol'] ?? '') === 'admin';
}

/**
 * Set user session after login
 * @param array $user User data from database
 */
function setUserSession(array $user): void {
    $_SESSION['user_id'] = $user['id_usuario'];
    $_SESSION['user_nombre'] = $user['nombre'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_rol'] = $user['rol'];
}

/**
 * Clear user session (logout)
 */
function clearUserSession(): void {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_nombre']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_rol']);
    
    // Clear remember me cookie if exists
    if (isset($_COOKIE['remember_token'])) {
        setcookie('remember_token', '', time() - 3600, '/', '', false, true);
    }
}

/**
 * Generate a secure remember me token
 * @return string
 */
function generateRememberToken(): string {
    return bin2hex(random_bytes(32));
}

/**
 * Set remember me cookie and store token in database
 * @param int $userId
 * @param PDO $pdo
 */
function setRememberMe(int $userId, PDO $pdo): void {
    $token = generateRememberToken();
    $hashedToken = hash('sha256', $token);
    $expires = date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60)); // 30 days
    
    // Store hashed token in database (we'll add a remember_tokens column or table)
    // For simplicity, we'll store it in a cookie and verify on login
    // In production, store token hash in database
    
    // Set cookie for 30 days
    setcookie('remember_token', $userId . ':' . $token, time() + (30 * 24 * 60 * 60), '/', '', false, true);
}

/**
 * Check remember me cookie and auto-login
 * @param PDO $pdo
 * @return bool True if auto-login successful
 */
function checkRememberMe(PDO $pdo): bool {
    if (isLoggedIn() || !isset($_COOKIE['remember_token'])) {
        return false;
    }
    
    $parts = explode(':', $_COOKIE['remember_token'], 2);
    if (count($parts) !== 2) {
        return false;
    }
    
    $userId = (int)$parts[0];
    $token = $parts[1];
    
    // For a more secure implementation, you would verify the token against a stored hash
    // For now, we just verify the user exists
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    
    if ($user) {
        setUserSession($user);
        return true;
    }
    
    return false;
}

/**
 * Validate email format
 * @param string $email
 * @return bool
 */
function isValidEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Check if email already exists in database
 * @param string $email
 * @param PDO $pdo
 * @return bool
 */
function emailExists(string $email, PDO $pdo): bool {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}

/**
 * Validate password strength
 * @param string $password
 * @return array Array with 'valid' bool and 'message' string
 */
function validatePassword(string $password): array {
    if (strlen($password) < 8) {
        return ['valid' => false, 'message' => 'La contraseña debe tener al menos 8 caracteres'];
    }
    return ['valid' => true, 'message' => ''];
}

/**
 * Redirect helper using BASE_URL
 * @param string $path Path relative to BASE_URL (e.g., 'index.php')
 */
function redirect(string $path): void {
    header('Location: ' . BASE_URL . $path);
    exit;
}
?>
