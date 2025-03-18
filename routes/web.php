<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para el Administrador
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para admin-usuario
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth', 'can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth', 'can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth', 'can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth', 'can:admin.usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth', 'can:admin.usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth', 'can:admin.usuarios.update');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware('auth', 'can:admin.usuarios.confirmDelete');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth', 'can:admin.usuarios.destroy');

//Rutas para el admin-Enfermeras
Route::get('/admin/enfermeras', [App\Http\Controllers\EnfermeraController::class, 'index'])->name('admin.enfermeras.index')->middleware('auth', 'can:admin.enfermeras.index');
Route::get('/admin/enfermeras/create', [App\Http\Controllers\EnfermeraController::class, 'create'])->name('admin.enfermeras.create')->middleware('auth', 'can:admin.enfermeras.create');
Route::post('/admin/enfermeras/create', [App\Http\Controllers\EnfermeraController::class, 'store'])->name('admin.enfermeras.store')->middleware('auth', 'can:admin.enfermeras.store');
Route::get('/admin/enfermeras/{id}', [App\Http\Controllers\EnfermeraController::class, 'show'])->name('admin.enfermeras.show')->middleware('auth', 'can:admin.enfermeras.show');
Route::get('/admin/enfermeras/{id}/edit', [App\Http\Controllers\EnfermeraController::class, 'edit'])->name('admin.enfermeras.edit')->middleware('auth', 'can:admin.enfermeras.edit');
Route::put('/admin/enfermeras/{id}', [App\Http\Controllers\EnfermeraController::class, 'update'])->name('admin.enfermeras.update')->middleware('auth', 'can:admin.enfermeras.update');
Route::get('/admin/enfermeras/{id}/confirm-delete', [App\Http\Controllers\EnfermeraController::class, 'confirmDelete'])->name('admin.enfermeras.confirmDelete')->middleware('auth', 'can:admin.enfermeras.confirmDelete');
Route::delete('/admin/enfermeras/{id}', [App\Http\Controllers\EnfermeraController::class, 'destroy'])->name('admin.enfermeras.destroy')->middleware('auth', 'can:admin.enfermeras.destroy');

//Rutas para el admin-rolDobles
Route::get('/admin/rolDobles', [App\Http\Controllers\RolDobleController::class, 'index'])->name('admin.rolDobles.index')->middleware('auth', 'can:admin.rolDobles.index');
Route::get('/admin/rolDobles/create', [App\Http\Controllers\RolDobleController::class, 'create'])->name('admin.rolDobles.create')->middleware('auth', 'can:admin.rolDobles.create');
Route::post('/admin/rolDobles/create', [App\Http\Controllers\RolDobleController::class, 'store'])->name('admin.rolDobles.store')->middleware('auth', 'can:admin.rolDobles.store');
Route::get('/admin/rolDobles/{id}', [App\Http\Controllers\RolDobleController::class, 'show'])->name('admin.rolDobles.show')->middleware('auth', 'can:admin.rolDobles.show');
Route::get('/admin/rolDobles/{id}/edit', [App\Http\Controllers\RolDobleController::class, 'edit'])->name('admin.rolDobles.edit')->middleware('auth', 'can:admin.rolDobles.edit');
Route::put('/admin/rolDobles/{id}', [App\Http\Controllers\RolDobleController::class, 'update'])->name('admin.rolDobles.update')->middleware('auth', 'can:admin.rolDobles.update');
Route::get('/admin/rolDobles/{id}/confirm-delete', [App\Http\Controllers\RolDobleController::class, 'confirmDelete'])->name('admin.rolDobles.confirmDelete')->middleware('auth', 'can:admin.rolDobles.confirmDelete');
Route::delete('/admin/rolDobles/{id}', [App\Http\Controllers\RolDobleController::class, 'destroy'])->name('admin.rolDobles.destroy')->middleware('auth', 'can:admin.rolDobles.destroy');

//Rutas para el admin-pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth', 'can:admin.pacientes.index');
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth', 'can:admin.pacientes.create');
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth', 'can:admin.pacientes.store');
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth', 'can:admin.pacientes.show');
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth', 'can:admin.pacientes.edit');
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth', 'can:admin.pacientes.update');
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware('auth', 'can:admin.pacientes.confirmDelete');
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth', 'can:admin.pacientes.destroy');

