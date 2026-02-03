<?php
// Include auth helper (also starts session and loads config)
require_once __DIR__ . '/auth.php';

// Check remember me cookie for auto-login
checkRememberMe($pdo);

// Get current user if logged in
$currentUser = getCurrentUser();

// Set default page title if not defined
if (!isset($pageTitle)) {
    $pageTitle = "Synapse";
}
// Set default page styles if not defined
if (!isset($pageStyles)) {
    $pageStyles = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: "Poppins", sans-serif;
    }
    <?php echo $pageStyles; ?>
  </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col relative">
  <!-- Simple Header -->
  <header class="w-full bg-gradient-to-r from-[#004689] to-[#002F5C] text-white py-4 px-6 shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <a href="<?php echo BASE_URL; ?>index.php" class="font-extrabold text-2xl tracking-wide flex items-center gap-2">
        <span class="text-white">
          <svg class="w-10 h-10">
            <use xlink:href="<?php echo BASE_URL; ?>assets/sprite.svg#icon-main" />
          </svg>
        </span>
        SYNAPSE
      </a>
      <div class="flex items-center gap-4">
        <?php if ($currentUser): ?>
          <span class="text-sm font-medium"><?php echo htmlspecialchars($currentUser['nombre']); ?></span>
          <a href="<?php echo BASE_URL; ?>auth/logout.php" class="text-white/80 hover:text-white transition text-sm font-medium">
            Cerrar sesión
          </a>
        <?php else: ?>
          <a href="<?php echo BASE_URL; ?>index.php" class="text-white/80 hover:text-white transition text-sm font-medium">
            Volver a la tienda
          </a>
        <?php endif; ?>
      </div>
    </div>
  </header>
