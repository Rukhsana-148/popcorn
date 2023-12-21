<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController:: class, "popcorn"]);
Route::get('/popcorn', [HomeController:: class, "popcorn"]);
Route::get('/review', [HomeController:: class, "review"]);
Route::post('/addHall',[HomeController:: class, "addHall"]);
Route::post('/approveId/{id}',[HomeController:: class, "approveId"]);

Route::post('/deleteId/{id}',[HomeController:: class, "deleteId"]);


Route::post('/approveHall/{id}',[HomeController:: class, "approveHall"]);

Route::post('/deleteHall/{id}',[HomeController:: class, "deleteHall"]);
Route::post('/movieInfo',[HomeController::class, "movieInfo"]);

Route::post('/addTrailer',[HomeController::class, "addTrailer"]);

Route::get('/get-data/{id}',[HomeController::class, "getData"]) ;
Route::get('/get-movie/{id}',[HomeController::class, "getMovie"]) ;
Route::get('/get-hall/{id}',[HomeController::class, "getHall"]) ;



//Route::get('/selectHall',[HomeController::class, "selectHall"]);
Route::get('/hall',[HomeController::class, "hall"]);
Route::post('/approveMovie/{id}',[HomeController:: class, "approveMovie"]);
Route::post('/addTicket',[HomeController:: class, "addTicket"]);
Route::post('/movieReview',[HomeController:: class, "movieReview"]);
Route::post('/hallReview',[HomeController:: class, "hallReview"]);
/*Ticket Part */
Route::get('/ticket/{id}',[TicketController:: class, "ticketPage"]);
Route::post('/payment',[TicketController:: class, "bookTickets"]);
/*Ticket End Part */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'popcorn'])->name('home');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');

/*stripe  start*/

Route::get('/stripe',[StripePaymentController::class,'paymentStripe']);
Route::post('/success',[StripePaymentController::class,'add_money']);
/*stripe end*/