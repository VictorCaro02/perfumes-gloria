# Configuración de Instancia AWS EC2 para Despliegue Web

## Detalles de la instancia

- **Sistema operativo:** Ubuntu Server 24.04 LTS (HVM), SSD Volume Type
- **Tipo de instancia:** t2.micro
- **Región:** us-east-1b
- **Nombre de la instancia:** [FraganciasGloria]

## Red y acceso

- **Dirección IP pública:** [3.228.126.96]
- **Puerto HTTP (80):** abierto en grupo de seguridad
- **Acceso SSH (22):** habilitado con clave privada `.pem`

## Claves y conexión SSH

- **Tipo de clave:** [ED25519]
- **Nombre del archivo `.pem`:** [clavestfg.pem]

## Configuración de la Base de Datos

- **Instalación de MariaDB:** sudo apt install mariadb-server -y
- **Creación de la Base de datos:** sudo mysql // CREATE DATABASE perfumes_gloria;
- **Importación de la Base de datos:** sudo mysql -u root perfumes_gloria < /var/www/html/perfumes_gloria.sql

## Observaciones Finales

- **El usuario de base de datos usado es root sin contraseña. Esto solo se recomienda para entornos de prueba o desarrollo**
- **Se recomienda cambiar las credenciales para despliegues en producción**
- **Todos los archivos fueron cargados utilizando WinSCP con autenticación por clave privada**

## Requisitos Académicos

- **Este entorno fue configurado para cumplir con los requisitos del Trabajo de Fin de Grado de Víctor Caro Fernández, alumno del curso 2º DAW Semipresencial en instituto IES Macià Abela, Crevillente, permitiendo el despliegue y funcionamiento de una página web completa**
