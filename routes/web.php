<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LubController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\ChemicalTransquipmentController;
use App\Http\Controllers\LubTransquipmentController;
use App\Http\Controllers\FuelTransquipmentController;
use App\Http\Controllers\FertiliserController;
use App\Http\Controllers\FertiliserTransquipmentController;
use App\Http\Controllers\PackagingController;
use App\Http\Controllers\PackagingTransquipmentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentActionController;

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

//admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'user'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{nowuser}/edit', [UserController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{nowuser}', [UserController::class, 'updateUser'])->name('admin.users.update');
});


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('loggedin');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/fuel', [AuthController::class, 'dashboard_fuel'])->name('dashboard.fuel')->middleware('auth');
// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Edit Profile Page
Route::get('/user/edit-profile', [AuthController::class, 'editProfile'])->name('user.edit-profile')->middleware('auth');
// Update Password
Route::post('/user/update-password', [AuthController::class, 'updatePassword'])->name('user.update-password')->middleware('auth');

//categories
Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
});

//vehicles
Route::middleware(['auth'])->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
});

//operators
Route::middleware(['auth'])->group(function () {
    Route::get('/operators', [PeopleController::class, 'index_operator'])->name('operators.index');
    Route::get('/operators/create', [PeopleController::class, 'create_operator'])->name('operators.create');
    Route::post('/operators', [PeopleController::class, 'store_operator'])->name('operators.store');
    Route::get('/operators/{operator}/edit', [PeopleController::class, 'edit_operator'])->name('operators.edit');
    Route::put('/operators/{operator}', [PeopleController::class, 'update_operator'])->name('operators.update');
});

//drivers
Route::middleware(['auth'])->group(function () {
    Route::get('/drivers', [PeopleController::class, 'index_driver'])->name('drivers.index');
    Route::get('/drivers/create', [PeopleController::class, 'create_driver'])->name('drivers.create');
    Route::post('/drivers', [PeopleController::class, 'store_driver'])->name('drivers.store');
    Route::get('/drivers/{driver}/edit', [PeopleController::class, 'edit_driver'])->name('drivers.edit');
    Route::put('/drivers/{driver}', [PeopleController::class, 'update_driver'])->name('drivers.update');
});

//fuel
Route::middleware(['auth'])->group(function () {
    Route::get('/fuel-in', [FuelTransquipmentController::class, 'index_fuel_in'])->name('fuel-in.index');
    Route::get('/fuel-in-report', [FuelTransquipmentController::class, 'report_fuel_in'])->name('fuel-in.report');
    Route::get('/fuel-in/create', [FuelTransquipmentController::class, 'create_fuel_in'])->name('fuel-in.create');
    Route::post('/fuel-in', [FuelTransquipmentController::class, 'store_fuel_in'])->name('fuel-in.store');
    Route::post('/reverse-fuel-in', [FuelTransquipmentController::class, 'reverse_fuel_in'])->name('fuel-in.reverse');
    Route::get('/fuel-out', [FuelTransquipmentController::class, 'index_fuel_out'])->name('fuel-out.index');
    Route::get('/fuel-out-report', [FuelTransquipmentController::class, 'report_fuel_out'])->name('fuel-out.report');
    Route::get('/fuel-out-report-sum', [FuelTransquipmentController::class, 'report_fuel_out_sum'])->name('fuel-out.report-sum');
    Route::get('/fuel-out/create', [FuelTransquipmentController::class, 'create_fuel_out'])->name('fuel-out.create');
    Route::post('/fuel-out', [FuelTransquipmentController::class, 'store_fuel_out'])->name('fuel-out.store');
    Route::post('/reverse-fuel-out', [FuelTransquipmentController::class, 'reverse_fuel_out'])->name('fuel-out.reverse');
   
});

//Lubs
Route::middleware(['auth'])->group(function () {
    Route::get('/lubs', [LubController::class, 'index'])->name('lubs.index');
    Route::get('/lubs/create', [LubController::class, 'create'])->name('lubs.create');
    Route::post('/lubs', [LubController::class, 'store'])->name('lubs.store');
    Route::get('/lubs/{lub}/edit', [LubController::class, 'edit'])->name('lubs.edit');
    Route::put('/lubs/{lub}', [LubController::class, 'update'])->name('lubs.update');
});

//lub Transaction
Route::middleware(['auth'])->group(function () {
    Route::get('/lub-in', [LubTransquipmentController::class, 'index_lub_in'])->name('lub-in.index');
    Route::get('/lub-in-report', [LubTransquipmentController::class, 'report_lub_in'])->name('lub-in.report');
    Route::get('/lub-in/create', [LubTransquipmentController::class, 'create_lub_in'])->name('lub-in.create');
    Route::post('/lub-in', [LubTransquipmentController::class, 'store_lub_in'])->name('lub-in.store');
    Route::post('/reverse-lub-in', [LubTransquipmentController::class, 'reverse_lub_in'])->name('lub-in.reverse');
    Route::get('/lub-out', [LubTransquipmentController::class, 'index_lub_out'])->name('lub-out.index');
    Route::get('/lub-out-report', [LubTransquipmentController::class, 'report_lub_out'])->name('lub-out.report');
    Route::get('/lub-out/create', [LubTransquipmentController::class, 'create_lub_out'])->name('lub-out.create');
    Route::post('/lub-out', [LubTransquipmentController::class, 'store_lub_out'])->name('lub-out.store');
    Route::post('/reverse-lub-out', [LubTransquipmentController::class, 'reverse_lub_out'])->name('lub-out.reverse');   
});

