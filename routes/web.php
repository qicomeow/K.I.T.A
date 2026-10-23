
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityEventController;
use App\Http\Controllers\CommunityItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowBookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminSettingsController;

// ========================================
// HOME
// ========================================

Route::get('/', [CommunityEventController::class, 'index'])
    ->name('home');

Route::get('/intro', function () {
    return view('intro');
})->name('intro');
// ========================================
// AUTHENTICATION
// ========================================

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// ========================================
// AUTHENTICATED USER ROUTES
// ========================================

Route::middleware('auth')->group(function () {

    // ========================================
    // EVENTS
    // ========================================

    Route::get('/events/create', [CommunityEventController::class, 'create'])
        ->name('events.create');

    Route::post('/events', [CommunityEventController::class, 'store'])
        ->name('events.store');

    Route::get('/my-events', [CommunityEventController::class, 'myEvents'])
        ->name('events.mine');

    Route::get('/events/{event}/edit', [CommunityEventController::class, 'edit'])
        ->name('events.edit');

    Route::put('/events/{event}', [CommunityEventController::class, 'update'])
        ->name('events.update');

    Route::delete('/events/{event}', [CommunityEventController::class, 'cancel'])
        ->name('events.cancel');

    // ========================================
    // COMMUNITY ITEMS
    // ========================================

    Route::get('/my-items', [CommunityItemController::class, 'myItems'])
        ->name('community.my-items');

    Route::get('/community/create', [CommunityItemController::class, 'create'])
        ->name('community.create');

    Route::post('/community', [CommunityItemController::class, 'store'])
        ->name('community.store');

    Route::get('/community/{item}/edit', [CommunityItemController::class, 'edit'])
        ->name('community.edit');

    Route::put('/community/{item}', [CommunityItemController::class, 'update'])
        ->name('community.update');

    Route::delete('/community/{item}', [CommunityItemController::class, 'destroy'])
        ->name('community.destroy');

    // ========================================
    // BORROW BOOKING
    // ========================================

    Route::post('/community/{item}/borrow', [BorrowBookingController::class, 'store'])
        ->name('borrow.store');

    Route::get('/my-borrow-requests', [BorrowBookingController::class, 'myRequests'])
        ->name('borrow.my-requests');

    Route::get('/borrow-requests', [BorrowBookingController::class, 'ownerRequests'])
        ->name('borrow.owner-requests');

    Route::patch('/borrow-bookings/{booking}/approve', [BorrowBookingController::class, 'approve'])
        ->name('borrow.approve');

    Route::patch('/borrow-bookings/{booking}/reject', [BorrowBookingController::class, 'reject'])
        ->name('borrow.reject');

    // ========================================
    // MESSAGES
    // ========================================

    Route::get('/messages', [MessageController::class, 'index'])
        ->name('messages.index');

    Route::get('/messages/search', [MessageController::class, 'search'])
        ->name('messages.search');

    Route::get('/messages/unread-count', [MessageController::class, 'unreadCount'])
        ->name('messages.unread-count');

    Route::post('/messages/start/{user}', [MessageController::class, 'start'])
        ->name('messages.start');

    Route::post('/messages/item/{item}', [MessageController::class, 'startItem'])
        ->name('messages.start-item');

    Route::patch('/messages/message/{message}', [MessageController::class, 'updateMessage'])
        ->name('messages.update-message');

    Route::delete('/messages/message/{message}', [MessageController::class, 'deleteMessage'])
        ->name('messages.delete-message');

    Route::get('/messages/{conversation}', [MessageController::class, 'show'])
        ->name('messages.show');

    Route::post('/messages/{conversation}', [MessageController::class, 'store'])
        ->name('messages.store');

    Route::get('/messages/{conversation}/fetch', [MessageController::class, 'fetch'])
        ->name('messages.fetch');

    // ========================================
    // NEIGHBOURHOOD COMPLAINTS
    // ========================================

    Route::get('/complaints', [ComplaintController::class, 'index'])
        ->name('complaints.index');

    Route::get('/complaints/create', [ComplaintController::class, 'create'])
        ->name('complaints.create');

    Route::post('/complaints', [ComplaintController::class, 'store'])
        ->name('complaints.store');

    Route::get('/complaints/{complaint}/edit', [ComplaintController::class, 'edit'])
        ->name('complaints.edit');

    Route::put('/complaints/{complaint}', [ComplaintController::class, 'update'])
        ->name('complaints.update');

    Route::patch('/complaints/{complaint}/cancel', [ComplaintController::class, 'cancel'])
        ->name('complaints.cancel');

    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])
        ->name('complaints.destroy');

    // ========================================
    // SETTINGS
    // ========================================

    // Update user profile (PUT and PATCH)
    Route::match(
        ['put', 'patch'],
        '/settings',
        [SettingsController::class, 'update']
    )->name('settings.update');

    // Delete user account
    Route::delete('/settings', [SettingsController::class, 'destroy'])
        ->name('settings.destroy');

});

// ========================================
// PUBLIC COMMUNITY ROUTES
// ========================================

Route::get('/community', [CommunityItemController::class, 'index'])
    ->name('community.index');

Route::get('/community/{item}', [CommunityItemController::class, 'show'])
    ->name('community.show');

Route::get('/issues', [ComplaintController::class, 'allIssues'])
    ->name('issues.index');

    
Route::get('/events', [CommunityEventController::class, 'allEvents'])
    ->name('events.index');



/* ADMIN AUTHENTICATION */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('logout');
});

/* ADMIN DASHBOARD & MANAGEMENT */
    Route::middleware('auth')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // ========================================
            // ADMIN DASHBOARD
            // ========================================

            Route::get('/', [
                AdminController::class,
                'index'
            ])->name('dashboard');


            // ========================================
            // MANAGE COMPLAINTS
            // ========================================

            Route::get('/requests', [
                AdminController::class,
                'requests'
            ])->name('requests');

            Route::patch('/requests/{complaint}/status', [
                AdminController::class,
                'updateStatus'
            ])->name('requests.status');


            // ========================================
            // TECHNICIAN DIRECTORY
            // ========================================

            // View technicians
            Route::get('/technicians', [
                AdminController::class,
                'technicians'
            ])->name('technicians');

            // Add technician
            Route::post('/technicians', [
                AdminController::class,
                'storeTechnician'
            ])->name('technicians.store');

            // Remove technician
            Route::delete('/technicians/{technician}', [
                AdminController::class,
                'destroyTechnician'
            ])->name('technicians.destroy');

        });

// Admin profile settings (admin role only, using default web guard)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::put('/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'update'])
        ->name('settings.update');
});