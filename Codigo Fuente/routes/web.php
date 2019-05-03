<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Auth::routes();
Route::get('/', function () {
    return view('index');
});
Route::get('/specialities', function () {
    return view('specialities');
});
Route::get('/gallery', function () {
    return view('gallery');
});

// Route::get('/services', function () {
//     return view('services');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/password/reset','Auth\ResetPasswordController@reset')->name('password-reset');
    Route::post('/register', 'Auth\RegisterController@register');

    Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.auth');
    Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
    
});
Route::get('/activacion/{token}', 'UserController@activacionCliente');
Route::get('/password/modification/{token}', 'Auth\ResetPasswordController@validation');
Route::post('/password/modification', 'Auth\ResetPasswordController@modification')->name('password-modification');

Route::group(['middleware'=>['auth']],function(){

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/main','AdminController@index')->name('main');
    Route::get('/client','ClienteController@loginSuccess')->name('client');
    
    Route::resource('/client/cita','CitaController');
    Route::get('/client/citacliente/{id}','CitaController@citaCliente');
    Route::get('/cita/citalist','CitaController@citasList');
    
    Route::get('/client/citaclienteespecialista/{id}','CitaController@citaClienteEspecialista');
    Route::get('/client/citaclienteespecialistasearch','CitaController@citaClienteEspecialistaSearch');

    Route::post('/client/desactivarcita','CitaController@desactivar');
    Route::post('/client/editarcita','CitaController@update');
    Route::get('/client/miscitas','CitaController@misCitas');
    Route::post('/client/miscitasid','CitaController@misCitasId');

    Route::get('/client/doctorsearch','UserController@doctorSearch');
    Route::get('/client/listtipoconsulta','CitaController@listTipoConsulta');
    Route::post('/payment', 'PaymentController@Payment');
    Route::get('/client/citapayment', 'PaymentController@citaPayment');
    Route::get('/client/mispagos', 'PaymentController@misPagos');
    Route::get('/client/mispagossearch', 'PaymentController@misPagosSearch');
    Route::get('/client/pdfsingle', 'PaymentController@pagoListSingle');

    Route::get('/client/logoutlogin', 'UserController@logoutLogin');
    Route::get('/client/listlogin', 'UserController@listData');
    Route::get('/calendar/listall', 'CalendarController@listAll');
    Route::get('/client/perfil', function(){
        return view('cliente.perfil.perfil');
    });
    Route::post('/client/perfilupdate', 'UserController@updateLogin');
    
    
    Route::get('/client/citaclientepayment', 'CitaController@citasPayment');
    Route::get('/client/citaclientepaymentcomplete', 'CitaController@citasPaymentComplete');
    Route::group(['middleware' => ['Almacenero']], function () {
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

    });

    Route::group(['middleware' => ['Vendedor']], function () {
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');
 
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
    });

    Route::group(['middleware' => ['Administrador']], function () {
        

        Route::get('/cita', 'CitaController@citaList');
        Route::post('/cita/registrar', 'CitaController@store');
        Route::put('/cita/actualizar', 'CitaController@update');
        Route::post('/cita/actualizar-estado', 'CitaController@updateEstado');
        Route::put('/cita/desactivar', 'CitaController@desactivar');
        Route::put('/cita/activar', 'CitaController@activar');

        Route::get('/cita/pdfsingle', 'CitaController@citaListSingle');

        
        Route::get('/calendar', 'CalendarController@index');
        Route::post('/calendar/registrar', 'CalendarController@store');
        Route::put('/calendar/actualizar', 'CalendarController@update');
        Route::delete('/calendar/eliminar/{id}', 'CalendarController@destroy');
       

        Route::get('/pago', 'CitaController@citaList');
        Route::post('/pago/registrar', 'CitaController@store');
        Route::post('/pago/actualizar-pago', 'PaymentController@pagoUpdate');
        Route::get('/pago/pagossearch', 'PaymentController@pagosSearch');
        Route::get('/pago/pdfsingle', 'PaymentController@pagoListSingle');

        Route::get('/medico', 'MedicoController@index');
        Route::post('/medico/registrar', 'MedicoController@store');
        Route::put('/medico/actualizar', 'MedicoController@update');
        Route::put('/medico/desactivar', 'MedicoController@desactivar');
        Route::put('/medico/activar', 'MedicoController@activar');

        Route::get('/paciente', 'PacienteController@index');
        Route::post('/paciente/registrar', 'PacienteController@store');
        Route::put('/paciente/actualizar', 'PacienteController@update');
        Route::put('/paciente/desactivar', 'PacienteController@desactivar');
        Route::put('/paciente/activar', 'PacienteController@activar');
        
        Route::get('/tratamiento', 'TratamientoController@index');
        Route::post('/tratamiento/registrar', 'TratamientoController@store');
        Route::put('/tratamiento/actualizar', 'TratamientoController@update');

        Route::get('/consulta', 'ConsultaController@index');
        Route::post('/consulta/registrar', 'ConsultaController@store');
        Route::put('/consulta/actualizar', 'ConsultaController@update');
        
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
        Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/selectRol', 'RolController@selectRol');
        
        Route::get('/user', 'UserController@index');
        Route::resource('/tratamiento-users', 'TratamientoUsersController');
        Route::resource('/tratamiento-detalle', 'DetalleTratamientoController');
        
        Route::post('/user/registrar', 'UserController@store');
        Route::put('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');
    });

});

//Route::get('/home', 'HomeController@index')->name('home');