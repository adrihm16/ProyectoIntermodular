<?php
$pageTitle = "Carrito - Synapse";
include 'includes/header.php';
?>

  <!--Main-->
  <main class="flex-grow max-w-[95%] mx-auto px-4 md:px-8 py-10 w-full">
    <div class="mb-12 text-center">
      <h2 class="text-3xl md:text-4xl font-extralight color-[#000000] mt-3 tracking-tight">
        Tu Carrito
      </h2>
    </div>
    <!--Carrito-->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      <div class="lg:col-span-9 bg-white rounded-[2.5rem] p-6 md:p-10 shadow-md border border-gray-100 min-h-[500px]">
        <div id="cart-items-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
          <div class="product-item flex flex-col items-center">
            <div
              class="bg-white border border-gray-200 rounded-[1.5rem] p-4 shadow-sm w-full aspect-square flex flex-col items-center justify-center relative group hover:shadow-md transition-shadow">
              <img src="assets/Oneplus15.png" alt="OnePlus 15" class="h-32 object-contain mb-3" />
              <h3 class="text-lg font-medium text-slate-900 text-center leading-tight">
                OnePlus 15
              </h3>
              <p class="text-base font-bold text-gray-500 mt-1">1029,00€</p>
            </div>

            <div class="flex items-center gap-3 mt-4">
              <button class="quantity-btn decrease text-gray-400 hover:text-[#003366] transition" data-price="1029.00">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="10" stroke-width="1.5"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h8"></path>
                </svg>
              </button>
              <span class="quantity text-lg font-bold w-6 text-center">1</span>
              <button class="quantity-btn increase text-gray-400 hover:text-[#003366] transition" data-price="1029.00">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="10" stroke-width="1.5"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v8m-4-4h8"></path>
                </svg>
              </button>
            </div>
          </div>

          <div class="product-item flex flex-col items-center">
            <div
              class="bg-white border border-gray-200 rounded-[1.5rem] p-4 shadow-sm w-full aspect-square flex flex-col items-center justify-center relative group hover:shadow-md transition-shadow">
              <img src="https://via.placeholder.com/150?text=Gimbal" alt="DJI" class="h-32 object-contain mb-3" />
              <h3 class="text-lg font-medium text-slate-900 text-center leading-tight">
                DJI Mobile 7
              </h3>
              <p class="text-base font-bold text-gray-500 mt-1">0,00€</p>
            </div>
            <div class="flex items-center gap-3 mt-4">
              <button class="quantity-btn decrease text-gray-400 hover:text-[#003366] transition" data-price="0.00">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="10" stroke-width="1.5"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h8"></path>
                </svg>
              </button>
              <span class="quantity text-lg font-bold w-6 text-center">1</span>
              <button class="quantity-btn increase text-gray-400 hover:text-[#003366] transition" data-price="0.00">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="10" stroke-width="1.5"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v8m-4-4h8"></path>
                </svg>
              </button>
            </div>
          </div>

          <div class="product-item flex flex-col items-center">
            <div
              class="bg-white border border-gray-200 rounded-[1.5rem] p-4 shadow-sm w-full aspect-square flex flex-col items-center justify-center relative group hover:shadow-md transition-shadow">
              <img src="https://via.placeholder.com/150?text=Funda" alt="Funda" class="h-32 object-contain mb-3" />
              <h3 class="text-lg font-medium text-slate-900 text-center leading-tight">
                Funda Carbono
              </h3>
              <p class="text-base font-bold text-gray-500 mt-1">29,90€</p>
            </div>
            <div class="flex items-center gap-3 mt-4">
              <button class="quantity-btn decrease text-gray-400 hover:text-[#003366] transition" data-price="29.90">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="10" stroke-width="1.5"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h8"></path>
                </svg>
              </button>
              <span class="quantity text-lg font-bold w-6 text-center">1</span>
              <button class="quantity-btn increase text-gray-400 hover:text-[#003366] transition" data-price="29.90">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="10" stroke-width="1.5"></circle>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v8m-4-4h8"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!--Resumen-->
      <div
        class="lg:col-span-3 bg-white rounded-[2.5rem] p-6 shadow-md border border-gray-100 min-h-[500px] flex flex-col sticky top-[150px]">
        <h2 class="text-2xl font-light text-center mb-8 text-slate-900">
          Resumen
        </h2>

        <div class="space-y-4 mb-8 flex-grow">
          <div class="flex justify-between text-sm font-medium text-slate-700">
            <span>Subtotal</span>
            <span id="subtotal">1058,90€</span>
          </div>
          <div class="flex justify-between text-sm font-medium text-slate-700">
            <span>Envío</span>
            <span id="shipping">0,00€</span>
          </div>
          <div class="border-t border-gray-100 my-4"></div>
        </div>

        <div class="mb-8">
          <div class="flex justify-between items-center">
            <span class="text-lg font-bold text-slate-900">Total</span>
            <span id="total-price" class="text-xl font-bold text-slate-900">1058,90€</span>
          </div>
        </div>

        <button
          class="w-full bg-[#004689] text-white py-3.5 rounded-full font-medium text-base hover:bg-[#002F5C] transition shadow-lg hover:shadow-xl hover:-translate-y-1 transform duration-300">
          Ir a pagar
        </button>
        <div class="mt-6 flex justify-center gap-2 grayscale opacity-40">
          <div class="w-8 h-5 bg-gray-200 rounded"></div>
          <div class="w-8 h-5 bg-gray-200 rounded"></div>
          <div class="w-8 h-5 bg-gray-200 rounded"></div>
        </div>
      </div>
    </div>
  </main>

  <!--Otros Productos-->
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
      <a href="index.php"
        class="group inline-flex items-center gap-2 bg-[#004689] text-white font-medium px-10 py-3 rounded-full hover:opacity-90 transition text-lg">
        Ver más
      </a>
    </div>
  </section>

  <!-- Page-specific cart functionality script -->
  <script>
    // Funcionalidad del carrito
    document.addEventListener('DOMContentLoaded', () => {
      const quantityButtons = document.querySelectorAll('.quantity-btn');
      const subtotalElement = document.getElementById('subtotal');
      const totalElement = document.getElementById('total-price');

      function updateTotals() {
        let newSubtotal = 0;
        document.querySelectorAll('.quantity').forEach(qSpan => {
          const qty = parseInt(qSpan.textContent);
          const price = parseFloat(qSpan.parentElement.querySelector('.quantity-btn').getAttribute('data-price'));
          newSubtotal += qty * price;
        });

        const formattedSubtotal = newSubtotal.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '€';
        subtotalElement.textContent = formattedSubtotal;
        totalElement.textContent = formattedSubtotal;
      }

      quantityButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          const isIncrease = btn.classList.contains('increase');
          const quantitySpan = btn.parentElement.querySelector('.quantity');
          const productItem = btn.closest('.product-item');
          let currentQty = parseInt(quantitySpan.textContent);

          if (isIncrease) {
            currentQty++;
          } else if (currentQty > 0) {
            currentQty--;
          }

          if (currentQty === 0 && productItem) {
            // Animación de salida opcional
            productItem.style.opacity = '0';
            productItem.style.transform = 'scale(0.9)';
            productItem.style.transition = 'all 0.3s ease';

            setTimeout(() => {
              productItem.remove();
              updateTotals();

              // Si no quedan productos, mostrar mensaje de carrito vacío
              const remainingItems = document.querySelectorAll('.product-item');
              if (remainingItems.length === 0) {
                document.getElementById('cart-items-container').innerHTML = `
                  <div class="col-span-full flex flex-col items-center justify-center py-12 text-gray-400">
                    <svg class="w-20 h-20 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <p class="text-xl font-medium">Tu carrito está vacío</p>
                    <a href="index.php" class="mt-4 text-[#004689] hover:underline font-semibold">Volver a la tienda</a>
                  </div>
                `;
              }
            }, 300);
          } else {
            quantitySpan.textContent = currentQty;
            updateTotals();
          }
        });
      });
    });
  </script>

<?php include 'includes/footer.php'; ?>
