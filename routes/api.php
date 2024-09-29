<?php

use App\Http\Controllers\API\v1\PurchaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/tokens/create', function (Request $request) {
    $token = User::find(1)->createToken('testing_token');
 
    return ['token' => $token->plainTextToken];
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('purchases', PurchaseController::class);
});
