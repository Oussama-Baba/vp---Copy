<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(5);
        return view('admincontent.table.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::where('role', 'client')->get();
        return view('admincontent.form.post_form', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:2048',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:processing,accepted,declined',
            'page_name' => 'nullable|string|max:255',
            'publish_date' => 'required|date'
        ]);

        if ($request->hasFile('media')) {
            $formData['media_path'] = $request->file('media')->store('media', 'public');
        }

        Post::create($formData);

        return redirect()->route('Post.index')->with('success', 'Post créé avec succès.');
    }

    public function show(Post $post)
    {
        return view('admincontent.showcart.postcart', compact('post'));
    }

    public function edit(string $id)
    {   $post = Post::findOrFail($id);
        $clients = User::where('role', 'client')->get();
        return view('admincontent.form.post_updat_form', compact('post', 'clients'));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $formData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:2048',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:processing,accepted,declined',
            'page_name' => 'nullable|string|max:255',
            'publish_date' => 'required|date'
        ]);


        if ($request->hasFile('media')) {
            if ($post->media_path && Storage::exists('public/' . $post->media_path)) {
                Storage::delete('public/' . $post->media_path);
            }
            $formData['media_path'] = $request->file('media')->store('media', 'public');
        } else {
            $formData['media_path'] = $post->media_path;
        }

        $post->update($formData);
        return redirect()->route('Post.index')->with('success', 'Post mis à jour avec succès.');
    }

    public function destroy(Post $Post)
    {

        if ($Post->media_path && Storage::exists('public/' . $Post->media_path)) {
            Storage::delete('public/' . $Post->media_path);
        }

        $Post->delete();

        return redirect()->route('Post.index')->with('success', 'Post supprimé avec succès.');
    }
}