//Rutas para el admin-box
Route::get('/admin/boxes', [App\Http\Controllers\BoxController::class, 'index'])->name('admin.boxes.index')->middleware('auth', 'can:admin.boxes.index');
Route::get('/admin/boxes/create', [App\Http\Controllers\BoxController::class, 'create'])->name('admin.boxes.create')->middleware('auth', 'can:admin.boxes.create');
Route::post('/admin/boxes/create', [App\Http\Controllers\BoxController::class, 'store'])->name('admin.boxes.store')->middleware('auth', 'can:admin.boxes.store');
Route::get('/admin/boxes/{id}', [App\Http\Controllers\BoxController::class, 'show'])->name('admin.boxes.show')->middleware('auth', 'can:admin.boxes.show');
Route::get('/admin/boxes/{id}/edit', [App\Http\Controllers\BoxController::class, 'edit'])->name('admin.boxes.edit')->middleware('auth', 'can:admin.boxes.edit');
Route::put('/admin/boxes/{id}', [App\Http\Controllers\BoxController::class, 'update'])->name('admin.boxes.update')->middleware('auth', 'can:admin.boxes.update');
Route::get('/admin/boxes/{id}/confirm-delete', [App\Http\Controllers\BoxController::class, 'confirmDelete'])->name('admin.boxes.confirmDelete')->middleware('auth', 'can:admin.boxes.confirmDelete');
Route::delete('/admin/boxes/{id}', [App\Http\Controllers\BoxController::class, 'destroy'])->name('admin.boxes.destroy')->middleware('auth', 'can:admin.boxes.destroy');

//Rutas para el admin-doctores
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth', 'can:admin.doctores.index');
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth', 'can:admin.doctores.create');
Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth', 'can:admin.doctores.store');
Route::get('/admin/doctores/reportes', [App\Http\Controllers\DoctorController::class, 'reportes'])->name('admin.doctores.reportes')->middleware('auth', 'can:admin.doctores.reportes');
Route::get('/admin/doctores/pdf', [App\Http\Controllers\DoctorController::class, 'pdf'])->name('admin.doctores.pdf')->middleware('auth', 'can:admin.doctores.pdf');
Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth', 'can:admin.doctores.show');
Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth', 'can:admin.doctores.edit');
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth', 'can:admin.doctores.update');
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->middleware('auth', 'can:admin.doctores.confirmDelete');
Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth', 'can:admin.doctores.destroy');


//Rutas para el admin-horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth', 'can:admin.horarios.index');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth', 'can:admin.horarios.create');
Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth', 'can:admin.horarios.store');
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show')->middleware('auth', 'can:admin.horarios.show');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth', 'can:admin.horarios.edit');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth', 'can:admin.horarios.update');
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->middleware('auth', 'can:admin.horarios.confirmDelete');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth', 'can:admin.horarios.destroy');
//ajax
Route::get('/admin/horarios/boxes/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_boxes'])->name('admin.horarios.cargar_datos_boxes')->middleware('auth', 'can:admin.horarios.cargar_datos_boxes');

//Rutas Ajax
Route::get('/boxes/{id}', [App\Http\Controllers\WebController::class, 'cargar_datos_boxes'])->name('cargar_datos_boxes')->middleware('auth', 'can:cargar_datos_boxes');
Route::get('/cargar_fullCalendar/{id}', [App\Http\Controllers\WebController::class, 'cargar_fullCalendar'])->name('cargar_fullCalendar');
Route::get('/admin/ver_reservas/{id}', [App\Http\Controllers\AdminController::class, 'ver_reservas'])->name('ver_reservas');
Route::delete('/admin/eventos/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')->middleware('auth', 'can:admin.eventos.destroy');
Route::post('/cargar_datos_boxes', [App\Http\Controllers\WebController::class, 'cargar_datos_boxes'])->name('cargar_datos_boxes_post')->middleware('auth', 'can:cargar_datos_boxes');