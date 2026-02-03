<?php
$pageTitle = "OnePlus 15 - Synapse";
include 'includes/header.php';
?>

    <main class="min-h-screen py-10 px-4 font-sans">

        <div class="max-w-[95%] mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12 items-stretch">
            <div
                class="lg:col-span-2 bg-white rounded-3xl p-8 shadow-md flex items-center justify-between relative h-full min-h-[500px]">
                <button id="prev-btn"
                    class="text-gray-300 hover:text-gray-800 text-4xl transition duration-200 px-2 z-10">
                    &#10094;
                </button>
                <div class="w-full flex justify-center absolute inset-0 items-center pointer-events-none">
                    <img id="product-img" src="./assets/ImagenOnePlus1.jpg" alt="One Plus 15"
                        class="max-h-[400px] object-contain pointer-events-auto transition-opacity duration-300">
                </div>
                <button id="next-btn"
                    class="text-gray-300 hover:text-gray-800 text-4xl transition duration-200 px-2 z-10">
                    &#10095;
                </button>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-md flex flex-col h-full justify-between">
                <div class="flex flex-col gap-6">
                    <h1 class="text-4xl font-semibold text-gray-900">One Plus 15</h1>

                    <div>
                        <h3 class="text-gray-500 font-medium mb-3">Color</h3>
                        <div id="color-options" class="flex gap-3 flex-wrap">
                            <div class="color-option border border-gray-200 rounded-lg px-4 py-3 flex items-center gap-2 cursor-pointer hover:border-gray-400 transition"
                                data-color="Infinite Black">
                                <span class="w-4 h-4 rounded-full bg-gray-900"></span>
                                <span class="text-sm font-medium">Infinite Black</span>
                            </div>
                            <div class="color-option border border-black ring-1 ring-black rounded-lg px-4 py-3 flex items-center gap-2 cursor-pointer"
                                data-color="Sand Storm">
                                <span class="w-4 h-4 rounded-full bg-[#dcbfa8]"></span>
                                <span class="text-sm font-medium">Sand Storm</span>
                            </div>
                            <div class="color-option border border-gray-200 rounded-lg px-4 py-3 flex items-center gap-2 cursor-pointer hover:border-gray-400 transition"
                                data-color="Ultra Violet">
                                <span class="w-4 h-4 rounded-full bg-[#e0d6ff]"></span>
                                <span class="text-sm font-medium">Ultra Violet</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-gray-500 font-medium mb-3">Almacenamiento</h3>
                        <div id="storage-options" class="flex flex-col gap-3">
                            <div
                                class="border border-gray-100 bg-gray-50 rounded-xl p-4 flex justify-between items-center text-sm text-gray-400 cursor-not-allowed">
                                <div class="flex flex-col">
                                    <span class="font-medium">12 GB RAM + 256 GB ROM</span>
                                    <span class="text-xs mt-1">Agotado</span>
                                </div>
                                <span class="px-3 py-1 bg-gray-200 rounded-full text-[10px] font-bold uppercase">No
                                    disponible</span>
                            </div>
                            <div class="storage-option border border-black ring-1 ring-black rounded-xl p-4 flex justify-between items-center text-sm font-medium cursor-pointer transition-all duration-200"
                                data-storage="512">
                                <span>16 GB RAM + 512 GB ROM</span>
                                <span>1.029,00 €</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="text-gray-700 font-medium mb-2">Llévatelo de regalo</p>
                        <div class="border border-gray-200 rounded-xl p-4 flex gap-4 items-center">
                            <div class="w-16 h-16 flex-shrink-0 bg-gray-50 rounded-md flex items-center justify-center">
                                <span class="text-2xl">🎁</span>
                            </div>
                            <div class="text-xs">
                                <p class="text-gray-600 mb-1">DJI Osmo Mobile 7 Gimbal</p>
                                <div class="flex items-center gap-2">
                                    <span class="line-through text-gray-400">99,00 €</span>
                                    <span class="text-red-500 font-bold">Ahorra 99,00 €</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <hr class="border-gray-100 mb-4">
                    <div class="text-center space-y-4">
                        <div class="text-gray-600 text-lg">
                            Total:
                            <div class="text-4xl font-bold text-gray-900 mt-1">1029,00€</div>
                        </div>
                        <button
                            class="w-full bg-[#00305e] hover:bg-[#002244] text-white font-semibold text-lg py-4 rounded-full transition shadow-lg transform active:scale-95">
                            Añadir al carrito
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <section class="flex-grow max-w-[95%] mx-auto px-4 md:px-8 py-10 w-full">
        <div class="mb-12 text-center">
            <h2 class="text-3xl md:text-4xl font-extralight color-[#000000] mt-3 tracking-tight">
                Otros Productos
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
            <a href="producto.php"
                class="group bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/40 hover:-translate-y-2 transition-all duration-500 flex flex-col">
                <div class="h-64 w-full flex items-center justify-center mb-4 relative">
                    <img src="assets/Oneplus15.png"
                        class="h-60 object-contain group-hover:scale-110 transition duration-500" />
                </div>
                <div class="mt-auto text-center">
                    <h3
                        class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
                        OnePlus 15
                    </h3>
                    <div class="text-3xl font-normal text-[#000000] tracking-tight">
                        1.029 €
                    </div>
                </div>
            </a>
            <a href="producto.php"
                class="group bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/40 hover:-translate-y-2 transition-all duration-500 flex flex-col">
                <div class="h-64 w-full flex items-center justify-center mb-4 relative">
                    <img src="assets/iPhone17ProMax.png"
                        class="h-60 object-contain group-hover:scale-110 transition duration-500" />
                </div>
                <div class="mt-auto text-center">
                    <h3
                        class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
                        Iphone 17 Pro Max
                    </h3>
                    <div class="text-3xl font-normal text-[#000000] tracking-tight">
                        1.700 €
                    </div>
                </div>
            </a>
            <a href="producto.php"
                class="group bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/40 hover:-translate-y-2 transition-all duration-500 flex flex-col">
                <div class="h-64 w-full flex items-center justify-center mb-4 relative">
                    <img src="assets/iphone17AirBlue.png"
                        class="h-60 object-contain group-hover:scale-110 transition duration-500" />
                </div>
                <div class="mt-auto text-center">
                    <h3
                        class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
                        Iphone 17 Air
                    </h3>
                    <div class="text-3xl font-normal text-[#000000] tracking-tight">
                        1.050 €
                    </div>
                </div>
            </a>
            <a href="producto.php"
                class="group bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/40 hover:-translate-y-2 transition-all duration-500 flex flex-col">
                <div class="h-64 w-full flex items-center justify-center mb-4 relative">
                    <img src="assets/oppoFindX9Pro.png"
                        class="h-60 object-contain group-hover:scale-110 transition duration-500" />
                </div>
                <div class="mt-auto text-center">
                    <h3
                        class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
                        Oppo Find X9 Pro
                    </h3>
                    <div class="text-3xl font-normal text-[#000000] tracking-tight">
                        1.299 €
                    </div>
                </div>
            </a>
        </div>
        <div class="flex justify-center mt-8">
            <a href="index.php"
                class="group inline-flex items-center gap-2 bg-[#004689] text-white font-medium px-10 py-3 rounded-full hover:opacity-90 transition text-lg">
                Ver más
            </a>
        </div>
    </section>

    <!-- Page-specific product functionality script -->
    <script>
        // Carrusel de imágenes de producto
        const productImg = document.getElementById('product-img');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        if (productImg && prevBtn && nextBtn) {
            const images = [
                './assets/ImagenOnePlus1.jpg',
                './assets/ImagenOnePlus2.png',
                './assets/ImagenOnePlus3.png'
            ];
            let currentIndex = 0;

            function updateImage(index) {
                // Fade out effect
                productImg.style.opacity = '0';
                setTimeout(() => {
                    productImg.src = images[index];
                    productImg.style.opacity = '1';
                }, 300);
            }

            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % images.length;
                updateImage(currentIndex);
            });

            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateImage(currentIndex);
            });
        }

        // Selección de opciones de producto
        document.addEventListener('DOMContentLoaded', () => {
            // Colores
            const colorOptions = document.querySelectorAll('.color-option');
            colorOptions.forEach(option => {
                option.addEventListener('click', () => {
                    colorOptions.forEach(opt => {
                        opt.classList.remove('border-black', 'ring-1', 'ring-black');
                        opt.classList.add('border-gray-200');
                    });
                    option.classList.remove('border-gray-200');
                    option.classList.add('border-black', 'ring-1', 'ring-black');
                });
            });

            // Almacenamiento (solo los que no están deshabilitados)
            const storageOptions = document.querySelectorAll('.storage-option');
            storageOptions.forEach(option => {
                option.addEventListener('click', () => {
                    storageOptions.forEach(opt => {
                        opt.classList.remove('border-black', 'ring-1', 'ring-black');
                        opt.classList.add('border-gray-200');
                    });
                    option.classList.remove('border-gray-200');
                    option.classList.add('border-black', 'ring-1', 'ring-black');
                });
            });
        });
    </script>

<?php include 'includes/footer.php'; ?>
