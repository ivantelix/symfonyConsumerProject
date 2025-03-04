
# Symfony Consumer Service

Este es un proyecto Symfony para consumir y procesar datos desde un servicio CSV.

## 🚀 Requisitos

- PHP 8.1 o superior
- Composer
- Symfony CLI (opcional, pero recomendado)
- Servidor web (Apache/Nginx) o Symfony Server
- Base de datos (MySQL/PostgreSQL, si aplica)

## 📦 Instalación

### 1. Clona el repositorio:

```bash
git clone git@github.com:ivantelix/symfonyConsumerProject.git
cd symfonyConsumerProject
```

### 2. Crea y configura el archivo `.env`:

```bash
cp .env.example .env
```

Modifica las variables según tu entorno (base de datos, API keys, etc.).
```
CSV_API_URL=tu-url
CSV_API_USERNAME=tu-username
CSV_API_PASSWORD=tu-password
```

### 3. Instala las dependencias:

```bash
composer install
```


## ▶️ Ejecución del Proyecto

### Con Symfony Server (recomendado)

```bash
symfony serve
```

## 📜 Uso del Servicio CSV

Para consumir el CSV, accede a la siguiente ruta:

[http://localhost:8000/consume-csv](http://localhost:8000/consume-csv)

Esto mostrará los datos paginados en una tabla.

## 🛠 Despliegue en Producción

1. Configura las variables de entorno en `.env`.

2. Genera la caché optimizada:

```bash
php bin/console cache:clear --env=prod
```

3. Configura un servidor web (Apache/Nginx) apuntando al directorio `public/`.

## 📄 Licencia

Este proyecto está bajo la licencia MIT.
