<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Models\Document;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// --- ROUTES PROTÉGÉES (Utilisateurs connectés) ---
Route::middleware(['auth', 'verified'])->group(function () {

    /**
     * Dashboard : Logique différencée entre Admin et Utilisateur
     */
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $documents = Document::with(['category', 'user'])->latest()->get();
            $totalDocuments = Document::count();
            $totalUsers = User::count();
        } else {
            $documents = Document::where('user_id', $user->id)->with('category')->latest()->get();
            $totalDocuments = $documents->count();
            $totalUsers = null;
        }

        $totalCategories = Category::count();
        $recentDocuments = $documents->take(5);

        return view('dashboard', compact(
            'documents',
            'totalDocuments',
            'totalCategories',
            'recentDocuments',
            'totalUsers'
        ));
    })->name('dashboard');

    /**
     * CRUD des Documents
     * Le resource inclut automatiquement : index, create, store, show, edit, update, destroy
     */
    Route::resource('documents', DocumentController::class);

    /**
     * Route spécifique pour la visionneuse personnalisée
     */
    Route::get('/documents/{document}/view', [DocumentController::class, 'view'])
        ->name('documents.view');

    /**
     * Profil Utilisateur (Laravel Breeze)
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- ZONE ADMIN ---
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

        // Gestion des utilisateurs
        Route::get('/users', function () {
            $users = User::all();
            return view('admin.users', compact('users'));
        })->name('users.index');

        // Changement de rôle (Toggle Admin/User)
        Route::patch('/users/{user}/role', function (User $user) {
            if ($user->id === Auth::id()) {
                return back()->with('error', 'Action impossible sur votre propre compte.');
            }
            $user->role = ($user->role === 'admin') ? 'user' : 'admin';
            $user->save();
            return back()->with('success', "Le rôle de {$user->name} a été mis à jour.");
        })->name('users.updateRole');

    });
});

require __DIR__.'/auth.php';
