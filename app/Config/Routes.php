<?php

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultController('Main');
$routes->get('/', 'Main::index');
$routes->post('Main/logIn', 'Main::logIn');
$routes->post('Main/BuscarDireccion', 'Main::BuscarDireccion');
$routes->get('Main/ModificarSolicitud/(:num)/(:any)', 'Main::ModificarSolicitud/$1/$2');
$routes->post('Main/ModificarSolicitudBD', 'Main::ModificarSolicitudBD');
$routes->post('Main/RegistrarAgenciaFront', 'Main::RegistrarAgenciaFront');
$routes->get('Main/RegistrarAgenciaFront', 'Main::RegistrarAgenciaFront');

$routes->get('Aviso', 'Aviso::index');
$routes->get('Dashboard', 'Dashboard::index');
$routes->get('Dashboard/LogOut', 'Dashboard::LogOut');

$controller = 'CmsFrontpage::';
$routes->group('CmsFrontpage', static function ($routes) use ($controller) {
    $routes->get('Slider', $controller.'Slider');
    $routes->get('Plazas', $controller.'Plazas');
    $routes->get('Nosotros', $controller.'Nosotros');
    $routes->get('Aviso', $controller.'Aviso');
    $routes->get('Mbp', $controller.'Mbp');
    $routes->post('DataModificar', $controller.'DataModificar');
    $routes->post('StatusSlider', $controller.'StatusSlider');
    $routes->post('AdministrarSlider', $controller.'AdministrarSlider');
    $routes->post('AdministrarPlazas', $controller.'AdministrarPlazas');
    $routes->post('AdministrarNosotros', $controller.'AdministrarNosotros');
    $routes->post('AdministrarValores', $controller.'AdministrarValores');
    $routes->post('AdministrarBannerAviso', $controller.'AdministrarBannerAviso');
    $routes->post('AdministrarAvisos', $controller.'AdministrarAvisos');
    $routes->post('AdministrarLogoMBP', $controller.'AdministrarLogoMBP');
    $routes->post('AdministrarSliderMBP', $controller.'AdministrarSliderMBP');
    $routes->post('AdministrarTextoFooterMBP', $controller.'AdministrarTextoFooterMBP');
    $routes->post('EliminarTextoFooterMBP', $controller.'EliminarTextoFooterMBP');
    $routes->post('AdministrarFooterMBP', $controller.'AdministrarFooterMBP');
    $routes->post('CambiarStatusImagenMBP', $controller.'CambiarStatusImagenMBP');
});

$controllerExtDestinos = 'ExtDestinos::';
$routes->get('ExtDestinos', $controllerExtDestinos.'index');
$routes->group('ExtDestinos', static function ($routes) use ($controllerExtDestinos) {
    // POST /ExtDestinos/Administrar (Agregar/Modificar destino)
    $routes->post('Administrar', $controllerExtDestinos.'Administrar');
    // POST /ExtDestinos/Data (Obtener datos de un destino específico)
    $routes->post('Data', $controllerExtDestinos.'Data');
});

$controllerExtAgencias = 'ExtAgencias::';
$routes->get('ExtAgencias', $controllerExtAgencias.'index');
$routes->group('ExtAgencias', function ($routes) use ($controllerExtAgencias) {

    // Vista para la administración/modificación de una agencia
    $routes->get('Administrar', $controllerExtAgencias . 'Administrar');

    // --- Rutas de Acciones (CRUD & AJAX) ---
    // 1. Agregar Agencia
    $routes->post('AgregarAgencia', $controllerExtAgencias . 'AgregarAgencia');

    // 2. Modificar Agencia
    $routes->post('ModificarAgencia', $controllerExtAgencias . 'ModificarAgencia');

    // 3. Cambiar Status
    $routes->post('Status', $controllerExtAgencias . 'Status');

    // 4. Guardar ID en Sesión
    $routes->post('SaveID', $controllerExtAgencias . 'SaveID');

    // 5. Cargar datos para modificación (AJAX)
    $routes->post('DataModificar', $controllerExtAgencias . 'DataModificar');

    // 6. CRUD de Usuarios
    $routes->post('Usuarios', $controllerExtAgencias . 'Usuarios');

    // 7. CRUD de Cuentas Bancarias
    $routes->post('Cuentas', $controllerExtAgencias . 'Cuentas');

    // 8. CRUD de Documentos
    $routes->post('Documentos', $controllerExtAgencias . 'Documentos');

    // 9. CRUD de Datos Fiscales
    $routes->post('DatosFiscales', $controllerExtAgencias . 'DatosFiscales');

    // 10. Gestión de Configuración (Guarda/Actualiza configuración de pagos/canales)
    $routes->post('Configuracion', $controllerExtAgencias . 'Configuracion');

    // 12. Obtener Datos de Agencia por ID (Consulta de datos para vistas o AJAX)
    $routes->post('DataAgencia', $controllerExtAgencias . 'DataAgencia');

    // 13. Aceptar Solicitud de Agencia (Cambia el status a Aceptada)
    $routes->post('AceptarSolicitud', $controllerExtAgencias . 'AceptarSolicitud');

    // 14. Rechazar Solicitud de Agencia (Cambia el status a Rechazada)
    $routes->post('RechazarSolicitud', $controllerExtAgencias . 'RechazarSolicitud');

    $routes->post('EliminarSolicitud', $controllerExtAgencias . 'EliminarSolicitud');
});

