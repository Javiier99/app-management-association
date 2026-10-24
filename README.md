# 🏛️ Gestión Asociación

Sistema de gestión interna y presencia web para una asociación, compuesto por una **web pública** informativa y un **dashboard privado** de administración de socios, cuotas y finanzas.

---

## 📌 Descripción del proyecto

Las asociaciones pequeñas suelen gestionar sus socios, cuotas e ingresos/gastos de forma manual: hojas de cálculo sueltas, anotaciones en papel o mensajes dispersos para saber quién ha pagado la cuota del mes. Esto genera varios problemas:

- No hay un registro centralizado ni histórico de pagos.
- Es difícil saber de un vistazo quién está al día con la cuota mensual.
- No existe una visión clara del balance real de la asociación (cuánto hay en el banco, cuánto ha entrado y salido).
- No hay ninguna presencia online que permita a personas externas conocer la asociación o solicitar unirse a ella.

### Solución

Este proyecto aborda ambos problemas con dos piezas independientes:

1. **Un dashboard privado** donde un administrador puede dar de alta y gestionar a todos los socios, llevar un control mensual de quién ha pagado la cuota, y registrar todos los ingresos y gastos de la asociación para conocer el balance real en todo momento.
2. **Una web pública** donde cualquier persona ajena a la asociación puede conocer quiénes son, qué hacen, cómo contactar y cómo unirse, mediante un formulario de solicitud.

Ambas partes viven en el mismo dominio pero son proyectos técnicamente independientes: la web pública en el dominio principal, y el dashboard en un subdominio aislado y protegido por login.

```
midominio.com            → Web pública
dashboard.midominio.com  → Dashboard privado de gestión
```

---

## 🛠️ Tecnologías y lenguajes utilizados

El proyecto está construido **sin frameworks ni librerías externas**, de forma totalmente manual, como ejercicio de control absoluto sobre el código y para evitar dependencias innecesarias en un proyecto de este tamaño.

| Capa | Tecnología |
|---|---|
| Estructura y contenido | HTML5 |
| Estilos | CSS3 |
| Interactividad en el navegador | JavaScript (vanilla) |
| Lógica de servidor | PHP (puro, sin Composer ni frameworks) |
| Base de datos | MySQL |
| Acceso a base de datos | PDO (PHP Data Objects) con consultas preparadas |
| Autenticación | Sesiones nativas de PHP (`$_SESSION`) + `password_hash()` / `password_verify()` |

No se utiliza ningún framework de frontend (React, Vue, etc.) ni de backend (Laravel, Symfony, etc.), ni gestores de paquetes (npm, Composer): todo el código es nativo del lenguaje correspondiente.

---

## 📁 Estructura del proyecto

```
/public-web                 → Web pública (estática)
  index.html
  quienes-somos.html
  que-hacemos.html
  unete.html
  contacto.html
  /css/style.css
  /js/main.js
  /assets/
  procesar-unete.php        → procesa el formulario de "Únete"

/dashboard                  → Panel de administración (privado)
  /config/db.php            → conexión PDO a la base de datos
  /includes/auth.php        → control de sesión y acceso
  index.php                 → login
  usuarios.php              → gestión de socios
  cuotas.php                → control de pagos mensuales
  finanzas.php              → ingresos, gastos y balance
  solicitudes.php           → altas pendientes desde la web pública
  /css/
  /js/
```

---

## 🔐 Seguridad y privacidad

- Cada página del dashboard (excepto el login) verifica que exista una sesión activa antes de mostrar contenido.
- Las contraseñas se almacenan únicamente como hash (`password_hash()`), nunca en texto plano.
- Las consultas a la base de datos se hacen mediante PDO con sentencias preparadas, evitando inyección SQL.
- Al tratarse de datos personales reales (nombre, teléfono, correo, dirección), el proyecto tiene en cuenta el **RGPD**: acceso restringido al dashboard y aviso de privacidad en el formulario público de "Únete".

---

## 👤 Autor

Proyecto desarrollado a petición de una asociación, construido íntegramente a mano como ejercicio de desarrollo con PHP y MySQL sin frameworks ni dependencias externas.
