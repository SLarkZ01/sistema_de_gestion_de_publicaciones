<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $publicaciones = Auth::user()->publicaciones()->latest()->get();
        return view('posts.index', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required'
        ]);

        $request->user()->publicaciones()->create($validated);

        return redirect()->route('posts.index')->with('status', 'Publicación creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicacion $post): View
    {
        // Ensure the logged-in user owns this publication
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('posts.show', ['publicacion' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicacion $post): View
    {
        // Ensure the logged-in user owns this publication
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('posts.edit', ['publicacion' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicacion $post): RedirectResponse
    {
        // Ensure the logged-in user owns this publication
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'contenido' => 'required'
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('status', 'Publicación actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacion $post): RedirectResponse
    {
        // Ensure the logged-in user owns this publication
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Publicación eliminada exitosamente');
    }
}
