# 🧪 Testing Manual - StudyConnect Profile

## ⚡ Quick Test Protocol

### Pre-requisitos
- [ ] MySQL corriendo
- [ ] BD `studyconnect` creada y migrada
- [ ] `composer install` ejecutado
- [ ] `npm install` ejecutado

### Comandos de inicio
```bash
# Terminal 1
php artisan serve

# Terminal 2 (CRÍTICO)
npm run dev
```

### 🔍 Test Sequence

#### 1. Verificar BD
- [ ] `http://localhost:8000/check-db`
- Debe mostrar: 21 users, 72 posts

#### 2. Login Flow
- [ ] `http://localhost:8000/login`
- Email: `test@studyconnect.com`
- Password: `password`
- [ ] Login exitoso → redirect a dashboard

#### 3. Navigation Test
- [ ] Navbar muestra logo StudyConnect con ícono
- [ ] Menú tiene "🏠 Dashboard" y "👤 Mi Perfil"
- [ ] Dropdown tiene "👤 Ver Perfil" y "⚙️ Configuración"

#### 4. Profile Page Test
- [ ] Click en "👤 Mi Perfil" desde navbar
- [ ] URL: `http://localhost:8000/profile`

**Profile Elements:**
- [ ] Header con cover gradient azul-púrpura
- [ ] Avatar redondo con border blanco
- [ ] Nombre: "Rafael Estudiante"
- [ ] Carrera: "🎓 Ingeniería de Sistemas"
- [ ] Universidad: "🏫 Universidad de Lima"
- [ ] Ciclo: "📚 8° Ciclo"

**Stats Cards:**
- [ ] 4 cards con hover effect (scale)
- [ ] Posts count > 0
- [ ] Seguidores, Siguiendo, Likes counts
- [ ] Hover sobre cards → escala ligeramente

**Posts Section:**
- [ ] Sección "📝 Mis Posts Recientes"
- [ ] Badge con número de posts
- [ ] Posts cards con contenido
- [ ] Avatar + nombre + timestamp
- [ ] Botones de like y comment con counts

#### 5. Interactivity Test
- [ ] Click en botón like (corazón) → animación
- [ ] Hover sobre stats cards → smooth transform
- [ ] Botón "Editar Perfil" → va a `/profile/edit`

#### 6. Responsive Test
- [ ] Resize ventana → layout responsive
- [ ] Mobile view → hamburger menu funciona
- [ ] Cards se reorganizan en mobile

#### 7. Animations Test
- [ ] Page load → fade-in animation
- [ ] Badge números → float animation
- [ ] Empty state → ícono flotante

### 🚨 Common Issues

**Estilos no cargan:**
- Verificar `npm run dev` corriendo
- F5 hard refresh

**Error 419:**
- `php artisan config:clear`
- Refresh page

**BD vacía:**
- `php artisan migrate --seed`

**Avatar no carga:**
- Debería mostrar fallback UI-Avatars

### ✅ Success Criteria

Perfil está functional si:
- [x] Todos los elementos visuales cargan
- [x] Animaciones funcionan smooth
- [x] Hover effects respondan
- [x] Navegación funciona sin errores
- [x] Stats muestran números reales
- [x] Posts se muestran con data real

---

**🎯 Status:** Ready for next sprint (Feed Principal)
