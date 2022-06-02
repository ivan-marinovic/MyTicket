<?php

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/view_category',[AdminController::class,'view_category']);

route::post('/add_category',[AdminController::class,'add_category']);

route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

route::get('/view_event',[AdminController::class,'view_event']);

route::post('/add_event',[AdminController::class,'add_event']);

route::get('/show_event',[AdminController::class,'show_event']);

route::get('/delete_event/{id}',[AdminController::class,'delete_event']);

route::get('/update_event/{id}',[AdminController::class,'update_event']);

route::post('/update_event_confirm/{id}',[AdminController::class,'update_event_confirm']);

route::get('/event_details/{id}',[HomeController::class,'event_details']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/about',[HomeController::class,'about']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/stripe/{totalPrice}',[HomeController::class,'stripe']);

route::post('stripe/{totalPrice}',[HomeController::class,'stripePost'])->name('stripe.post');

route::get("/ticket-pdf",function (){
    $id=Auth::user()->id;
    $order_id=order::all()->last()->created_at;
    $ticket=order::where('created_at','=',$order_id)->where('user_id','=',$id)->get();

    $pdf = PDF::loadView('home.ticket',compact('ticket'));
    return $pdf->download('ticket.pdf');
});

route::get('/sorting',[HomeController::class,'sorting']);


