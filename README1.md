# StudyConnect 🎓

Una plataforma social diseñada para conectar estudiantes universitarios y facilitar el aprendizaje colaborativo.

## Características

- Sistema de autenticación con perfiles académicos
- Feed de posts y sistema de likes/comentarios
- Seguimiento entre estudiantes
- Filtros por universidad y carrera
- Interfaz moderna con Tailwind CSS

## Instalación

```bash
# Clonar repositorio
git clone [tu-repo-url]
cd studyconnect

# Instalar dependencias
composer install
npm install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env y ejecutar
php artisan migrate --seed
```

## Uso

```bash
# Iniciar servidor Laravel
php artisan serve

# Compilar assets (en terminal separado)
npm run dev
```

Visita `http://localhost:8000` y registra tu cuenta o usa:
- Email: `test@studyconnect.com`  
- Password: `password`

## Stack Tecnológico

- **Backend:** Laravel 10+
- **Frontend:** Blade Templates + Tailwind CSS
- **Base de datos:** MySQL
- **Build tools:** Vite
- **Autenticación:** Laravel Breeze

## Estructura del Proyecto

- Modelos principales: User, Post, Comment, Like, Follow
- Controllers organizados por funcionalidad
- Vistas Blade con componentes reutilizables
- Sistema de migraciones y seeders

## Contribuir

1. Fork el proyecto
2. Crea una rama para tu feature
3. Commit tus cambios
4. Push a la rama
5. Abre un Pull Request
