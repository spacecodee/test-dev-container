DROP TABLE IF EXISTS archivos;
CREATE TABLE archivos
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nombre       VARCHAR(100) NOT NULL,
    tipo         VARCHAR(100) NOT NULL,
    fecha_create TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_carpeta   INT          NOT NULL
);

TRUNCATE TABLE archivos;

DROP TABLE IF EXISTS carpetas;
CREATE TABLE carpetas
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nombre       VARCHAR(255) NOT NULL,
    fecha_create TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    estado       INT          NOT NULL DEFAULT 1,
    id_usuario   INT          NOT NULL
);

TRUNCATE TABLE carpetas;

DROP TABLE IF EXISTS detalle_archivos;
CREATE TABLE detalle_archivos
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    fecha_add  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    correo     VARCHAR(100) NOT NULL,
    estado     INT          NOT NULL DEFAULT 1,
    id_archivo INT          NOT NULL,
    id_usuario INT          NOT NULL
);

TRUNCATE TABLE detalle_archivos;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nombre    VARCHAR(100) NOT NULL,
    apellido  VARCHAR(100) NOT NULL,
    correo    VARCHAR(100) NOT NULL,
    telefono  VARCHAR(15)  NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    perfil    VARCHAR(100)          DEFAULT NULL,
    clave     VARCHAR(200) NOT NULL,
    token     VARCHAR(100)          DEFAULT NULL,
    fecha     TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    estado    INT          NOT NULL DEFAULT 1,
    rol       INT          NOT NULL
);

TRUNCATE TABLE usuarios;

-- Insert statements remain the same
INSERT INTO usuarios VALUES 
(1, 'Joel', 'Castillo', 'joelcastillo@gmail.com', '924670647', 'Mancora', 'Administrador', '111', NULL, '2024-11-16 15:22:10', 1, 0),
(2, 'Pablo', 'Cordova', 'pablocordova@gmail.com', '997630035', 'Cusco #104', NULL, '666', NULL, '2024-11-16 15:33:37', 1, 2),
(4, 'Juan', 'coronado', 'juancoronado@gmail.com', '987654321', 'lancones', NULL, '123', NULL, '2024-11-19 23:12:03', 1, 2),
(5, 'lisbet', 'sanchez', 'lisbet@gmail.com', '987635241', 'sullana', NULL, '123', NULL, '2024-11-20 00:06:32', 1, 2),
(6, 'juan', 'lozada', 'juanlozada@gmail.com', '978547847', 'cusco', NULL, '555', NULL, '2024-11-20 01:01:11', 1, 2);

INSERT INTO carpetas VALUES
(1, 'TOLVAS', '2024-11-18 06:36:03', 1, 1),
(2, 'MATERIA PRIMA', '2024-11-18 06:39:03', 1, 1),
(3, 'PARTE DE PRODUCCION', '2024-11-18 07:14:57', 1, 1),
(4, 'CARTA DE CAPITANES', '2024-11-18 07:19:52', 1, 1),
(5, 'ASISTENCIA DE APOYO', '2024-11-18 08:26:46', 1, 1),
(6, 'PRUEBA DE NUEVA CARPETA', '2024-11-18 13:24:51', 1, 1),
(7, 'GUIAS', '2024-11-18 18:38:38', 1, 1),
(8, 'IMAGENES', '2024-11-18 21:42:06', 1, 1),
(9, 'RETIRO', '2024-11-18 23:24:01', 1, 1),
(10, 'DOCUMENTOS', '2024-11-19 20:31:32', 1, 2),
(11, 'RECEPCION', '2024-11-20 01:01:41', 1, 1);

INSERT INTO archivos VALUES
(11, 'Copia de RECEPCION_MAYO_2024(1).xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '2024-11-19 16:02:15', 9),
(12, 'DATOS Y GRAFICOS.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '2024-11-19 20:31:43', 10),
(13, 'images (1).jpeg', 'image/jpeg', '2024-11-19 20:32:35', 8),
(14, '25916-Texto del artículo-102542-1-10-20220928.pdf', 'application/pdf', '2024-11-20 01:02:04', 11),
(15, 'Anuario_Estadistico_Pesquero_y_Acuicola_2022.pdf', 'application/pdf', '2024-11-25 16:26:34', 1),
(16, 'Formulario de Registro del Proveedor (2).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-11-25 16:26:40', 1),
(17, 'Copia de Lista de registro de participantes.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '2024-11-25 16:26:49', 1),
(18, 'Taller 1 y 2 (23-10-2024).pdf', 'application/pdf', '2024-11-25 16:28:16', 1),
(19, 'Aplicativo móvil para el aprendizaje del curso Desarrollo personal ciudadanía y cívica con la metodo', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-12-01 01:59:52', 2);

INSERT INTO detalle_archivos VALUES
(15, '2024-11-19 16:03:25', 'pablocordova@gmail.com', 1, 11, 1),
(20, '2024-11-19 20:40:39', 'pablocordova@gmail.com', 1, 13, 1),
(21, '2024-11-19 20:46:46', 'joelcastillo@gmail.com', 1, 12, 2),
(22, '2024-11-20 01:02:40', 'juancoronado@gmail.com', 1, 14, 1),
(23, '2024-11-20 01:02:40', 'pablocordova@gmail.com', 1, 14, 1),
(24, '2024-11-25 17:25:04', 'pablocordova@gmail.com', 1, 18, 1),
(25, '2024-11-25 17:25:04', 'juancoronado@gmail.com', 1, 18, 1),
(26, '2024-11-25 17:42:14', 'pablocordova@gmail.com', 1, 15, 1),
(27, '2024-11-25 17:42:14', 'juancoronado@gmail.com', 1, 15, 1),
(28, '2024-11-25 17:42:14', 'pablocordova@gmail.com', 1, 16, 1),
(29, '2024-11-25 17:42:14', 'juancoronado@gmail.com', 1, 16, 1);

-- Indexes and Foreign Keys
CREATE INDEX idx_archivos_id_carpeta ON archivos (id_carpeta);
CREATE INDEX idx_carpetas_id_usuario ON carpetas (id_usuario);
CREATE INDEX idx_detalle_archivos_id_archivo ON detalle_archivos (id_archivo);
CREATE INDEX idx_detalle_archivos_id_usuario ON detalle_archivos (id_usuario);

ALTER TABLE archivos
    ADD CONSTRAINT fk_archivos_id_carpeta 
    FOREIGN KEY (id_carpeta) REFERENCES carpetas (id) 
    ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE carpetas
    ADD CONSTRAINT fk_carpetas_id_usuario 
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id) 
    ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE detalle_archivos
    ADD CONSTRAINT fk_detalle_archivos_id_archivo 
    FOREIGN KEY (id_archivo) REFERENCES archivos (id) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT fk_detalle_archivos_id_usuario 
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id) 
    ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;