USE phpCRUD;

CREATE TABLE empleados {
    id int AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apaterno VARCHAR(255) NOT NULL,
    amaterno VARCHAR(255) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(255),
    ciudad VARCHAR(255),
    estado VARCHAR(255),
    usuario VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(255) NOT NULL
);

DESCRIBE empleados;