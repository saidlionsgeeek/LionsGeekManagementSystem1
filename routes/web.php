<?php

use App\Http\Controllers\admin\ClasseController;
use App\Http\Controllers\admin\ClassImageController;
use App\Http\Controllers\admin\EquipmentController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\StudioController;
use App\Http\Controllers\admin\StudioImageController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\reservation\ReservationClasseController;
use App\Http\Controllers\reservation\ReservationStudioController;
use App\Http\Controllers\reservation\ReservationStudioEquipmentController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TwoFAController;
use App\Models\Equipement;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view("dashboard");
})->middleware(['auth', 'verified',"CheckDoubleAuth",'checkVerification'])->name('dashboard');

// new user route check
Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/verification', [HomeController::class, 'verification']);


// !!!!!
Route::middleware(['auth'])->group(function () {
    
    // Autres routes authentifiées ici...

    // Routes 2FA
    Route::get('/2fa/setup', [TwoFAController::class, 'setup']);
    Route::post('/2fa/setup', [TwoFAController::class, 'enable2FA'])->name('2fa.setup');
    Route::get('/2fa/verify', [TwoFAController::class, 'verify'])->name('2fa.verify');
    Route::post('/2fa/verify', [TwoFAController::class, 'check2FA']);
});
// !!!!
// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware(['auth', 'role:admin',"CheckDoubleAuth"])->name('admin.')->prefix('admin')->group(function () {
    Route::resource("/roles", RoleController::class);
    // Route::resource("/permissions", PermissionController::class);
    Route::get('/users', [UserController::class, "index"])->name("users.index");
    Route::delete('/users/{user}', [UserController::class, "destroy"])->name("users.destroy");
    Route::post('/users/store', [UserController::class, "store"])->name("users.store");
    Route::post('/users/assignrole/{user}', [UserController::class, "assignrole"])->name("user.roles.update");
    Route::put('/users/information/{user}', [UserController::class, "update"])->name("user.update");
    Route::delete("/user/{user}/roles/{role}", [UserController::class, "removerole"])->name('user.role.remove');
    // classes routes
    Route::get("/classe", [ClasseController::class, "index"])->name("classe.index");
    Route::post("/classe/store", [ClasseController::class, "store"])->name("classe.store");
    Route::delete("/classe/destroy/{classe}", [ClasseController::class, "destroy"])->name("classe.destroy");
    Route::put("/classe/update/{classe}", [ClasseController::class, "update"])->name("classe.update");
    // classe imgs
    Route::post("/classe/images/store/{classe}", [ClassImageController::class, "store"])->name("classe.images.store");
    Route::delete("/classe/images/destroy/{classeImg}", [ClassImageController::class, "destroy"])->name("classe.image.destroy");
    // studios routes
    Route::get("/studio", [StudioController::class, "index"])->name("studio.index");
    Route::post("/studio/store", [StudioController::class, "store"])->name("studio.store");
    Route::delete("/studio/destroy/{studio}", [StudioController::class, "destroy"])->name("studio.destroy");
    Route::put("/studio/update/{studio}", [StudioController::class, "update"])->name("studio.update");
    // studio imgs
    Route::post("/studio/images/store/{studio}", [StudioImageController::class, "store"])->name("studio.images.store");
    Route::delete("/studio/images/destroy/{studioImg}", [StudioImageController::class, "destroy"])->name("studio.image.destroy");
    // equipment routes
    Route::get("/equipments", [EquipmentController::class, "index"])->name("equipment.index");
    Route::post("/equipment/store", [EquipmentController::class, "store"])->name("equipment.store");
    Route::put("/equipment/edit/{equipment}", [EquipmentController::class, "update"])->name("equipment.edit");
    Route::put("/equipment/state/{equipment}", [EquipmentController::class, "state"])->name("equipment.state");
    Route::delete("/equipment/destroy/{equipment}", [EquipmentController::class, "destroy"])->name("equipment.destroy");
    // History routes
    Route::get("/history", [HistoryController::class, "index"])->name("history.index");
});

// !!!
Route::middleware('auth','checkVerification',"CheckDoubleAuth")->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/authswitch', [HomeController::class, 'authswitch'])->name('profile.authswitch');


    // Classes Reservations
    Route::get('/classes/{classe}', [ReservationClasseController::class, 'calendar'])->name('classes.calendar');
    Route::post('/classes/{classe}/reservation/create', [ReservationClasseController::class, 'store'])->name('reservation_classe.create');
    Route::get('/classe/{classe}/reservations/{reservation_classe}', [ReservationClasseController::class, 'info'])->name('reservation_classe.info');
    Route::delete('/classes/reservations/{reservation_classe}/delete', [ReservationClasseController::class, 'destroy'])->name('reservation_classe.delete');
    Route::put('/classes/reservations/{reservation_classe}/edit', [ReservationClasseController::class, 'update'])->name('reservation_classe.edit');
    Route::put('/classes/reservations/{reservation_classe}/cancel', [ReservationClasseController::class, 'cancel'])->name('reservation_classe.cancel');

    // Studios Reservations
    Route::get('/studios/{studio}', [ReservationStudioController::class, 'calendar'])->name('studios.calendar');
    Route::post('/studios/{studio}/reservation/create', [ReservationStudioController::class, 'store'])->name('reservation_studio.create');
    Route::get('/studios/{studio}/reservations/{reservation_studio}', [ReservationStudioController::class, 'info'])->name('reservation_studio.info');
    Route::delete('/studios/reservations/{reservation_studio}/delete', [ReservationStudioController::class, 'destroy'])->name('reservation_studio.delete');
    Route::put('/studios/reservations/{reservation_studio}/edit', [ReservationStudioController::class, 'update'])->name('reservation_studio.edit');
    Route::put('/studios/reservations/{reservation_studio}/cancel', [ReservationStudioController::class, 'cancel'])->name('reservation_studio.cancel');
    // Reservation Studio Equipment
    Route::post('/studios/reservations/{reservation_studio}/equipment/{equipement}', [ReservationStudioEquipmentController::class, 'add'])->name('reservation_studio_equipment.add');
    Route::delete('/studios/reservations/equipment/{reservation_studio_equipment}', [ReservationStudioEquipmentController::class, 'destroy'])->name('reservation_studio_equipment.delete');
    // Reservation Studio Team
    Route::post('/studios/reservations/{reservation_studio}/user/{user}/team', [TeamMemberController::class, 'add'])->name('reservation_studio_team.add');
    Route::delete('/studios/reservations/team/{team_member}', [TeamMemberController::class, 'destroy'])->name('reservation_studio_team.delete');
});


require __DIR__ . '/auth.php';
