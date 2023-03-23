<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Route; 

//ruta para crear usuario.
Route::post('/1.0/users', [
    UserController::class, 'create'
]);

Route::post('/1.0/transaction', [
    TransactionController::class, 'create'

]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('1.0/users', [UserController::class, 'index']); //ruta para mostrar usuarios. 

//Route::post('/1.0/transaction', [TransactionController::class, 'create']); //Ruta para mostrar transacciones. 

//Route::get('1.0/account', [UserController::class, 'index']); //ruta para mostrar Cuentas. - Verificar. 

