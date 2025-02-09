<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObituaryController;
use App\Http\Controllers\FuneralController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ObituaryController as AdminObituaryController;
use App\Http\Controllers\Admin\FuneralController as AdminFuneralController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImmediateNeedController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes - Keep these at the top
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest admin routes - No auth:admin middleware
    Route::get('/login', [AuthController::class, 'showAdminLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'adminLogin'])->name('login.submit');

    // Protected admin routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'adminLogout'])->name('logout');
        
        // Obituary Management
        Route::get('/obituaries', [AdminObituaryController::class, 'index'])->name('obituaries.index');
        Route::get('/obituaries/{obituary}', [AdminObituaryController::class, 'show'])->name('obituaries.show');
        Route::patch('/obituaries/{obituary}/status', [AdminObituaryController::class, 'updateStatus'])->name('obituaries.update-status');
        Route::patch('/obituaries/{obituary}/notes', [AdminObituaryController::class, 'updateNotes'])->name('obituaries.update-notes');
        
        //user routes
        Route::resource('/users', UsersController::class);

        // Admin Obituary Routes with explicit names
        Route::get('/obituaries', [AdminObituaryController::class, 'index'])->name('obituaries.index');
        Route::get('/obituaries/create', [AdminObituaryController::class, 'create'])->name('obituaries.create');
        Route::post('/obituaries', [AdminObituaryController::class, 'store'])->name('obituaries.store');
        Route::get('/obituaries/{obituary}/edit', [AdminObituaryController::class, 'edit'])->name('obituaries.edit');
        Route::put('/obituaries/{obituary}', [AdminObituaryController::class, 'update'])->name('obituaries.update');
        Route::delete('/obituaries/{obituary}', [AdminObituaryController::class, 'destroy'])->name('obituaries.destroy');
        
        Route::put('/obituaries/{obituary}/status', [AdminObituaryController::class, 'updateStatus'])
            ->name('obituaries.updateStatus');
        
        // Admin Funeral Routes
        Route::get('/funerals', [AdminFuneralController::class, 'index'])->name('funerals.index');
        Route::get('/funerals/create', [AdminFuneralController::class, 'create'])->name('funerals.create');
        Route::post('/funerals', [AdminFuneralController::class, 'store'])->name('funerals.store');
        Route::get('/funerals/{funeral}/edit', [AdminFuneralController::class, 'edit'])->name('funerals.edit');
        Route::put('/funerals/{funeral}', [AdminFuneralController::class, 'update'])->name('funerals.update');
        Route::delete('/funerals/{funeral}', [AdminFuneralController::class, 'destroy'])->name('funerals.delete');
        
        // Admin Appointment Routes
        Route::resource('appointments', AdminAppointmentController::class);
        
        // Reports routes
        Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
        Route::get('/reports/generate', [AdminController::class, 'generateReport'])->name('reports.generate');
        Route::post('/reports/download', [AdminController::class, 'downloadReport'])->name('reports.download');
    });
});

// Public Routes
Route::get('/obituaries', [ObituaryController::class, 'index'])->name('obituaries.index');

// Protected obituary routes - Move this BEFORE the show route
Route::middleware(['auth'])->group(function () {
    Route::get('/obituaries/create', [ObituaryController::class, 'create'])->name('obituaries.create');
    Route::post('/obituaries', [ObituaryController::class, 'store'])->name('obituaries.store');
    Route::get('/obituaries/{obituary}/edit', [ObituaryController::class, 'edit'])->name('obituaries.edit');
    Route::put('/obituaries/{obituary}', [ObituaryController::class, 'update'])->name('obituaries.update');
    Route::delete('/obituaries/{obituary}', [ObituaryController::class, 'destroy'])->name('obituaries.destroy');
});

// This should come AFTER the create route
Route::get('/obituaries/{obituary}', [ObituaryController::class, 'show'])->name('obituaries.show');

// Funeral Arrangements Page
Route::get('/funeral-arrangements', [FuneralController::class, 'index'])->name('funeral.index')->middleware('auth');

// Appointment Scheduling Page
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index')->middleware('auth');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{category}', [ProductController::class, 'byCategory'])->name('products.category');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Immediate Need Routes
Route::get('/immediate-need', [ImmediateNeedController::class, 'index'])->name('immediate-need.index');
Route::post('/immediate-need', [ImmediateNeedController::class, 'store'])->name('immediate-need.store');