$controllerExtHoteles = 'ExtHoteles::';
$routes->get('ExtHoteles', $controllerExtHoteles.'index');
$routes->group('ExtHoteles', function ($routes) use ($controllerExtHoteles){

    // Vista para la administración/modificación de un hotel
    $routes->get('Administrar', $controllerExtHoteles . 'Administrar');

    $routes->post('AgregarHotel', $controllerExtHoteles . 'AgregarHotel');

    $routes->post('SaveID', $controllerExtHoteles . 'SaveID');

    $routes->post('DatosGenerales', $controllerExtHoteles . 'DatosGenerales');

    $routes->post('DatosFiscales', $controllerExtHoteles . 'DatosFiscales');

    $routes->post('DataModificar', $controllerExtHoteles . 'DataModificar');

    $routes->post('DataModificar2', $controllerExtHoteles . 'DataModificar2');

    $routes->post('Usuarios', $controllerExtHoteles . 'Usuarios');

    $routes->post('Cuentas', $controllerExtHoteles . 'Cuentas');

    $routes->post('Habitaciones', $controllerExtHoteles . 'Habitaciones');

    $routes->post('ImagenesHabitaciones', $controllerExtHoteles . 'ImagenesHabitaciones');

    $routes->post('Inventario', $controllerExtHoteles . 'Inventario');

    $routes->post('AbrirCerrarFechasInventario', $controllerExtHoteles . 'AbrirCerrarFechasInventario');

    $routes->post('Tarifas', $controllerExtHoteles . 'Tarifas');

    $routes->post('Promociones', $controllerExtHoteles . 'Promociones');

    $routes->post('Restricciones', $controllerExtHoteles . 'Restricciones');

    $routes->post('ImagenesHotel', $controllerExtHoteles . 'ImagenesHotel');

    $routes->get('ImagenesHotel', $controllerExtHoteles . 'ImagenesHotel');

    $routes->post('DestinoMBP', $controllerExtHoteles . 'DestinoMBP');

    $routes->post('HotelMBP', $controllerExtHoteles . 'HotelMBP');

    $routes->post('FotosMBP', $controllerExtHoteles . 'FotosMBP');

    $routes->post('VideosMBP', $controllerExtHoteles . 'VideosMBP');

    $routes->post('CambiarStatusImagenesHabitaciones', $controllerExtHoteles . 'CambiarStatusImagenesHabitaciones');

    $routes->post('PaquetesMBP', $controllerExtHoteles . 'PaquetesMBP');

    $routes->post('CambiarStatus', $controllerExtHoteles . 'CambiarStatus');

});

$routes->get('mibodaenlaplaya', 'MbpLanding::index');
$routes->get('mibodaenlaplaya/destino/(:num)', 'MbpLanding::hotel/$1');
$controllerMBPLanding = 'CmsFrontpage::';

$controllerBooking = 'Booking::';
$routes->get('Booking', $controllerBooking.'index');
$routes->group('Booking', function ($routes) use ($controllerBooking){
    $routes->get('getDestinos', $controllerBooking . 'getDestinos');
    $routes->get('Search', $controllerBooking . 'Search');
    $routes->get('Checkout', $controllerBooking . 'Checkout');
    $routes->post('Confirmar', $controllerBooking . 'Confirmar');
    $routes->get('Confirmacion/(:any)', $controllerBooking . 'Confirmacion/$1');
    $routes->get('Reservaciones', $controllerBooking . 'Reservaciones');
    $routes->get('Agencia', $controllerBooking . 'Agencia');
});

$controllerExtReservaciones = 'ExtReservaciones::';
$routes->get('ExtReservaciones', $controllerExtReservaciones.'index');

$controllerExtNaturCharter = 'ExtNaturcharter::';
$routes->get('ExtNaturcharter', $controllerExtNaturCharter.'index');
$routes->group('ExtNaturcharter', function ($routes) use ($controllerExtNaturCharter){
    $routes->get('Abordaje', $controllerExtNaturCharter . 'Abordaje');
    $routes->get('Reportes', $controllerExtNaturCharter . 'Reportes');
    $routes->get('Pendientes', $controllerExtNaturCharter . 'Pendientes');
    $routes->get('Administrar', $controllerExtNaturCharter . 'Administrar');
    $routes->post('Agregar', $controllerExtNaturCharter . 'Agregar');
    $routes->post('SaveID', $controllerExtNaturCharter . 'SaveID');
    $routes->post('CambiarStatus', $controllerExtNaturCharter . 'CambiarStatus');
    $routes->post('DatosGenerales', $controllerExtNaturCharter . 'DatosGenerales');
    $routes->post('DatosFiscales', $controllerExtNaturCharter . 'DatosFiscales');
    $routes->post('Cuentas', $controllerExtNaturCharter . 'Cuentas');
    $routes->post('DataModificar', $controllerExtNaturCharter . 'DataModificar');
    $routes->get('Salidas', $controllerExtNaturCharter . 'Salidas');
    $routes->post('AdministrarSalidas', $controllerExtNaturCharter . 'AdministrarSalidas');
    $routes->post('Tarifas', $controllerExtNaturCharter . 'Tarifas');
});

