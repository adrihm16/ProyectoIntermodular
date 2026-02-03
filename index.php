<?php
$pageTitle = "Synapse - Inicio";
include 'includes/header.php';
?>

  <!-- Hero Section -->
  <section class="w-full bg-slate-900">
    <a href="producto.php" class="block group relative overflow-hidden">
      <img src="assets/HeroOnePlus15Mobile.png" alt="OnePlus 15"
        class="w-full h-auto object-cover md:hidden transition-all duration-700 group-hover:scale-105 group-hover:brightness-110" />

      <img src="assets/HeroOnePlus15.png" alt="OnePlus 15"
        class="hidden w-full h-auto object-cover md:block transition-all duration-700 group-hover:scale-[1.01] group-hover:brightness-110" />
    </a>
  </section>

  <!-- Productos Destacados -->
  <section class="max-w-[95%] mx-auto px-6 py-10">
    <div class="mb-12 text-center">
      <h2 class="text-3xl md:text-4xl font-extralight color-[#000000] mt-3 tracking-tight">
        Productos Destacados
      </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
      <a href="producto.php"
        class="group bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/40 hover:-translate-y-2 transition-all duration-500 flex flex-col">
        <div class="h-64 w-full flex items-center justify-center mb-4 relative">
          <img src="assets/Oneplus15.png" class="h-60 object-contain group-hover:scale-110 transition duration-500" />
        </div>
        <div class="mt-auto text-center">
          <h3 class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
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
          <h3 class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
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
          <h3 class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
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
          <h3 class="text-2xl font-semibold text-[#000000] mb-2 group-hover:text-[#000000] transition tracking-tight">
            Oppo Find X9 Pro
          </h3>
          <div class="text-3xl font-normal text-[#000000] tracking-tight">
            1.299 €
          </div>
        </div>
      </a>
    </div>
    <div class="flex justify-center mt-8">
      <a href="#"
        class="group inline-flex items-center gap-2 bg-[#004689] text-white font-medium px-10 py-3 rounded-full hover:opacity-90 transition text-lg">
        Ver más
      </a>
    </div>
  </section>

  <!--Categorías de productos-->
  <section class="max-w-[95%] mx-auto px-6 py-10">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 justify-items-center">
      <a href="#" class="group flex flex-col items-center w-full max-w-[260px]">
        <div
          class="bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/30 hover:-translate-y-1 transition-all duration-500 w-full aspect-square flex items-center justify-center">
          <img src="assets/nothingPhone1.png" alt="Smartphones"
            class="h-4/5 w-4/5 object-contain group-hover:scale-110 transition duration-500" />
        </div>
        <span class="mt-5 text-lg md:text-2xl font-medium text-[#000000] text-center tracking-tight">
          Smartphones
        </span>
      </a>

      <a href="#" class="group flex flex-col items-center w-full max-w-[260px]">
        <div
          class="bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/30 hover:-translate-y-1 transition-all duration-500 w-full aspect-square flex items-center justify-center">
          <img src="assets/macbookAir.png" alt="Ordenadores"
            class="h-4/5 w-4/5 object-contain group-hover:scale-110 transition duration-500" />
        </div>
        <span class="mt-5 text-lg md:text-2xl font-medium text-[#000000] text-center tracking-tight">
          Ordenadores
        </span>
      </a>

      <a href="#" class="group flex flex-col items-center w-full max-w-[260px]">
        <div
          class="bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/30 hover:-translate-y-1 transition-all duration-500 w-full aspect-square flex items-center justify-center">
          <img src="assets/ipadPro.png" alt="Tablets"
            class="h-4/5 w-4/5 object-contain group-hover:scale-110 transition duration-500" />
        </div>
        <span class="mt-5 text-lg md:text-2xl font-medium text-[#000000] text-center tracking-tight">
          Tablets
        </span>
      </a>

      <a href="#" class="group flex flex-col items-center w-full max-w-[260px]">
        <div
          class="bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/30 hover:-translate-y-1 transition-all duration-500 w-full aspect-square flex items-center justify-center">
          <img src="assets/CafeteraXiaomi.png" alt="Electrodomésticos"
            class="h-4/5 w-4/5 object-contain group-hover:scale-110 transition duration-500" />
        </div>
        <span class="mt-5 text-lg md:text-2xl font-medium text-[#000000] text-center tracking-tight">
          Hogar
        </span>
      </a>

      <a href="#" class="group flex flex-col items-center w-full max-w-[260px]">
        <div
          class="bg-white rounded-[2.5rem] p-8 shadow-md shadow-black/20 hover:shadow-lg hover:shadow-black/30 hover:-translate-y-1 transition-all duration-500 w-full aspect-square flex items-center justify-center">
          <img src="assets/pixelWatch4.png" alt="Smartwatches"
            class="h-4/5 w-4/5 object-contain group-hover:scale-110 transition duration-500" />
        </div>
        <span class="mt-5 text-lg md:text-2xl font-medium text-[#000000] text-center tracking-tight">
          Relojes
        </span>
      </a>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>