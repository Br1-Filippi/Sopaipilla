# 🍪 Proyecto Sopaipilla

---

## 📋 Requisitos

Asegúrate de tener instalados los siguientes recursos antes de comenzar:

- PHP >= 8.1  
- Composer  
- XAMPP (Apache + MySQL)  
- Git  
- Gitmoji CLI (para mensajes de commit con emojis)

---

## 🚀 Instalación

Sigue estos pasos para configurar el entorno local:

1. Clona el repositorio:

   git clone https://github.com/tuusuario/sopaipilla.git  
   cd sopaipilla

2. Instala las dependencias del proyecto:

   composer install

3. Copia el archivo de entorno y genera tu clave de aplicación:

   cp .env.example .env  
   php artisan key:generate

4. Configura tu archivo `.env`  
   Modifica las variables de entorno para que coincidan con los datos de tu base de datos local (host, usuario, contraseña, nombre de base de datos, etc).

5. Ejecuta las migraciones:

   php artisan migrate

6. Levanta el servidor de desarrollo:

   php artisan serve

Accede a la aplicación en http://localhost:8000

---

## 🧪 Testing y Deploy

- Para contribuir, crea una nueva rama desde `main` siguiendo el formato:

  git checkout -b tunombre/feature-nombre

- Asegúrate de incluir pruebas automatizadas relevantes para cada funcionalidad nueva.

- Al hacer push, GitHub ejecutará automáticamente:
  - Los **tests** definidos en el proyecto.
  - Las **migraciones** necesarias en el entorno de testing.

⚠️ Asegúrate de que tu código pase todas las pruebas antes de crear un Pull Request.

---

## ✅ Buenas Prácticas

- Usa mensajes de commit con Gitmoji para mantener un historial visual y ordenado.
- Revisa el código antes de subirlo.
- Mantén tus migraciones organizadas y tus factories/seeds si es necesario para pruebas.

---
