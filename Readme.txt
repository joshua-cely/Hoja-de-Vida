README para el Proyecto "Sistema de Hoja de Vida de Equipos"
   

Descripción
   

El "Sistema de Hoja de Vida de Equipos" es una aplicación web diseñada para gestionar el inventario de computadores en una organización. Permite registrar, editar, eliminar y visualizar equipos, así como registrar entradas y salidas de los mismos. La aplicación está construida en PHP y utiliza MySQL como base de datos.    

Características
   

Gestión de Equipos: Agregar, editar y eliminar computadores.
Registro de Entradas y Salidas: Registrar la entrada y salida de equipos, manteniendo un historial de movimientos.
Búsqueda: Buscar equipos por número de serie (placa).
Interfaz Amigable: Diseño responsivo y fácil de usar.    
Tecnologías Utilizadas
   

Backend: PHP
Base de Datos: MySQL
Frontend: HTML, CSS
JavaScript: Para interactividad en la interfaz.    
Estructura del Proyecto
   

/MarketHojaDeVida
│
├── config
│   └── conexion.php          # Configuración de conexión a la base de datos
│
├── controlador
│   ├── eliminar_equipo.php    # Controlador para eliminar equipos
│   ├── logout.php             # Controlador para cerrar sesión
│   ├── procesar_editar.php    # Controlador para editar equipos
│   ├── procesar_entrada.php    # Controlador para registrar entradas
│   ├── procesar_equipo.php    # Controlador para agregar nuevos equipos
│   ├── procesar_login.php      # Controlador para iniciar sesión
│   ├── procesar_salida.php     # Controlador para registrar salidas
│   └── procesar_usuario.php     # Controlador para agregar nuevos usuarios
│
├── css
│   ├── detalle.css            # Estilos para la vista de detalles de equipos
│   ├── equipos.css            # Estilos para la vista de equipos
│   ├── estilos.css            # Estilos generales
│   └── form.css               # Estilos para formularios
│
├── js
│   └── script.js              # Scripts de JavaScript para interactividad
│
├── vista
│   ├── agregar_entrada.php     # Vista para agregar entradas de equipos
│   ├── agregar_equipo.php      # Vista para agregar nuevos equipos
│   ├── agregar_salida.php      # Vista para agregar salidas de equipos
│   ├── agregar_usuario.php      # Vista para agregar nuevos usuarios
│   ├── dashboard.php           # Vista del panel de control
│   ├── detalle_equipo.php      # Vista de detalles de un equipo
│   ├── editar.php              # Vista para editar un equipo
│   ├── login.php               # Vista para iniciar sesión
│   ├── ver_equipos.php         # Vista para ver todos los equipos
│   └── ver_registros.php       # Vista para ver registros de entradas y salidas
│
└── index.php                  # Página de inicio

Instalación
   

Clonar el Repositorio
git clone https://github.com/tu_usuario/tu_repositorio.git
   

Configurar la Base de Datos:

Crea una base de datos llamada inventario en MySQL.
Importa el archivo SQL que contiene la estructura de las tablas y datos iniciales (si está disponible).    
Configurar la Conexión:

Edita el archivo config/conexion.php para ajustar las credenciales de la base de datos si es necesario.    
Ejecutar el Servidor:

Asegúrate de tener un servidor web (como Apache) y PHP configurados.
Coloca el proyecto en el directorio raíz del servidor (por ejemplo, htdocs en XAMPP).    
Acceder a la Aplicación:

Abre un navegador y navega a http://localhost/MarketHojaDeVida/index.php.    
Uso
   

Iniciar Sesión: Utiliza las credenciales de un usuario existente para acceder al sistema.
Gestionar Equipos: Desde el panel de control, puedes agregar, editar o eliminar equipos.
Registrar Entradas y Salidas: Accede a las vistas correspondientes para registrar la entrada y salida de equipos.
Buscar Equipos: Utiliza la barra de búsqueda para encontrar equipos por su número de serie.    