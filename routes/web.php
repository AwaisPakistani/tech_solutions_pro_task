<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\{AuthController, DashboardController, ModuleController, PermissionController, RoleController, SalesController, UserController};

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AuthController::class,'login'])->name('admin.login');

Route::get('admin/login',[AuthController::class,'login'])->name('admin.login');
Route::post('admin/login',[AuthController::class,'authenticate'])->name('admin.authenticate');

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['AuthMiddleware'])->group(function () {
         // Dashboard Routes
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

        Route::get('my-profile/{id}',[AuthController::class,'profile'])->name('my-profile');
        // Above route is Gate Check either it's you or not
        Route::post('/logout',[AuthController::class,'logout'])->name('logout');
        Route::get('unauthorized',function(){
            return view('admin.errors.forbidden');
        })->name('unauthorized');


        Route::middleware(['PermissionMiddleware'])->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
            Route::resource('modules', ModuleController::class);
            // Sales Routes
            Route::resource('sales', SalesController::class);
            Route::get('sales-import',[SalesController::class,'sales_import'])->name('sales.import');
        });
    });
});

// NOt Found Route
Route::fallback(function(){
   return view('admin.errors.not-found');
});
