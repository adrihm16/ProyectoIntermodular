<?php
$pageTitle = "Productos - Admin Synapse";
include '../includes/header-admin.php';

// Get success/error messages from session
$successMessage = $_SESSION['success_message'] ?? null;
$errorMessage = $_SESSION['error_message'] ?? null;
unset($_SESSION['success_message'], $_SESSION['error_message']);

// Get all products with category and variant count
try {
    $stmt = $pdo->query("
        SELECT 
            p.id_producto,
            p.nombre,
            p.descripcion,
            c.nombre AS categoria,
            p.created_at,
            COUNT(v.id_variante) AS variantes_count,
            MIN(v.precio) AS precio_min,
            MAX(v.precio) AS precio_max
        FROM productos p
        LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
        LEFT JOIN variantes_producto v ON p.id_producto = v.id_producto
        GROUP BY p.id_producto
        ORDER BY p.created_at DESC
    ");
    $productos = $stmt->fetchAll();
} catch (PDOException $e) {
    $productos = [];
    $errorMessage = "Error al cargar productos: " . $e->getMessage();
}
?>

<!-- Page Header -->
<div class="flex items-center justify-between mb-8">
  <div>
    <h1 class="text-3xl font-bold text-gray-900">Productos</h1>
    <p class="text-gray-500 mt-1">Gestiona el catálogo de productos</p>
  </div>
  <a href="<?php echo BASE_URL; ?>admin/producto-form.php" 
     class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#004689] text-white rounded-xl font-semibold hover:bg-[#003567] transition shadow-lg shadow-[#004689]/20">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    Nuevo producto
  </a>
</div>

<?php if ($successMessage): ?>
<div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
  <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
  </svg>
  <span class="text-green-700 font-medium"><?php echo htmlspecialchars($successMessage); ?></span>
</div>
<?php endif; ?>

<?php if ($errorMessage): ?>
<div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
  <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
  </svg>
  <span class="text-red-700 font-medium"><?php echo htmlspecialchars($errorMessage); ?></span>
</div>
<?php endif; ?>

<!-- Products Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
  <?php if (empty($productos)): ?>
  <div class="p-12 text-center">
    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
      <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
      </svg>
    </div>
    <p class="text-gray-500 mb-4">No hay productos registrados</p>
    <a href="<?php echo BASE_URL; ?>admin/producto-form.php" class="text-[#004689] font-semibold hover:underline">
      Crear primer producto →
    </a>
  </div>
  <?php else: ?>
  <table class="w-full">
    <thead class="bg-gray-50 border-b border-gray-100">
      <tr>
        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Producto</th>
        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Categoría</th>
        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Variantes</th>
        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Precio</th>
        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Fecha</th>
        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      <?php foreach ($productos as $producto): ?>
      <tr class="hover:bg-gray-50 transition">
        <td class="px-6 py-4">
          <div>
            <p class="font-semibold text-gray-900"><?php echo htmlspecialchars($producto['nombre']); ?></p>
            <p class="text-sm text-gray-500 truncate max-w-xs"><?php echo htmlspecialchars(substr($producto['descripcion'] ?? '', 0, 60)); ?><?php echo strlen($producto['descripcion'] ?? '') > 60 ? '...' : ''; ?></p>
          </div>
        </td>
        <td class="px-6 py-4">
          <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-700">
            <?php echo htmlspecialchars($producto['categoria'] ?? 'Sin categoría'); ?>
          </span>
        </td>
        <td class="px-6 py-4">
          <a href="<?php echo BASE_URL; ?>admin/variantes.php?id=<?php echo $producto['id_producto']; ?>" 
             class="text-[#004689] font-medium hover:underline">
            <?php echo $producto['variantes_count']; ?> variante<?php echo $producto['variantes_count'] != 1 ? 's' : ''; ?>
          </a>
        </td>
        <td class="px-6 py-4">
          <?php if ($producto['precio_min']): ?>
            <span class="font-semibold text-gray-900">
              <?php if ($producto['precio_min'] == $producto['precio_max']): ?>
                €<?php echo number_format($producto['precio_min'], 2, ',', '.'); ?>
              <?php else: ?>
                €<?php echo number_format($producto['precio_min'], 2, ',', '.'); ?> - €<?php echo number_format($producto['precio_max'], 2, ',', '.'); ?>
              <?php endif; ?>
            </span>
          <?php else: ?>
            <span class="text-gray-400">-</span>
          <?php endif; ?>
        </td>
        <td class="px-6 py-4 text-sm text-gray-500">
          <?php echo date('d/m/Y', strtotime($producto['created_at'])); ?>
        </td>
        <td class="px-6 py-4">
          <div class="flex items-center justify-end gap-2">
            <a href="<?php echo BASE_URL; ?>admin/variantes.php?id=<?php echo $producto['id_producto']; ?>" 
               class="p-2 text-gray-400 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition" title="Variantes">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
              </svg>
            </a>
            <a href="<?php echo BASE_URL; ?>admin/producto-form.php?id=<?php echo $producto['id_producto']; ?>" 
               class="p-2 text-gray-400 hover:text-[#004689] hover:bg-blue-50 rounded-lg transition" title="Editar">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
              </svg>
            </a>
            <button onclick="openDeleteModal(<?php echo $producto['id_producto']; ?>, '<?php echo htmlspecialchars(addslashes($producto['nombre'])); ?>', '<?php echo BASE_URL; ?>admin/producto-delete.php')" 
                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Eliminar">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
            </button>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php endif; ?>
</div>

<?php include '../includes/footer-admin.php'; ?>
