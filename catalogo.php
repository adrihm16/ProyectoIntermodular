<?php
$pageTitle = "Catálogo - Synapse";
$pageStyles = '
    /* Custom scrollbar for filters */
    .filters-scroll::-webkit-scrollbar {
      width: 4px;
    }

    .filters-scroll::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    .filters-scroll::-webkit-scrollbar-thumb {
      background: #004689;
      border-radius: 10px;
    }

    /* Price range slider styling */
    input[type="range"] {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 100%;
      height: 6px;
      border-radius: 5px;
      background: #e5e7eb;
      outline: none;
    }

    input[type="range"]::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #004689;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0, 70, 137, 0.3);
      transition: all 0.2s;
    }

    input[type="range"]::-webkit-slider-thumb:hover {
      transform: scale(1.1);
      background: #002F5C;
    }

    /* Checkbox styling */
    .custom-checkbox {
      accent-color: #004689;
    }
';
include 'includes/header.php';
?>

  <!-- Main Content -->
  <main class="flex-grow py-8 px-4 md:px-6 lg:px-8 font-sans">
    <div class="max-w-[95%] mx-auto">

      <!-- Breadcrumb & Title -->
      <div class="mb-8">
        <nav class="text-sm text-gray-500 mb-4">
          <a href="index.php" class="hover:text-[#004689] transition">Inicio</a>
          <span class="mx-2">/</span>
          <span class="text-gray-800 font-medium">Smartphones</span>
        </nav>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
          <h1 class="text-3xl md:text-4xl font-semibold text-gray-900">Smartphones</h1>
          <p class="text-gray-500">Mostrando <span class="font-semibold text-gray-700">8</span> productos</p>
        </div>
      </div>

      <!-- Mobile Filter Toggle -->
      <button id="mobile-filter-toggle"
        class="lg:hidden w-full mb-6 flex items-center justify-center gap-3 bg-white rounded-2xl py-4 px-6 shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100">
        <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
        </svg>
        <span class="font-semibold text-gray-700">Filtrar y Ordenar</span>
      </button>

      <div class="flex flex-col lg:flex-row gap-8">

        <!-- Filters Sidebar -->
        <aside id="filters-sidebar" class="hidden lg:block w-full lg:w-72 xl:w-80 flex-shrink-0">
          <div class="bg-white rounded-3xl shadow-md p-6 sticky top-[150px]">
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-xl font-bold text-gray-900">Filtros</h2>
              <button id="clear-filters" class="text-sm text-[#004689] hover:text-[#002F5C] font-medium transition">
                Limpiar todo
              </button>
            </div>

            <div class="space-y-6 filters-scroll max-h-[calc(100vh-300px)] overflow-y-auto pr-2">

              <!-- Sort By -->
              <div class="pb-6 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                  <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                  </svg>
                  Ordenar por
                </h3>
                <select id="sort-select"
                  class="w-full py-3 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] outline-none transition-all text-sm font-medium cursor-pointer">
                  <option value="featured">Destacados</option>
                  <option value="price-asc">Precio: menor a mayor</option>
                  <option value="price-desc">Precio: mayor a menor</option>
                  <option value="name-asc">Nombre: A - Z</option>
                  <option value="name-desc">Nombre: Z - A</option>
                  <option value="newest">Más recientes</option>
                </select>
              </div>

              <!-- Categories -->
              <div class="pb-6 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                  <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                  </svg>
                  Categorías
                </h3>
                <div class="space-y-3">
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" checked class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Smartphones</span>
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">24</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Ordenadores</span>
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">18</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Tablets</span>
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">12</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Smartwatches</span>
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">8</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Electrodomésticos</span>
                    <span class="ml-auto text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">15</span>
                  </label>
                </div>
              </div>

              <!-- Price Range -->
              <div class="pb-6 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                  <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Rango de precio
                </h3>
                <div class="space-y-4">
                  <div class="flex items-center gap-4">
                    <div class="flex-1">
                      <label class="text-xs text-gray-500 mb-1 block">Mín</label>
                      <input type="number" id="price-min" value="0" min="0"
                        class="w-full py-2 px-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] outline-none transition-all text-sm">
                    </div>
                    <span class="text-gray-400 mt-5">—</span>
                    <div class="flex-1">
                      <label class="text-xs text-gray-500 mb-1 block">Máx</label>
                      <input type="number" id="price-max" value="2000" min="0"
                        class="w-full py-2 px-3 rounded-lg border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#004689]/20 focus:border-[#004689] outline-none transition-all text-sm">
                    </div>
                  </div>
                  <input type="range" id="price-range" min="0" max="2000" value="2000" class="w-full">
                  <div class="flex justify-between text-xs text-gray-500">
                    <span>0 €</span>
                    <span>2.000 €</span>
                  </div>
                </div>
              </div>

              <!-- Brands -->
              <div class="pb-6 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                  <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                  </svg>
                  Marcas
                </h3>
                <div class="space-y-3">
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Apple</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Samsung</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">OnePlus</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Oppo</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Xiaomi</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Nothing</span>
                  </label>
                </div>
              </div>

              <!-- Availability -->
              <div>
                <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                  <svg class="w-5 h-5 text-[#004689]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Disponibilidad
                </h3>
                <div class="space-y-3">
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" checked class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">En stock</span>
                  </label>
                  <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" class="custom-checkbox w-5 h-5 rounded border-gray-300 focus:ring-[#004689]">
                    <span class="text-sm text-gray-700 group-hover:text-[#004689] transition">Incluir agotados</span>
                  </label>
                </div>
              </div>
            </div>

            <!-- Apply Filters Button (Mobile) -->
            <button id="apply-filters-btn"
              class="lg:hidden w-full mt-6 bg-gradient-to-r from-[#004689] to-[#002F5C] text-white py-3 rounded-xl font-bold text-sm tracking-wide hover:shadow-lg hover:shadow-[#004689]/30 transition-all duration-300 active:scale-95">
              Aplicar filtros
            </button>
          </div>
        </aside>

        <!-- Products Grid -->
        <section class="flex-grow">
          <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            <!-- Product Cards -->
            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/Oneplus15.png" alt="OnePlus 15"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">OnePlus 15</h3>
                <p class="text-sm text-gray-500 mb-2">16GB RAM · 512GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">1.029 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/iPhone17ProMax.png" alt="iPhone 17 Pro Max"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">iPhone 17 Pro Max</h3>
                <p class="text-sm text-gray-500 mb-2">12GB RAM · 256GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">1.700 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/iphone17AirBlue.png" alt="iPhone 17 Air"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">iPhone 17 Air</h3>
                <p class="text-sm text-gray-500 mb-2">8GB RAM · 256GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">1.050 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/oppoFindX9Pro.png" alt="Oppo Find X9 Pro"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">Oppo Find X9 Pro</h3>
                <p class="text-sm text-gray-500 mb-2">16GB RAM · 512GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">1.299 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/nothingPhone1.png" alt="Nothing Phone 1"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">Nothing Phone (1)</h3>
                <p class="text-sm text-gray-500 mb-2">8GB RAM · 256GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">549 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/Oneplus15.png" alt="OnePlus 15 Pro"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">OnePlus 15 Pro</h3>
                <p class="text-sm text-gray-500 mb-2">16GB RAM · 1TB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">1.199 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/iPhone17ProMax.png" alt="iPhone 17 Pro"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">iPhone 17 Pro</h3>
                <p class="text-sm text-gray-500 mb-2">12GB RAM · 512GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">1.499 €</div>
              </div>
            </a>

            <a href="producto.php"
              class="group bg-white rounded-[2rem] p-6 shadow-md shadow-black/10 hover:shadow-xl hover:shadow-black/20 hover:-translate-y-2 transition-all duration-500 flex flex-col">
              <div class="h-48 w-full flex items-center justify-center mb-4 relative overflow-hidden">
                <img src="assets/oppoFindX9Pro.png" alt="Oppo Find X8"
                  class="h-44 object-contain group-hover:scale-110 transition duration-500" />
              </div>
              <div class="mt-auto text-center">
                <h3 class="text-lg font-semibold text-gray-900 mb-1 group-hover:text-[#004689] transition tracking-tight">Oppo Find X8</h3>
                <p class="text-sm text-gray-500 mb-2">12GB RAM · 256GB</p>
                <div class="text-2xl font-bold text-[#004689] tracking-tight">899 €</div>
              </div>
            </a>

          </div>

          <!-- Pagination -->
          <div class="mt-12 flex justify-center">
            <nav class="flex items-center gap-2">
              <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-400 hover:border-[#004689] hover:text-[#004689] transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
              <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-gradient-to-r from-[#004689] to-[#002F5C] text-white font-semibold shadow-lg shadow-[#004689]/30">1</button>
              <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:border-[#004689] hover:text-[#004689] transition-all font-medium">2</button>
              <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:border-[#004689] hover:text-[#004689] transition-all font-medium">3</button>
              <span class="px-2 text-gray-400">...</span>
              <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:border-[#004689] hover:text-[#004689] transition-all font-medium">8</button>
              <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:border-[#004689] hover:text-[#004689] transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </nav>
          </div>
        </section>
      </div>
    </div>
  </main>

  <!-- Mobile Filter Overlay -->
  <div id="filter-overlay" class="fixed inset-0 bg-black/50 z-[80] hidden opacity-0 transition-opacity duration-300"></div>

  <!-- Mobile Filter Panel -->
  <div id="mobile-filter-panel"
    class="fixed bottom-0 left-0 right-0 z-[90] bg-white rounded-t-3xl shadow-2xl transform translate-y-full transition-transform duration-300 max-h-[85vh] overflow-hidden lg:hidden">
    <div class="flex items-center justify-between p-6 border-b border-gray-100">
      <h2 class="text-xl font-bold text-gray-900">Filtros</h2>
      <button id="close-filter-panel" class="text-gray-400 hover:text-gray-600 transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="p-6 overflow-y-auto max-h-[calc(85vh-140px)]" id="mobile-filters-content">
      <!-- Filters will be cloned here via JS -->
    </div>
    <div class="p-6 border-t border-gray-100 bg-white">
      <button id="apply-mobile-filters"
        class="w-full bg-gradient-to-r from-[#004689] to-[#002F5C] text-white py-4 rounded-xl font-bold text-sm tracking-wide hover:shadow-lg hover:shadow-[#004689]/30 transition-all duration-300 active:scale-95">
        Ver resultados
      </button>
    </div>
  </div>

  <!-- Page-specific catalog scripts -->
  <script>
    // Mobile Filter Panel
    document.addEventListener("DOMContentLoaded", () => {
      const mobileFilterToggle = document.getElementById("mobile-filter-toggle");
      const filterOverlay = document.getElementById("filter-overlay");
      const mobileFilterPanel = document.getElementById("mobile-filter-panel");
      const closeFilterPanel = document.getElementById("close-filter-panel");
      const applyMobileFilters = document.getElementById("apply-mobile-filters");

      function openFilterPanel() {
        filterOverlay.classList.remove("hidden");
        setTimeout(() => {
          filterOverlay.classList.remove("opacity-0");
          mobileFilterPanel.classList.remove("translate-y-full");
        }, 10);
        document.body.style.overflow = "hidden";
      }

      function closeFilterPanelFn() {
        filterOverlay.classList.add("opacity-0");
        mobileFilterPanel.classList.add("translate-y-full");
        setTimeout(() => {
          filterOverlay.classList.add("hidden");
        }, 300);
        document.body.style.overflow = "";
      }

      if (mobileFilterToggle) mobileFilterToggle.addEventListener("click", openFilterPanel);
      if (closeFilterPanel) closeFilterPanel.addEventListener("click", closeFilterPanelFn);
      if (filterOverlay) filterOverlay.addEventListener("click", closeFilterPanelFn);
      if (applyMobileFilters) applyMobileFilters.addEventListener("click", closeFilterPanelFn);

      // Clone desktop filters to mobile panel
      const desktopFilters = document.querySelector('#filters-sidebar .filters-scroll');
      const mobileFiltersContent = document.getElementById('mobile-filters-content');
      if (desktopFilters && mobileFiltersContent) {
        mobileFiltersContent.innerHTML = desktopFilters.innerHTML;
      }
    });

    // Price range slider sync
    const priceRange = document.getElementById('price-range');
    const priceMax = document.getElementById('price-max');

    if (priceRange && priceMax) {
      priceRange.addEventListener('input', function () {
        priceMax.value = this.value;
      });

      priceMax.addEventListener('input', function () {
        priceRange.value = this.value;
      });
    }
  </script>

<?php include 'includes/footer.php'; ?>
