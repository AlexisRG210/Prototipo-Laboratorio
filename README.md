# 🧪 Sistema de Gestión e Inventario Centralizado - Laboratorio de Química

Este sistema es una solución tecnológica integral diseñada para optimizar, automatizar y controlar el flujo de insumos, materiales y reactivos dentro del Laboratorio de Química del **CETIS No. 99**. Desarrollado con un enfoque de arquitectura limpia y separación de responsabilidades, el sistema transforma procesos manuales en flujos digitales transaccionales en tiempo real.

---

## 🚀 Características Principales

* **Panel Central de Inventarios (SaaS Style):** Interfaz unificada con aislamiento de datos a través de pestañas dinámicas para separar la visualización de Materiales y Reactivos, evitando sobrecarga en el DOM.
* **Buscador Inteligente en Vivo:** Algorítmica asíncrona en el cliente que implementa normalización Unicode, permitiendo filtrados instantáneos insensibles a mayúsculas, minúsculas o caracteres especiales (tildes).
* **Gestión de Almacén Dinámica:** Control automatizado de existencias mediante indicadores visuales críticos que alertan sobre reactivos o componentes agotados en tiempo real.
* **Módulo de Solicitudes y Vales de Resguardo:** Interfaz fluida y responsiva basada en rejillas elásticas (CSS Grid/Flexbox) que genera vales de resguardo listos para impresión física, integrando manipulación dinámica del DOM y vectores en JS.
* **Flujo de Altas y Devoluciones Optimizado:** Panel interactivo de inserción conmutada por pestañas que agiliza el registro físico de nuevas existencias sin recargas innecesarias en el servidor.

---

## 🛠️ Stack Tecnológico

* **Backend:** PHP (Arquitectura de scripts modulares y procesamiento nativo de peticiones HTTP POST).
* **Frontend:** HTML5, CSS3 Estructurado (Ecosistema personalizado moderno basado en variables globales `:root`, técnicas avanzadas de Scrolling Interno y cabeceras de tabla fijas `sticky`), JavaScript (ES6+).
* **Asincronía (AJAX):** jQuery para la comunicación en segundo plano y actualización del stock sin tirones visuales.
* **Base de Datos:** MySQL (Estructura relacional transaccional para control estricto de bitácoras y catálogos).
* **Librerías de Interfaz:** Lucide Icons (Renderizado automático de vectores iconográficos).

---

## 📁 Estructura del Repositorio

Para garantizar la escalabilidad y el orden del proyecto, la arquitectura de archivos se depuró eliminando dependencias circulares y redundancias:

```text
├── html/               # Interfaces estáticas optimizadas (Devolución, Altas)
├── php/                # Scripts de control backend, consultas SQL y procesamiento de inventario
├── estilos/            # Hojas de estilo estructuradas independientes
│   ├── style.css       # Core global del entorno oscuro, formularios y componentes unificados
│   ├── stylein.css     # Estilos exclusivos del panel central de inventarios y scrollbar empotrada
│   └── styleadd.css    # Estilos de transiciones y pestañas de altas de almacén
├── index.html          # Landing Page corporativa y puerta de acceso al sistema (V0.3.1)
└── README.md           # Documentación técnica del sistema