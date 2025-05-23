# Gestor de notas personales
<br>


<img src="https://github.com/user-attachments/assets/21d65650-1122-490d-b700-d25aef5f4b9c" alt="usuario" width="20"> **Integrantes:**

 **Desarrollo de Aplic. Web con Soft. Interpret. en el Servidor DSS404 G03T y G02L**
- Elías Daniel Rodríguez Franco – RF230727
- Marlon Osmín Ortiz Carcamo – OC232936  
- Mauricio Enrique Herrera Rico – HR230334
  

 **Desarrollo de Aplic. Web con Soft. Interpret. en el Servidor DSS404 G03T y G04L**
 - Jonathan Josue Cardoza Peréz – CP230528  
<br>


## Link a Notion

- **https://www.notion.so/Proyecto-Final-DSS-1e3decf79b44809ab15cdbf2c646f7ff?pvs=4**
<br>



## Link a Figma

- **https://www.figma.com/design/OLMD7dR53TyfUQn2Ij22pr/ProyectoDSS?node-id=0-1&t=OOjdEdAWPIwCPT5v-1**
<br>



## Requisitos

- PHP 8.x
- Composer
- MySQL o MariaDB
- Laravel 10+
<br>



## Instalación (Ejecutar los comandos en consola)

### 1. Obtener el proyecto

> Clonar el repositorio de manera local o descargar la carpeta comprimida en `.zip`.

```bash
git clone https://github.com/MauEnRich/ProyectoDSS.git
```

### 2. Importar la Base de Datos adjunta

>En el repositorio dentro de la carpeta BD se encuentra el script de respaldo de la Base de Datos.

### 3. Acceder al proyecto

> Ir a traves de consola al proyecto.

```bash
cd gestor_notas
```

### 4. Instalar dependencias del proyecto

> Este comando instala todas las dependencias definidas en el archivo `composer.json`. Es esencial para que Laravel funcione correctamente.

```bash
composer install
```

### 5. Crear archivo de entorno

>Copia `.env.example` a `.env`.En este archivo se debe configurar la base de datos del proyecto en especifo de la linea 11-16.

```bash
copy .env.example .env
```

### 6. Generar clave de aplicación

>Laravel requiere una clave única para operaciones internas de cifrado. Este comando la genera y la guarda automáticamente en el archivo `.env`.

```bash
php artisan key:generate
```

### 7. Crear enlace simbólico a la carpeta storage

>Permite acceder públicamente desde el navegador a los archivos guardados en el almacenamiento, como imágenes subidas.

```bash
php artisan storage:link
```

### 8. Ejecutar migraciones de base de datos (opcional pero recomendado)

>Crea todas las tablas necesarias en la base de datos utilizando los archivos de migración.

```bash
php artisan migrate
```

### 9. Iniciar el servidor de desarrollo

>Inicia un servidor web local. Visita http://localhost:8000/login para ver el proyecto en el navegador.

```bash
php artisan serve
```



























