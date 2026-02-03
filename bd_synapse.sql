-- ================================================
-- 1. CREACIÓN DE LA BASE DE DATOS Y TABLAS
-- ================================================

DROP DATABASE IF EXISTS synapse_db;
CREATE DATABASE synapse_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE synapse_db;

-- Tabla de Usuarios (Sin cambios respecto a tu diseño)
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL, -- Recuerda que en producción esto debe ser un hash
    rol ENUM('cliente', 'admin') DEFAULT 'cliente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Categorías (Sin cambios)
CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

-- Tabla de Productos PADRE (Información general)
-- Hemos quitado precio, stock e imagen de aquí porque ahora dependen de la variante
CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    id_categoria INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE SET NULL
);

-- NUEVA TABLA: Variantes de Producto (Aquí está la magia)
-- Maneja las combinaciones específicas de color, almacenamiento, precio y stock
CREATE TABLE variantes_producto (
    id_variante INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    color VARCHAR(50) NOT NULL,         -- Ej: 'Sand Storm', 'Infinite Black'
    almacenamiento VARCHAR(50) NOT NULL, -- Ej: '16 GB + 512 GB ROM'
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255),                -- Ruta a la imagen específica de este color
    sku VARCHAR(50) UNIQUE,             -- Código único de referencia (opcional pero recomendado)
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE CASCADE,
    -- Aseguramos que no haya dos variantes iguales para el mismo producto
    UNIQUE(id_producto, color, almacenamiento) 
);

-- Tabla de Pedidos (Cabecera)
CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    estado ENUM('pendiente', 'pagado', 'enviado', 'entregado') DEFAULT 'pendiente',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

-- Tabla Detalle de Pedido (CAMBIO IMPORTANTE)
-- Ahora referencia a id_variante, no a id_producto
CREATE TABLE detalle_pedido (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_variante INT NOT NULL, -- Referencia a la variante específica comprada
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL, -- Precio en el momento de la compra
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_variante) REFERENCES variantes_producto(id_variante)
);

-- Tabla Carrito (CAMBIO IMPORTANTE)
-- Ahora referencia a id_variante, no a id_producto
CREATE TABLE carrito (
    id_carrito INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_variante INT NOT NULL, -- El usuario añade una variante específica al carrito
    cantidad INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_variante) REFERENCES variantes_producto(id_variante) ON DELETE CASCADE,
    -- Evitar duplicados: si ya tiene la variante, se actualiza la cantidad, no se crea otra fila
    UNIQUE(id_usuario, id_variante) 
);


-- ================================================
-- 2. INSERCIÓN DE DATOS DE PRUEBA (SEEDING)
-- ================================================

-- 1. Crear Categorías
INSERT INTO categorias (nombre) VALUES 
('Smartphones'), 
('Audio'), 
('Accesorios');

-- 2. Crear Usuarios (Contraseñas en texto plano SOLO PARA PRUEBAS. En Laravel usarás Hash::make)
INSERT INTO usuarios (nombre, email, contrasena, rol) VALUES 
('Admin User', 'admin@synapse.com', 'password123', 'admin'),
('Juan Pérez', 'juan@correo.com', 'password123', 'cliente');

-- 3. Crear el Producto Padre (One Plus 15)
INSERT INTO productos (nombre, descripcion, id_categoria) VALUES 
('One Plus 15', 'El último flagship con cámara Hasselblad y rendimiento extremo.', 1);

-- Obtenemos el ID del producto que acabamos de crear (asumimos que es el ID 1)
SET @id_op15 = 1;

-- 4. Crear las Variantes (Basado en tu maqueta)

-- Variante 1: Sand Storm / 512GB (La seleccionada en la imagen)
INSERT INTO variantes_producto (id_producto, color, almacenamiento, precio, stock, imagen, sku) VALUES 
(@id_op15, 'Sand Storm', '16 GB RAM + 512 GB ROM', 1029.00, 50, '/images/products/op15-sand.png', 'OP15-SAND-512');

-- Variante 2: Infinite Black / 512GB
INSERT INTO variantes_producto (id_producto, color, almacenamiento, precio, stock, imagen, sku) VALUES 
(@id_op15, 'Infinite Black', '16 GB RAM + 512 GB ROM', 1029.00, 30, '/images/products/op15-black.png', 'OP15-BLK-512');

-- Variante 3: Ultra Violet / 256GB (La que aparece como "No disponible")
INSERT INTO variantes_producto (id_producto, color, almacenamiento, precio, stock, imagen, sku) VALUES 
(@id_op15, 'Ultra Violet', '12 GB RAM + 256 GB ROM', 949.00, 0, '/images/products/op15-violet.png', 'OP15-VIO-256');


-- 5. (Opcional) Añadir algo al carrito del cliente Juan Pérez para probar
-- Asumimos que Juan es ID 2 y la variante Sand Storm es ID 1
INSERT INTO carrito (id_usuario, id_variante, cantidad) VALUES 
(2, 1, 1);


-- ================================================
-- VERIFICACIÓN RÁPIDA
-- ================================================
-- Si ejecutas esto, deberías ver cómo se relacionan los datos:
/*
SELECT 
    p.nombre AS producto,
    v.color,
    v.almacenamiento,
    v.precio,
    v.stock
FROM productos p
JOIN variantes_producto v ON p.id_producto = v.id_producto;
*/