$controllerExtTours = 'ExtTours::';
$routes->get('ExtTours', $controllerExtTours.'index');
$routes->group('ExtTours', function ($routes) use ($controllerExtTours){
    $routes->get('Administrar', $controllerExtTours . 'Administrar');
    $routes->post('AgregarTour', $controllerExtTours . 'AgregarTour');
    $routes->post('SaveID', $controllerExtTours . 'SaveID');
    $routes->post('CambiarStatus', $controllerExtTours . 'CambiarStatus');
    $routes->post('DatosFiscales', $controllerExtTours . 'DatosFiscales');
    $routes->post('DatosGenerales', $controllerExtTours . 'DatosGenerales');
    $routes->post('Cuentas', $controllerExtTours . 'Cuentas');
    $routes->post('DataModificar', $controllerExtTours . 'DataModificar');
    $routes->post('Tarifas', $controllerExtTours . 'Tarifas');
});

$controllerExtNaturflight = 'ExtNaturflight::';
$routes->get('ExtNaturflight', $controllerExtNaturflight.'index');
$routes->group('ExtNaturflight', function ($routes) use ($controllerExtNaturflight){
    $routes->get('Administrar', $controllerExtNaturflight . 'Administrar');
    $routes->get('Rutas', $controllerExtNaturflight . 'Rutas');
    $routes->post('Agregar', $controllerExtNaturflight . 'Agregar');
    $routes->post('SaveID', $controllerExtNaturflight . 'SaveID');
    $routes->post('CambiarStatus', $controllerExtNaturflight . 'CambiarStatus');
    $routes->post('DatosGenerales', $controllerExtNaturflight . 'DatosGenerales');
    $routes->post('DatosFiscales', $controllerExtNaturflight . 'DatosFiscales');
    $routes->post('Cuentas', $controllerExtNaturflight . 'Cuentas');
    $routes->post('DataModificar', $controllerExtNaturflight . 'DataModificar');
    $routes->post('Tarifas', $controllerExtNaturflight . 'Tarifas');
    $routes->post('AdministrarRutas', $controllerExtNaturflight . 'AdministrarRutas');
});

$controllerExtUsuarios = 'ExtUsuarios::';
$routes->get('ExtUsuarios', $controllerExtUsuarios.'index');
$routes->group('ExtUsuarios', function ($routes) use ($controllerExtUsuarios){
    $routes->post('Administrar', $controllerExtUsuarios . 'Administrar');
    $routes->post('CargarHoteles', $controllerExtUsuarios . 'CargarHoteles');
    $routes->post('CargarAgencias', $controllerExtUsuarios . 'CargarAgencias');
    $routes->post('AdministrarUsuario', $controllerExtUsuarios . 'AdministrarUsuario');
    $routes->post('DataUsuario', $controllerExtUsuarios . 'DataUsuario');
    $routes->post('CambiarEstado', $controllerExtUsuarios . 'CambiarEstado');
});

$controllerExtPagos = 'ExtPagos::';
$routes->get('ExtPagos', $controllerExtPagos.'index');
$routes->group('ExtPagos', function ($routes) use ($controllerExtPagos){
    $routes->get('Proveedores', $controllerExtPagos . 'Proveedores');
    $routes->get('HistorialProveedores', $controllerExtPagos . 'HistorialProveedores');
    $routes->get('Agencias', $controllerExtPagos . 'Agencias');
    $routes->get('HistorialAgencias', $controllerExtPagos . 'HistorialAgencias');
});

$controllerExtCobros = 'ExtCobros::';
$routes->get('ExtCobros', $controllerExtCobros.'index');
$routes->group('ExtCobros', function ($routes) use ($controllerExtCobros){
    $routes->post('ObtenerReserva', $controllerExtCobros . 'ObtenerReserva');
    $routes->get('CronosPay', $controllerExtCobros . 'CronosPay');
    $routes->get('CronosPayLink', $controllerExtCobros . 'CronosPayLink');
    $routes->post('ProcesarPago', $controllerExtCobros . 'ProcesarPago');
    $routes->post('GuardarLinkPago', $controllerExtCobros . 'GuardarLinkPago');
    $routes->post('DesactivarLink', $controllerExtCobros . 'DesactivarLink');
    $routes->post('ObtenerLink', $controllerExtCobros . 'ObtenerLink');
});