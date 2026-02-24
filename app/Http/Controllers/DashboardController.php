<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // On récupère les documents pour le tableau et les stats
        $documents = Document::where('user_id', $userId)->get();

        $totalDocuments = $documents->count();
        $totalCategories = Category::count(); // Ou Category::where('user_id', $userId)->count() si elles sont privées

        // Les 5 derniers documents pour la liste à droite
        $recentDocuments = Document::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('documents', 'totalDocuments', 'totalCategories', 'recentDocuments'));
    }
}