//Chemical
Route::middleware(['auth'])->group(function () {
    Route::get('/chemicals', [ChemicalController::class, 'index'])->name('chemicals.index');
    Route::get('/chemicals/create', [ChemicalController::class, 'create'])->name('chemicals.create');
    Route::post('/chemicals', [ChemicalController::class, 'store'])->name('chemicals.store');
    Route::get('/chemicals/{chemical}/edit', [ChemicalController::class, 'edit'])->name('chemicals.edit');
    Route::put('/chemicals/{chemical}', [ChemicalController::class, 'update'])->name('chemicals.update');
});

//Chemical Transaction
Route::middleware(['auth'])->group(function () {
    Route::get('/chemical-in', [ChemicalTransquipmentController::class, 'index_chemical_in'])->name('chemical-in.index');
    Route::get('/chemical-in-report', [ChemicalTransquipmentController::class, 'report_chemical_in'])->name('chemical-in.report');
    Route::get('/chemical-in/create', [ChemicalTransquipmentController::class, 'create_chemical_in'])->name('chemical-in.create');
    Route::post('/chemical-in', [ChemicalTransquipmentController::class, 'store_chemical_in'])->name('chemical-in.store');
    Route::post('/reverse-chemical-in', [ChemicalTransquipmentController::class, 'reverse_chemical_in'])->name('chemical-in.reverse');
    Route::get('/chemical-out', [ChemicalTransquipmentController::class, 'index_chemical_out'])->name('chemical-out.index');
    Route::get('/chemical-out-report', [ChemicalTransquipmentController::class, 'report_chemical_out'])->name('chemical-out.report');
    Route::get('/chemical-out/create', [ChemicalTransquipmentController::class, 'create_chemical_out'])->name('chemical-out.create');
    Route::post('/chemical-out', [ChemicalTransquipmentController::class, 'store_chemical_out'])->name('chemical-out.store');  
    Route::post('/reverse-chemical-out', [ChemicalTransquipmentController::class, 'reverse_chemical_out'])->name('chemical-out.reverse');
 
});

//Fertiliser
Route::middleware(['auth'])->group(function () {
    Route::get('/fertilisers', [FertiliserController::class, 'index'])->name('fertilisers.index');
    Route::get('/fertilisers/create', [FertiliserController::class, 'create'])->name('fertilisers.create');
    Route::post('/fertilisers', [FertiliserController::class, 'store'])->name('fertilisers.store');
    Route::get('/fertilisers/{fertiliser}/edit', [FertiliserController::class, 'edit'])->name('fertilisers.edit');
    Route::put('/fertilisers/{fertiliser}', [FertiliserController::class, 'update'])->name('fertilisers.update');
});

//Feriliser Transaction
Route::middleware(['auth'])->group(function () {
    Route::get('/fertiliser-in', [FertiliserTransquipmentController::class, 'index_fertiliser_in'])->name('fertiliser-in.index');
    Route::get('/fertiliser-in-report', [FertiliserTransquipmentController::class, 'report_fertiliser_in'])->name('fertiliser-in.report');
    Route::get('/fertiliser-in/create', [FertiliserTransquipmentController::class, 'create_fertiliser_in'])->name('fertiliser-in.create');
    Route::post('/fertiliser-in', [FertiliserTransquipmentController::class, 'store_fertiliser_in'])->name('fertiliser-in.store');
    Route::post('/reverse-fertiliser-in', [FertiliserTransquipmentController::class, 'reverse_fertiliser_in'])->name('fertiliser-in.reverse');
    Route::get('/fertiliser-out', [FertiliserTransquipmentController::class, 'index_fertiliser_out'])->name('fertiliser-out.index');
    Route::get('/fertiliser-out-report', [FertiliserTransquipmentController::class, 'report_fertiliser_out'])->name('fertiliser-out.report');
    Route::get('/fertiliser-out/create', [FertiliserTransquipmentController::class, 'create_fertiliser_out'])->name('fertiliser-out.create');
    Route::post('/fertiliser-out', [FertiliserTransquipmentController::class, 'store_fertiliser_out'])->name('fertiliser-out.store');   
    Route::post('/reverse-fertiliser-out', [FertiliserTransquipmentController::class, 'reverse_fertiliser_out'])->name('fertiliser-out.reverse');

});

