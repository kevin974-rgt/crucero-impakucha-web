# Barco Vikingo – Crucero Impakucha

Sitio web promocional y de reservas para el **Barco Vikingo (Crucero Impakucha)**, una embarcación turística de dos pisos que ofrece paseos en el **Lago San Pablo, Otavalo, Ecuador**.

🌐 **Sitio en vivo:** https://barcovikingosanpablo.com/

Proyecto de titulación de la carrera de Tecnología en Desarrollo de Software (PUCE TEC).

## ¿Qué hace?

**Para los visitantes**
- Páginas de Inicio, Nosotros, Servicios, Galería y Contacto.
- Formulario de reservas de paseos.
- Formulario para dejar testimonios.
- Formulario de contacto para enviar mensajes al negocio.
- Galería de fotos y videos del crucero.
- Diseño adaptable a celular y animaciones al hacer scroll.
- SEO básico: títulos y descripciones por página, `sitemap.xml` y `robots.txt`.

**Para el administrador (panel privado)**
- Inicio de sesión protegido.
- Ver y eliminar los mensajes recibidos.
- Aprobar, rechazar o eliminar reservas.
- Aprobar, rechazar o eliminar testimonios antes de que se publiquen.
- Subir y eliminar fotos y videos de la galería.

## Tecnologías

- **Backend:** PHP 8.2+ con CodeIgniter 4
- **Base de datos:** MySQL (driver MySQLi)
- **Frontend:** HTML, CSS y JavaScript, con la librería AOS para animaciones
- **Herramientas:** Visual Studio Code, XAMPP, Composer, Git

## Seguridad

- Las contraseñas del administrador se guardan con `password_hash` (nunca en texto plano).
- El acceso a las páginas del panel exige una sesión iniciada.
- Los datos de conexión a la base de datos viven en el archivo `.env`, que no se sube al repositorio.

## Cómo ejecutarlo en tu computadora

1. Instala [XAMPP](https://www.apachefriends.org/) y [Composer](https://getcomposer.org/).
2. Clona el repositorio dentro de `htdocs`:

   ```
   git clone https://github.com/kevin974-rgt/crucero-impakucha-web.git
   cd crucero-impakucha-web
   composer install
   ```

3. Crea una base de datos MySQL con las tablas `usuarios`, `mensajes`, `reservas`, `testimonios` y `galeria`. El script SQL no se incluye en este repositorio.
4. Crea un archivo `.env` en la raíz del proyecto con tus datos:

   ```
   CI_ENVIRONMENT = development
   database.default.hostname = localhost
   database.default.database = NOMBRE_DE_TU_BASE
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

5. Inicia el servidor de desarrollo:

   ```
   php spark serve
   ```

   y abre http://localhost:8080

## Autor

**Kevin Alba** – Tecnólogo Superior en Desarrollo de Software
GitHub: [@kevin974-rgt](https://github.com/kevin974-rgt)