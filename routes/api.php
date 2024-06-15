
<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CallController;
use App\Http\Controllers\API\QueueController;

// Route de login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route de déconnexion
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Route pour obtenir le département de l'utilisateur connecté
Route::middleware('auth:sanctum')->get('/user/department', [UserController::class, 'getUserDepartment']);
Route::middleware('auth:sanctum')->get('/user/department-letter', [UserController::class, 'getUserDepartmentLetter']);

// Routes pour CallController
Route::get('/getName', [CallController::class, 'getName']);
Route::get('/calls', [CallController::class, 'NumeroActuelle']);
Route::get('/calls/{id}', [CallController::class, 'show']);
Route::post('/calls', [CallController::class, 'store']);
Route::put('/calls/{id}', [CallController::class, 'update']);
Route::delete('/calls/{id}', [CallController::class, 'destroy']);

// Routes protégées par auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'getAuthenticatedUser']);
    Route::put('/user', [UserController::class, 'updateAuthenticatedUser']);
});

// Routes pour QueueController
Route::prefix('queues')->group(function () {
    Route::get('/traite', [QueueController::class, 'AppelTraites']);
    Route::get('/nontraite', [QueueController::class, 'AppelNONTraites']);
    Route::get('/', [QueueController::class, 'index']);
    Route::get('/{queue}', [QueueController::class, 'show']);
    Route::post('/', [QueueController::class, 'store']);
    Route::put('/{queue}', [QueueController::class, 'update']);
    Route::delete('/{queue}', [QueueController::class, 'destroy']);
});

// Routes pour UserController
Route::prefix('users')->group(function () {
    Route::get('/{id}', [UserController::class, 'getName']);
});
