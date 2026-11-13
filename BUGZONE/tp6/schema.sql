-- BUGZONE | TP6 - Esquema de base de datos MySQL
-- Ejecutar primero este archivo desde phpMyAdmin o MySQL.

CREATE DATABASE IF NOT EXISTS bugzone
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE bugzone;

CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL UNIQUE,
    descripcion VARCHAR(180) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_usuarios_roles
      FOREIGN KEY (rol_id) REFERENCES roles(id)
      ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL UNIQUE,
    descripcion VARCHAR(180) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    categoria_id INT NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    contenido TEXT NOT NULL,
    imagen_url VARCHAR(500) NULL,
    estado ENUM('borrador', 'publicada') NOT NULL DEFAULT 'publicada',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_noticias_usuarios
      FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
      ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_noticias_categorias
      FOREIGN KEY (categoria_id) REFERENCES categorias(id)
      ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS etiquetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Relación N:M: una noticia puede tener varias etiquetas
-- y una etiqueta puede pertenecer a varias noticias.
CREATE TABLE IF NOT EXISTS noticia_etiqueta (
    noticia_id INT NOT NULL,
    etiqueta_id INT NOT NULL,
    PRIMARY KEY (noticia_id, etiqueta_id),
    CONSTRAINT fk_ne_noticias
      FOREIGN KEY (noticia_id) REFERENCES noticias(id)
      ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_ne_etiquetas
      FOREIGN KEY (etiqueta_id) REFERENCES etiquetas(id)
      ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

-- Índices explícitos para búsquedas habituales.
CREATE INDEX idx_usuarios_email ON usuarios(email);
CREATE INDEX idx_noticias_titulo ON noticias(titulo);
CREATE INDEX idx_noticias_fecha ON noticias(created_at);
