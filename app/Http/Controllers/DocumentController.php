<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use App\Http\Requests\StoreDocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Liste les documents de l'utilisateur connecté
     */
    public function index()
    {
        $documents = Document::with('category')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('documents.index', compact('documents'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        $categories = Category::all();
        return view('documents.create', compact('categories'));
    }

    /**
     * Enregistrement d'un nouveau document
     */
    public function store(StoreDocumentRequest $request)
    {
        $path = null;
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('documents', 'public');
        }

        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'file_path' => $path,
        ]);

        return redirect()->route('documents.index')
            ->with('success', 'Document archivé avec succès !');
    }

    /**
     * Visionneuse de document
     */
    public function view(Document $document)
    {
        // Sécurité : Propriétaire ou Admin uniquement
        if ($document->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Accès non autorisé.');
        }

        return view('documents.view', compact('document'));
    }

    /**
     * Formulaire d'édition
     */
    public function edit(Document $document)
    {
        // Sécurité : Seul le propriétaire peut modifier
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        $categories = Category::all();
        return view('documents.edit', compact('document', 'categories'));
    }

    /**
     * Mise à jour du document
     */
    public function update(Request $request, Document $document)
    {
        // Sécurité : Seul le propriétaire peut modifier
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        // Validation (tu peux aussi créer un UpdateDocumentRequest)
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:10240',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ];

        // Gestion du remplacement de fichier
        if ($request->hasFile('file_path')) {
            // On supprime l'ancien fichier s'il existe
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            // On stocke le nouveau
            $data['file_path'] = $request->file('file_path')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('documents.index')
            ->with('success', 'Document mis à jour avec succès !');
    }

    /**
     * Suppression définitive
     */
    public function destroy(Document $document)
    {
        // Sécurité : Seul le propriétaire peut supprimer
        if ($document->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->route('documents.index')
            ->with('success', 'Document supprimé définitivement.');
    }
}
