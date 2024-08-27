<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Middleware\CheckGouvernorat;


use App\Http\Controllers\MunicipaliteController;
use App\Http\Controllers\ProjetController;
use  App\Http\Livewire\Gouvernorrat;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\DB;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test',[RoleController::class,'test'])->middleware(['auth','checkGouvernorat:17']);
Route::get('/test44', [App\Http\Controllers\RoleController::class, 'test44'])->name('test44');

/*----- GESTION DES ROLES -----*/ 
Route::GET('/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');

Route::GET('/roles/index', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');


Route::GET('/role/show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
Route::POST('/create/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/role/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::post('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
//Route::get('/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.delete');


/*----- GESTION DES UTILISATSEURS -----*/ 
Route::GET('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::GET('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::POST('/user/create/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('mot/', [App\Http\Controllers\UserController::class, 'mot']);
Route::get('mot1/{id}', [App\Http\Controllers\UserController::class, 'save'])->name('mot.save');


/*

Route::GET('/role/show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
*/

/*----- GESTION DES fonctionnalités -----*/ 
Route::GET('/permissions/index', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permission/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
Route::post('/permission/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');

/*----- GESTION DES GOUVERNORATS -----*/ 
Route::get('/gouvernorat/index',[App\Http\Controllers\GouvernoratController::class,'index'])->name('gouvernorat.index');
Route::get('/gouvernorat/create',[App\Http\Controllers\GouvernoratController::class,'create'])->name('gouvernorat.create');;
Route::post('/gouvernorat/create/store',[App\Http\Controllers\GouvernoratController::class,'store'])->name('gouvernorat.store');
Route::get('/gouvernorat/edit/{id}',[App\Http\Controllers\GouvernoratController::class,'edit'])->name('gouvernorat.edit');
Route::post('/gouvernorat/update/',[App\Http\Controllers\GouvernoratController::class,'update'])->name('gouvernorat.update');
Route::get('gouvernorat/search/',[App\Http\Controllers\GouvernoratController::class,'search']);
Route::get('/gouvvernoratdelete/{id}', [App\Http\Controllers\GouvernoratController::class, 'destroy']);

/*----- GESTION DES MUNICIPALITES-----*/ 

Route::get('/municipalite/index',[App\Http\Controllers\MunicipaliteController::class,'index'])->name('municipalite.index');
Route::get('/municipalite/search',[App\Http\Controllers\MunicipaliteController::class,'search']);
Route::get('municipalite/create',[App\Http\Controllers\MunicipaliteController::class,'create'])->name('municipalite.create');
Route::get('/gouvernorat10',[App\Http\Controllers\ProjetController::class,'projet_par_commune']);
Route::get('municipalite/edit/{id}',[App\Http\Controllers\MunicipaliteController::class,'edit'])->name('municipalite.edit');
Route::get('/municipalitedelete/{id}', [App\Http\Controllers\MunicipaliteController::class, 'destroy'])->name('municipalite.delete');
Route::post('municipalite/update/',[App\Http\Controllers\MunicipaliteController::class,'update'])->name('municipalite.update');
Route::post('/municipalite/create/store',[App\Http\Controllers\MunicipaliteController::class,'store'])->name('municipalite.store');

/*----- GESTION DES COMMUNES-----*/ 
Route::get('/commune/index',[App\Http\Controllers\CommuneController::class,'index'])->name('commune.index');
Route::get('/commune/create',[App\Http\Controllers\CommuneController::class,'create'])->name('commune.create');
Route::post('/commune/create/store',[App\Http\Controllers\CommuneController::class,'store'])->name('commune.store');
Route::get('commune/search/',[App\Http\Controllers\CommuneController::class,'search']);
Route::get('commune/update/{id}',[App\Http\Controllers\CommuneController::class,'edit'])->name('commune.edit');
Route::post('commune/update/',[App\Http\Controllers\CommuneController::class,'update'])->name('commune.update');
Route::get('/communedelete/{id}', [App\Http\Controllers\CommuneController::class, 'destroy'])->name('commune.delete');

/*----- GESTION DES PROJETS-----*/ 
Route::get('/projet/index',[App\Http\Controllers\ProjetController::class,'index'])->name('projet.index');
Route::get('/projet/search',[App\Http\Controllers\ProjetController::class,'search']);
Route::get('/projet/edit/{id}',[App\Http\Controllers\ProjetController::class,'edit'])->name('projet.edit');
Route::get('/projet/create',[App\Http\Controllers\ProjetController::class,'create'])->name('projet.create');
Route::post('/projet/create/store',[App\Http\Controllers\ProjetController::class,'store'])->name('projet.store');
Route::post('/projet/update/',[App\Http\Controllers\ProjetController::class,'update'])->name('projet.update');
Route::get('/projet/gouvernorat10/',[App\Http\Controllers\ProjetController::class,'projet_par_commune'])->name('projet.gouvernorat');
Route::get('/projet/commune/',[App\Http\Controllers\ProjetController::class,'projet_par_municipalite'])->name('projet.commune');
Route::get('/quartier/nom_gouvernorat/',[App\Http\Controllers\ProjetController::class,'nom_gouvernorat']);
Route::get('/projetdelete/{id}',[App\Http\Controllers\ProjetController::class,'delete']);
Route::get('projet/gouvernorat/',[App\Http\Controllers\ProjetController::class,'tunisie']);
Route::get('Gafsa/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','3')->name('Gafsa');
Route::get('Tunis/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','1')->name('Tunis');
Route::get('Gabes/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','2')->name('Gabés');
Route::get('Sfax/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','4')->name('Sfax');
Route::get('Ariena/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','5')->name('Ariena');
Route::get('Béja/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','6')->name('Béja');
Route::get('Ben_Arous/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','7')->name('Ben_Arous');
Route::get('Bizerte/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','8')->name('Bizerte');
Route::get('Jendouba/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','9')->name('Jandouba');
Route::get('Kairoun/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','10')->name('Kairouan');
Route::get('kassrine/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','11')->name('Kassérine');
Route::get('kebili/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','12')->name('Kebili');
Route::get('Kef/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','13')->name('Kef');
Route::get('Mahdia/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','14')->name('Mahdia');
Route::get('Manubah/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','15')->name('Manubah');
Route::get('Mednine/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','16')->name('Médnine');
Route::get('Monastir/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','17')->name('Monastir');
Route::get('Nabeul/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','18')->name('Nabeul');
Route::get('Sidi_bou_zid/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','19')->name('Sidi_bouzid');
Route::get('Siliana/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','20')->name('Siliana');
Route::get('Sousse/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','21')->name('Sousse');
Route::get('Tatouine/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','22')->name('Tataouine');
Route::get('Tozeur/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','23')->name('Tozeur');
Route::get('Zaghouen/{id}',[App\Http\Controllers\ProjetController::class,'test'])->where('id','24')->name('Zaghouen');
Route::get('essai2/',[App\Http\Controllers\ProjetController::class,'test2']);
Route::get('projet/{id}',[App\Http\Controllers\ProjetController::class,'delete']);
Route::get('commune/{id}/{id1}',[App\Http\Controllers\ProjetController::class,'commune']);
Route::get('essai4/',[App\Http\Controllers\ProjetController::class,'essai5']);

/*----- GESTION DES QUARTIERS -----*/ 
Route::get('/quartier/index',[App\Http\Controllers\QuartierController::class,'index'])->name('quartier.index');
Route::get('quartier/create',[App\Http\Controllers\QuartierController::class,'create'])->name('quartier.create');
Route::post('quartier/create/store',[App\Http\Controllers\QuartierController::class,'store'])->name('quartier.store');
Route::get('quartier/edit/{id}/{id1}',[App\Http\Controllers\QuartierController::class,'edit'])->name('quartier.update');
Route::post('quartier/update/{id1}',[App\Http\Controllers\QuartierController::class,'update'])->name('quartier.update');
Route::get('/quartierdelete/{id}', [App\Http\Controllers\QuartierController::class, 'destroy'])->name('quartier.delete');
Route::get('/tous',[App\Http\Controllers\QuartierController::class,'tous'])->name('quartier.tous');
Route::get('/quartier/gouvernorat',[App\Http\Controllers\QuartierController::class,'quartier_gouvernorat'])->name('quartier.affiche');
Route::get('/quartier/projet',[App\Http\Controllers\QuartierController::class,'projet'])->name('quartier.projet');

