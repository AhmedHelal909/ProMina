<?php
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::group(['middleware' => ['guest']], function () {
            Route::get('/', function () {
                return view('auth.login');
            })->name('auth.login');

        });
        Auth::routes(['register' => false]);
        
        Route::get('/dashboard/home', [HomeController::class, 'index'])->name('dashboard.home');
        Route::prefix('dashboard')->namespace('Dashboard')->middleware(['auth'])->name('dashboard.')->group(function () {
            Route::resource('users', UserController::class);
            Route::get('editProfile/{id}', [UserController::class,'editProfile'])->name('users.editProfile');
            Route::put('updateProfile/{user}', [UserController::class,'updateProfile'])->name('users.updateProfile');
            Route::resource('roles', RoleController::class);
            Route::resource('albums', AlbumController::class);
            Route::resource('pictures', PictureController::class);



        });

    });
