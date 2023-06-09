CREATE DATABASE aquilartemis;

USE aquilartemis;


CREATE TABLE empleados (
    empleadoId INT PRIMARY KEY auto_increment,
    nombreEmpleado VARCHAR(255) NOT NULL,
    celularEmpleado VARCHAR(255) NOT NULL,
    cargo VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY auto_increment,
    empleadoId INT NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId)
);

CREATE TABLE constructoras_clientes (
    clientesId INT PRIMARY KEY auto_increment,
    nombreConstructora VARCHAR(255) NOT NULL,
    empleadoEncargado INT NOT NULL,
    fecha VARCHAR(255) NOT NULL,
    FOREIGN KEY (empleadoEncargado) REFERENCES empleados(empleadoId)

);

CREATE TABLE detalle_cotizacion ( 
    detalleId INT PRIMARY KEY auto_increment,
    cliente INT NOT NULL,
    productosAlquilados VARCHAR(255) NOT NULL,
    fechaAlquilado VARCHAR(255) NOT NULL,
    horaAlquiler VARCHAR(255) NOT NULL,   
    duracionAlquiler VARCHAR(255) NOT NULL, 
    precioDiaAlquiler VARCHAR(255) NOT NULL,
    totalCotizacion VARCHAR(255) NOT NULL,
    FOREIGN KEY (cliente) REFERENCES constructoras_clientes(clientesId) 
);

CREATE TABLE facturacion (
    facturacionId INT PRIMARY KEY auto_increment,
    clienteId INT NOT NULL,
    empleadoId INT NOT NULL,
    cotizacion INT NOT NULL,
    fechaFacturacion VARCHAR(255) NOT NULL,
    FOREIGN KEY (clienteId) REFERENCES constructoras_clientes(clientesId),
    FOREIGN KEY (empleadoId) REFERENCES empleados(empleadoId),
    FOREIGN KEY (cotizacion) REFERENCES detalle_cotizacion(detalleId)

);

/* CREATE TABLE productos (
    id_productos INT NOT NULL,
    nombre_producto VACREATE TABLE productos (
    id_productos INT NOT NULL,
    nombre_producto VARCHAR(255) NOT NULL,


 )RCHAR(255) NOT NULL,


 ) */