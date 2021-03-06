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

Route::get('/', function () {
    return view('layaouts.prinsipal');
});



Route::get('auth/prueba','LoginControl@login')->name('profile');

Route::get('/admin','HomeController@admin');

Route::group(['middleware' => ['auth','is_admn']], function () {
    //
    Route::resource('Categorias','CategoriaController');
    Route::post('delete/{idcategoria}','CategoriaController@eliminar');

    Route::resource('Usuario','UsuarioController');

    Route::resource('Mobiliarios','MobiliarioController');
    Route::resource('Perfil','PerfController');
    Route::PATCH('Usuario/editPersona/{idPersona}','UsuarioController@updatePersona');
    Route::PATCH('Usuario/editUser/{idusuarios}','UsuarioController@updateUser');
    Route::PATCH('Perfil/editPersona/{idPersona}','PerfController@updatePersona');
    Route::PATCH('Perfil/editUser/{idusuarios}','PerfController@updateUser');
    Route::resource('Reportes','ReporController');
    Route::resource('Roles','RolController');
    Route::get('Departamentos','DepartamentosController@mostrar')->name('showdepar');
    Route::resource('Departamen','DepartamentosController');

    Route::post('eliminar/{idMobiliario}','MobiliarioController@eliminar');
    Route::get('delete/{idDepartamento}','DepartamentosController@eliminar');





});

Route::group(['middleware' => 'is_resonsable'],function (){
   });

Route::get('Mensajes','MensajeController@Mensaje')->name('mensaje');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Perfil','PerfController');
Route::PATCH('estado/{idMobiliario}','MobiliarioController@canbiarestado');
Route::resource('Tablero','HomController');
Route::Post('user/Password','PerfController@canbiarpass');
Route::get('partMobi/mobi','MobiliarioController@getpartes');
Route::post('PartCreate/Mobi','MobiliarioController@crearpartesmobi');
Route::post('Mob/mobicre','MobiliarioController@registrar')->name('registrar');
Route::get('Mob/mobicre','MobiliarioController@CrearMobi');
Route::get('mob/lisMobi','MobiliarioController@listar')->name('buscar');
Route::resource('MobiResponsable','MobiUserController');
Route::get('Inventarios', 'inventarioController@listar');
Route::get('Inventario/{id}','inventarioController@listarMobiID');
Route::get('cargarMobi/{id}','inventarioController@CargarMobi');
Route::post('regisInven/{idMobiliario}','inventarioController@RegisInv');
Route::get('Historial','inventarioController@Histo');
Route::get('HistoGeneral','inventarioController@listarhi');
Route::get('HistoGenera','inventarioController@HistoGene');
Route::get('cargar/histo/{iddetalleMobiliario}','inventarioController@CargarHisto');
Route::post('Update/histo/{iddetalleMobiliario}','inventarioController@actualizarInv');
Route::get('cargarHis/{id}','inventarioController@cargarHis');
Route::get('cargarCliente','inventarioController@cargarCliente');
Route::get('editar{idMobiliario}','MobiUserController@cargardatos');
Route::get('cargardatos{idMobiliario}','inventarioController@carData');
Route::get('login','MensajeController@login');
Route::resource('mobiliario','MobiliarioController');
Route::get('mobiliarios/{idMobiliario}','MobiliarioController@cargarMobi');
Route::post('update/mobi/{idMobiliario}','MobiliarioController@actualizar');
Route::get(' /{slug?}','HomController@tablero');
Auth::routes();
