<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'home']);
Route::get('/object_game', [GameController::class, 'objectGame'])->name('object_game');
Route::get('/math_game', [GameController::class, 'mathGame'])->name('math_game');
Route::get('/puzzle_game', [GameController::class, 'puzzleGame'])->name('puzzle_game');
Route::post('/validate_answer', [GameController::class, 'validateAnswer'])->name('validate_answer');
Route::post('/save_user_info', [GameController::class, 'askNameAndAge'])->name('save_user_info');
Route::post('/save_math_user_info', [GameController::class, 'saveMathUserInfo'])->name('save_math_user_info');
Route::post('/save_puzzle_user_info', [GameController::class, 'savePuzzleUserInfo'])->name('save_puzzle_user_info')->middleware('web');