//Packaging
Route::middleware(['auth'])->group(function () {
    Route::get('/packagings', [PackagingController::class, 'index'])->name('packagings.index');
    Route::get('/packagings/create', [PackagingController::class, 'create'])->name('packagings.create');
    Route::post('/packagings', [PackagingController::class, 'store'])->name('packagings.store');
    Route::get('/packagings/{packaging}/edit', [PackagingController::class, 'edit'])->name('packagings.edit');
    Route::put('/packagings/{packaging}', [PackagingController::class, 'update'])->name('packagings.update');
});

//Packaging Transaction
Route::middleware(['auth'])->group(function () {
    Route::get('/packaging-in', [PackagingTransquipmentController::class, 'index_packaging_in'])->name('packaging-in.index');
    Route::get('/packaging-in-report', [PackagingTransquipmentController::class, 'report_packaging_in'])->name('packaging-in.report');
    Route::get('/packaging-in/create', [PackagingTransquipmentController::class, 'create_packaging_in'])->name('packaging-in.create');
    Route::post('/packaging-in', [PackagingTransquipmentController::class, 'store_packaging_in'])->name('packaging-in.store');
    Route::post('/reverse-packaging-in', [PackagingTransquipmentController::class, 'reverse_packaging_in'])->name('packaging-in.reverse');
    Route::get('/packaging-out', [PackagingTransquipmentController::class, 'index_packaging_out'])->name('packaging-out.index');
    Route::get('/packaging-out-report', [PackagingTransquipmentController::class, 'report_packaging_out'])->name('packaging-out.report');
    Route::get('/packaging-out/create', [PackagingTransquipmentController::class, 'create_packaging_out'])->name('packaging-out.create');
    Route::post('/packaging-out', [PackagingTransquipmentController::class, 'store_packaging_out'])->name('packaging-out.store');  
    Route::post('/reverse-packaging-out', [PackagingTransquipmentController::class, 'reverse_packaging_out'])->name('packaging-out.reverse');
});

//Equipment
Route::middleware(['auth'])->group(function () {
  Route::get('/equipment/actions', [EquipmentController::class, 'index'])->name('equipment.actions');
  Route::get('/equipment/create', [EquipmentController::class, 'create'])->name('equipment.create');
  Route::post('/equipment', [EquipmentController::class, 'store'])->name('equipment.store');
  Route::get('/equipment/{id}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
  Route::put('/equipment/{id}', [EquipmentController::class, 'update'])->name('equipment.update');
  Route::get('/equipment/items', [EquipmentController::class, 'item'])->name('equipment.items');
  Route::get('/equipment/tools', [EquipmentController::class, 'tool'])->name('equipment.tools');
  Route::get('/equipment/spare_parts', [EquipmentController::class, 'spare_part'])->name('equipment.spare_parts');
  Route::get('/equipment/farm', [EquipmentController::class, 'farm'])->name('equipment.farm');
  Route::get('/equipment/workshop', [EquipmentController::class, 'workshop'])->name('equipment.workshop');
});

//EquipmentAction
Route::middleware(['auth'])->group(function () {
  Route::get('/equipment/returned', [EquipmentActionController::class, 'returned'])->name('equipment.actions.returned');
  Route::get('/equipment/taken_non_returnable', [EquipmentActionController::class, 'taken_non_returnable'])->name('equipment.actions.taken_non_returnable');
  Route::get('/equipment/repaired', [EquipmentActionController::class, 'repaired'])->name('equipment.actions.repaired');
  Route::get('/equipment/disposed', [EquipmentActionController::class, 'disposed'])->name('equipment.actions.disposed');
  Route::get('/equipment/general', [EquipmentActionController::class, 'general'])->name('equipment.actions.general');
  Route::get('/equipment/pending_return', [EquipmentActionController::class, 'pending_return'])->name('equipment.actions.pending_return');
  Route::get('/equipment/pending_repair', [EquipmentActionController::class, 'pending_repair'])->name('equipment.actions.pending_repair');
  Route::get('/equipment/actions_performed', [EquipmentActionController::class, 'actions_performed'])->name('equipment.actions.actions_performed');
  Route::get('/equipment/return', [EquipmentActionController::class, 'return'])->name('equipment.actions.return');
  Route::get('/equipment/repair', [EquipmentActionController::class, 'repair'])->name('equipment.actions.repair');
  Route::get('/equipment/reverse', [EquipmentActionController::class, 'reverse'])->name('equipment.actions.reverse');
  Route::get('/equipment/give', [EquipmentActionController::class, 'give'])->name('equipment.actions.give');
  Route::get('/equipment/add', [EquipmentActionController::class, 'add'])->name('equipment.actions.add');
  Route::get('/equipment/recommend_for_repair', [EquipmentActionController::class, 'recommend_for_repair'])->name('equipment.actions.recommend_for_repair');
  Route::get('/equipment/dispose', [EquipmentActionController::class, 'dispose'])->name('equipment.actions.dispose');
  Route::get('/equipment/general_in', [EquipmentActionController::class, 'general_in'])->name('equipment.actions.general_in');

});

