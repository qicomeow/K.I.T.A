
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityEventController;
use App\Http\Controllers\CommunityItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowBookingController;

// ========================================
// HOMEPAGE
// ========================================

Route::get('/', [CommunityEventController::class, 'index'])
    ->name('home');


// ========================================
// AUTHENTICATION
// ========================================

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ========================================
// PROTECTED ROUTES (LOGIN REQUIRED)
// ========================================

Route::middleware('auth')->group(function () {

    // ====================================
    // COMMUNITY EVENTS
    // ====================================

    // Create Event
    Route::get('/events/create', [CommunityEventController::class, 'create'])
        ->name('events.create');

    // Store Event
    Route::post('/events', [CommunityEventController::class, 'store'])
        ->name('events.store');

    // My Events
    Route::get('/my-events', [CommunityEventController::class, 'myEvents'])
        ->name('events.mine');

    // Edit Event
    Route::get('/events/{event}/edit', [CommunityEventController::class, 'edit'])
        ->name('events.edit');

    // Update Event
    Route::put('/events/{event}', [CommunityEventController::class, 'update'])
        ->name('events.update');

    // Cancel Event
    Route::delete('/events/{event}', [CommunityEventController::class, 'cancel'])
        ->name('events.cancel');


    // ====================================
    // COMMUNITY ITEMS
    // ====================================

    // My Items Dashboard
    Route::get('/my-items', [CommunityItemController::class, 'myItems'])
        ->name('community.my-items');

    // Create Community Item
    Route::get('/community/create', [CommunityItemController::class, 'create'])
        ->name('community.create');

    // Store Community Item
    Route::post('/community', [CommunityItemController::class, 'store'])
        ->name('community.store');

    // Edit Community Item
    Route::get('/community/{item}/edit', [CommunityItemController::class, 'edit'])
        ->name('community.edit');

    // Update Community Item
    Route::put('/community/{item}', [CommunityItemController::class, 'update'])
        ->name('community.update');

    // Delete Community Item
    Route::delete('/community/{item}', [CommunityItemController::class, 'destroy'])
        ->name('community.destroy');


    // ====================================
    // BORROW BOOKING SYSTEM
    // ====================================

    // Borrower - Submit Booking Request
    Route::post('/community/{item}/borrow', [BorrowBookingController::class, 'store'])
        ->name('borrow.store');

    // Borrower - View My Booking Requests
    Route::get('/my-borrow-requests', [BorrowBookingController::class, 'myRequests'])
        ->name('borrow.my-requests');

    // Owner - View Incoming Booking Requests
    Route::get('/borrow-requests', [BorrowBookingController::class, 'ownerRequests'])
        ->name('borrow.owner-requests');

    // Owner - Approve Booking Request
    Route::patch('/borrow-bookings/{booking}/approve', [BorrowBookingController::class, 'approve'])
        ->name('borrow.approve');

    // Owner - Reject Booking Request
    Route::patch('/borrow-bookings/{booking}/reject', [BorrowBookingController::class, 'reject'])
        ->name('borrow.reject');

});


// ========================================
// PUBLIC COMMUNITY ROUTES
// ========================================

// Community Items Listing
// Anyone can view
Route::get('/community', [CommunityItemController::class, 'index'])
    ->name('community.index');

// Community Item Details
// Anyone can view
Route::get('/community/{item}', [CommunityItemController::class, 'show'])
    ->name('community.show');
