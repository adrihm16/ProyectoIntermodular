<?php
// Include auth helper (also starts session)
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

// Get login errors from session if any
$loginErrors = $_SESSION['login_errors'] ?? [];
$loginOld = $_SESSION['login_old'] ?? [];
unset($_SESSION['login_errors'], $_SESSION['login_old']);
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

<body class="bg-gray-50">
  <!--Header-->
  <header id="main-header" class="fixed top-0 left-0 w-full z-50 transition-transform duration-300 shadow-md font-sans">
    <div id="top-bar"
      class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-[#004689] to-[#002F5C] text-white shadow-md h-[72px]">
      <div class="flex items-center justify-between px-6 py-4 gap-4 h-full">
        <a href="<?php echo BASE_URL; ?>index.php" class="font-extrabold text-2xl tracking-wide flex items-center gap-2">
          <span class="text-white">
            <svg class="w-10 h-10">
              <use xlink:href="<?php echo BASE_URL; ?>assets/sprite.svg#icon-main" />
            </svg>
          </span>
          SYNAPSE
        </a>

        <div class="hidden md:flex flex-1 max-w-2xl mx-auto px-6">
          <div class="w-full flex">
            <input type="text" placeholder="Buscar..."
              class="w-full py-2 px-4 rounded-l-full text-gray-900 focus:outline-none" />
            <button class="bg-white px-4 rounded-r-full hover:bg-gray-100 transition">
              <svg class="w-6 h-6">
                <use href="<?php echo BASE_URL; ?>assets/sprite.svg#search-filled"></use>
              </svg>
            </button>
          </div>
        </div>

        <div class="flex items-center gap-6 text-xl">
          <div class="relative">
            <button id="user-menu-btn" class="hover:text-gray-200 transition focus:outline-none flex items-center gap-2">
              <svg class="w-10 h-10">
                <use xlink:href="<?php echo BASE_URL; ?>assets/sprite.svg#icon-user" />
              </svg>
              <?php if ($currentUser): ?>
                <span class="hidden md:inline text-sm font-medium"><?php echo htmlspecialchars($currentUser['nombre']); ?></span>
              <?php endif; ?>
            </button>

            <?php if ($currentUser): ?>
            <!-- User Menu Card (Logged In) -->
            <div id="login-card"
              class="absolute top-14 -right-10 w-72 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-6 transform origin-top-right transition-all duration-300 scale-95 opacity-0 pointer-events-none invisible z-[100] text-slate-800 font-sans">

              <!-- Arrow tooltip style -->
              <div class="absolute -top-2 right-12 w-4 h-4 bg-white/95 rotate-45 border-l border-t border-white/20">
              </div>

              <div class="text-center mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-[#004689] to-[#002F5C] rounded-full flex items-center justify-center mx-auto mb-3">
                  <span class="text-2xl font-bold text-white"><?php echo strtoupper(substr($currentUser['nombre'], 0, 1)); ?></span>
                </div>
                <h3 class="text-lg font-bold text-gray-900"><?php echo htmlspecialchars($currentUser['nombre']); ?></h3>
                <p class="text-xs text-gray-500"><?php echo htmlspecialchars($currentUser['email']); ?></p>
              </div>

              <div class="space-y-2 mb-4">
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition text-sm font-medium text-gray-700">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                  Mi perfil
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition text-sm font-medium text-gray-700">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                  </svg>
                  Mis pedidos
                </a>
                <?php if ($currentUser['rol'] === 'admin'): ?>
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-gray-100 transition text-sm font-medium text-[#004689]">
                  <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  Panel Admin
                </a>
                <?php endif; ?>
              </div>

              <div class="border-t border-gray-100 pt-4">
                <a href="<?php echo BASE_URL; ?>auth/logout.php"
                  class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl bg-red-50 text-red-600 font-semibold text-sm hover:bg-red-100 transition">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Cerrar sesión
                </a>
              </div>
            </div>

            <?php else: ?>
            <!-- Login Card (Not Logged In) -->
            <div id="login-card"
              class="absolute top-14 -right-10 w-80 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-8 transform origin-top-right transition-all duration-300 scale-95 opacity-0 pointer-events-none invisible z-[100] text-slate-800 font-sans">

              <!-- Arrow tooltip style -->
              <div class="absolute -top-2 right-12 w-4 h-4 bg-white/95 rotate-45 border-l border-t border-white/20">
              </div>

              <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-[#004689] mb-1">Bienvenido</h3>
                <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Inicia sesión en tu cuenta</p>
              </div>

              <?php if (!empty($loginErrors)): ?>
              <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl">
                <ul class="text-xs text-red-600 space-y-1">
                  <?php foreach ($loginErrors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endif; ?>

              <form class="space-y-4" action="<?php echo BASE_URL; ?>auth/login.php" method="POST">
                <div class="space-y-1">
                  <label class="block text-xs font-bold text-gray-600 ml-1 uppercase tracking-wider">Email</label>
                  <div class="relative">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($loginOld['email'] ?? ''); ?>"
                      class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] outline-none transition-all text-sm font-medium"
                      placeholder="nombre@email.com" required>
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                      </path>
                    </svg>
                  </div>
                </div>

                <div class="space-y-1">
                  <label class="block text-xs font-bold text-gray-600 ml-1 uppercase tracking-wider">Contraseña</label>
                  <div class="relative">
                    <input id="login-password" name="password" type="password"
                      class="w-full pl-10 pr-12 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] outline-none transition-all text-sm font-medium"
                      placeholder="••••••••" required>
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                      </path>
                    </svg>
                    <button type="button"
                      class="toggle-password absolute right-3 top-2.5 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors"
                      data-target="login-password">
                      <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path class="eye" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path class="eye" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        <path class="eye-off hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.051 10.051 0 014.13-5.253m2.47-1.423A9.947 9.947 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.059 10.059 0 01-3.69 4.836m-1.84 1.84a4 4 0 11-5.656-5.656" />
                        <path class="eye-off hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3l18 18" />
                      </svg>
                    </button>
                  </div>
                </div>

                <div class="flex items-center justify-between text-xs my-2">
                  <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#004689] focus:ring-[#004689]">
                    <span class="text-gray-500 group-hover:text-[#004689] transition">Recuérdame</span>
                  </label>
                  <a href="#" class="text-[#004689] font-semibold hover:underline">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit"
                  class="w-full bg-gradient-to-r from-[#004689] to-[#002F5C] text-white py-3 rounded-xl font-bold text-sm tracking-wide hover:shadow-lg hover:shadow-[#004689]/30 hover:-translate-y-0.5 transition-all duration-300 active:scale-95">
                  INICIAR SESIÓN
                </button>
              </form>

              <div class="mt-6 border-t border-gray-100 pt-4 text-center">
                <p class="text-xs text-gray-500 mb-3">¿No tienes una cuenta?</p>
                <a href="<?php echo BASE_URL; ?>registro.php"
                  class="block w-full py-2.5 rounded-xl border-2 border-[#004689]/10 text-[#004689] font-bold text-sm hover:bg-[#004689]/5 hover:border-[#004689] transition-all duration-300">
                  Crear cuenta nueva
                </a>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <a href="<?php echo BASE_URL; ?>carrito.php" class="relative hover:text-gray-200 transition">
            <svg class="w-10 h-10">
              <use xlink:href="<?php echo BASE_URL; ?>assets/sprite.svg#icon-cart" />
            </svg>
            <span
              class="absolute -top-2 -right-2 bg-red-500 text-[15px] font-bold px-2 rounded-full border-2 border-[#002F5C]">2</span>
          </a>
        </div>
      </div>
    </div>

    <!--Menu navbar-->
    <nav id="smart-nav"
      class="fixed top-[72px] left-0 w-full z-40 bg-[#001a33] text-white py-3 px-6 border-t border-white/10 transition-transform duration-300 translate-y-0">
      <div id="menu-toggle" class="flex items-center justify-between">
        <div class="flex items-center gap-3 cursor-pointer">
          <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
          </svg>
        </div>

        <div class="hidden lg:flex items-center gap-8 font-bold text-sm tracking-wider uppercase">
          <a href="#" class="flex items-center gap-1">
            BLACK FRIDAY
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
            </svg>
          </a>
          <a href="#" class="flex items-center gap-1">
            OUTLET HOGAR
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
            </svg>
          </a>
          <a href="#"> BLOG </a>
        </div>
      </div>
    </nav>
  </header>
  <div class="w-full h-[130px] bg-[#001a33]"></div>

  <!--Menu lateral-->
  <div id="menu-overlay" class="fixed inset-0 hidden transition-opacity duration-300 opacity-0">
  </div>

  <div id="sidebar-menu"
    class="fixed top-[72px] left-0 w-[280px] h-[calc(100vh-72px)] z-[70] bg-gradient-to-r from-[#004689] to-[#004688] text-white transform -translate-x-full transition-transform duration-300 shadow-2xl overflow-y-auto">
    <div class="flex justify-end p-6">
      <button id="close-menu" class="text-white/80 hover:text-white transition">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>
    <nav class="px-8 pb-10 space-y-6 text-lg font-medium">
      <?php if ($currentUser): ?>
      <div class="flex items-center gap-3 pb-4 border-b border-white/20">
        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
          <span class="font-bold"><?php echo strtoupper(substr($currentUser['nombre'], 0, 1)); ?></span>
        </div>
        <div>
          <p class="font-semibold"><?php echo htmlspecialchars($currentUser['nombre']); ?></p>
          <p class="text-xs text-white/70"><?php echo htmlspecialchars($currentUser['email']); ?></p>
        </div>
      </div>
      <?php endif; ?>
      
      <a href="<?php echo BASE_URL; ?>index.php" class="block hover:text-gray-200 transition">Inicio</a>
      <a href="<?php echo BASE_URL; ?>carrito.php" class="block hover:text-gray-200 transition">Carrito</a>
      <a href="#" class="block hover:text-gray-200 transition">Black Friday</a>
      <a href="<?php echo BASE_URL; ?>catalogo.php" class="block hover:text-gray-200 transition">Smartphones</a>
      <a href="#" class="block hover:text-gray-200 transition">Ordenadores</a>
      <a href="#" class="block hover:text-gray-200 transition">Tablets</a>
      <a href="#" class="block hover:text-gray-200 transition">Smartwatches</a>
      <a href="#" class="block hover:text-gray-200 transition">Electrodomésticos</a>
      <a href="#" class="block hover:text-gray-200 transition">Outlet hogar</a>
      <a href="#" class="block hover:text-gray-200 transition">Mundo Apple</a>
      <a href="#" class="block hover:text-gray-200 transition">Blog</a>

      <div class="border-t border-white/20 pt-4 mt-6">
        <?php if ($currentUser): ?>
        <a href="#" class="block hover:text-gray-200 transition mb-6">Mi cuenta</a>
        <a href="#" class="block hover:text-gray-200 transition mb-6">Mis pedidos</a>
        <a href="<?php echo BASE_URL; ?>auth/logout.php" class="block text-red-300 hover:text-red-200 transition">Cerrar sesión</a>
        <?php else: ?>
        <a href="<?php echo BASE_URL; ?>registro.php" class="block hover:text-gray-200 transition mb-6">Iniciar sesión</a>
        <a href="<?php echo BASE_URL; ?>registro.php" class="block hover:text-gray-200 transition">Crear cuenta</a>
        <?php endif; ?>
      </div>
    </nav>
  </div>
