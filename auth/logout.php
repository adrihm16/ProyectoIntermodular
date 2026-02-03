<?php
/**
 * Logout Handler
 * Destroys session and clears cookies
 */

require_once __DIR__ . '/../includes/auth.php';

// Clear user session
clearUserSession();

// Destroy the entire session
session_destroy();

// Redirect to home page
redirect('index.php');
?>
