<?php
$pageTitle = "Registro - Synapse";
include 'includes/header-simple.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

// Get registration errors from session if any
$registerErrors = $_SESSION['register_errors'] ?? [];
$registerOld = $_SESSION['register_old'] ?? [];
unset($_SESSION['register_errors'], $_SESSION['register_old']);
?>

    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 font-sans relative">
        <div id="particles-js" class="absolute inset-0 z-0"></div>

        <div
            class="max-w-md w-full space-y-8 bg-white/90 backdrop-blur-sm p-10 rounded-3xl shadow-xl border border-white/50 opacity-95 relative z-10">
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-bold text-gray-900">
                    Crear cuenta
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    ¿Ya tienes cuenta?
                    <a href="<?php echo BASE_URL; ?>index.php" class="font-semibold text-[#004689] hover:text-[#002F5C]">Inicia sesión</a>
                </p>
            </div>

            <?php if (!empty($registerErrors)): ?>
            <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                <ul class="text-sm text-red-600 space-y-1">
                    <?php foreach ($registerErrors as $error): ?>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <?php echo htmlspecialchars($error); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="<?php echo BASE_URL; ?>auth/register.php" method="POST">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
                        <input id="name" name="name" type="text" required
                            value="<?php echo htmlspecialchars($registerOld['name'] ?? ''); ?>"
                            class="appearance-none relative block w-full px-4 py-3.5 bg-gray-50/50 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] focus:bg-white transition-all text-sm"
                            placeholder="Tu nombre">
                    </div>

                    <div>
                        <label for="email-register" class="block text-sm font-medium text-gray-700 mb-1">Correo
                            electrónico</label>
                        <input id="email-register" name="email" type="email" autocomplete="email" required
                            value="<?php echo htmlspecialchars($registerOld['email'] ?? ''); ?>"
                            class="appearance-none relative block w-full px-4 py-3.5 bg-gray-50/50 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] focus:bg-white transition-all text-sm"
                            placeholder="ejemplo@correo.com">
                    </div>

                    <div>
                        <label for="password-register" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <div class="relative">
                            <input id="password-register" name="password" type="password" required
                                class="appearance-none relative block w-full px-4 py-3.5 bg-gray-50/50 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] focus:bg-white transition-all text-sm pr-12"
                                placeholder="Mínimo 8 caracteres">
                            <button type="button" class="toggle-password absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-gray-600" data-target="password-register">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path class="eye" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path class="eye" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path class="eye-off hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Confirmar
                            contraseña</label>
                        <div class="relative">
                            <input id="password-confirm" name="password_confirm" type="password" required
                                class="appearance-none relative block w-full px-4 py-3.5 bg-gray-50/50 border border-gray-200 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] focus:bg-white transition-all text-sm pr-12"
                                placeholder="Repite tu contraseña">
                            <button type="button" class="toggle-password absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-gray-600" data-target="password-confirm">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path class="eye" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path class="eye" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    <path class="eye-off hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex items-start">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-[#004689] focus:ring-[#004689] border-gray-300 rounded mt-0.5">
                    <label for="terms" class="ml-2 block text-sm text-gray-600">
                        Acepto los <a href="#" class="text-[#004689] hover:underline font-medium">términos y
                            condiciones</a> y la <a href="#" class="text-[#004689] hover:underline font-medium">política
                            de privacidad</a>
                    </label>
                </div>

                <button type="submit"
                    class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-gradient-to-r from-[#004689] to-[#002F5C] hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#004689] transition-all shadow-lg shadow-[#004689]/30 hover:shadow-xl hover:shadow-[#004689]/40">
                    Crear cuenta
                </button>
            </form>

            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-500">O regístrate con</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button type="button"
                    class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="#34A853"
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="#FBBC05"
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="#EA4335"
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                    Google
                </button>
                <button type="button"
                    class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12.152 6.896c-.948 0-2.415-1.078-3.96-1.04-2.04.027-3.91 1.183-4.961 3.014-2.117 3.675-.546 9.103 1.519 12.09 1.013 1.454 2.208 3.09 3.792 3.039 1.52-.065 2.09-.987 3.935-.987 1.831 0 2.35.987 3.96.948 1.637-.026 2.676-1.48 3.676-2.948 1.156-1.688 1.636-3.325 1.662-3.415-.039-.013-3.182-1.221-3.22-4.857-.026-3.04 2.48-4.494 2.597-4.559-1.429-2.09-3.623-2.324-4.39-2.376-2-.156-3.675 1.09-4.61 1.09zM15.53 3.83c.843-1.012 1.4-2.427 1.245-3.83-1.207.052-2.662.805-3.532 1.818-.78.896-1.454 2.338-1.273 3.714 1.338.104 2.715-.688 3.559-1.701" />
                    </svg>
                    Apple
                </button>
            </div>
        </div>
    </main>

    <!-- Page-specific scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Particles background
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof particlesJS !== 'undefined') {
                particlesJS('particles-js', {
                    particles: {
                        number: { value: 125, density: { enable: true, value_area: 800 } },
                        color: { value: '#004689' },
                        shape: { type: 'circle' },
                        opacity: { value: 0.7, random: true },
                        size: { value: 2.5, random: true },
                        line_linked: { enable: true, distance: 150, color: '#004689', opacity: 1, width: 1 },
                        move: { enable: true, speed: 2, direction: 'none', random: true, out_mode: 'out' }
                    },
                    interactivity: {
                        detect_on: 'canvas',
                        events: { onhover: { enable: true, mode: 'grab' }, onclick: { enable: true, mode: 'push' }, resize: true },
                        modes: { grab: { distance: 140, line_linked: { opacity: 1 } }, push: { particles_nb: 4 } }
                    },
                    retina_detect: true
                });
            }
        });

        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const eyePaths = this.querySelectorAll('.eye');
                const eyeOffPaths = this.querySelectorAll('.eye-off');

                if (input.type === 'password') {
                    input.type = 'text';
                    eyePaths.forEach(p => p.classList.add('hidden'));
                    eyeOffPaths.forEach(p => p.classList.remove('hidden'));
                } else {
                    input.type = 'password';
                    eyePaths.forEach(p => p.classList.remove('hidden'));
                    eyeOffPaths.forEach(p => p.classList.add('hidden'));
                }
            });
        });
    </script>
</body>

</html>