<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Mail\PostAddedMail;

use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::query()->with('user');

    if ($search = request('search')) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('page_name', 'like', "%{$search}%")
              ->orWhereHas('user', function ($q) use ($search) {
                  $q->where('name', 'like', "%{$search}%");
              });
        });
    }
    $posts = $query->latest()->paginate(5);
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
            'publish_date' => 'required|date',
            'colon_hashtags' => 'nullable|string',
            'email_sent' => 'nullable|boolean',
        ]);


        if ($request->hasFile('media')) {
            $formData['media_path'] = $request->file('media')->store('media', 'public');
        }
        $formData['email_sent'] = $request->has('email_sent');
        $post = Post::create($formData);



        if ($formData['email_sent']) {
            Mail::to($post->user->email)->send(new PostAddedMail($post));
        }

        return redirect()->route('Post.index')->with('success', 'Post créé avec succès.');
    }


    public function show(Post $Post)
    {
        $post = $Post;
        $comments = $post->comments()->with('user')->latest()->get();
        return view('admincontent.showcart.post_cart', compact('post', 'comments'));
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
        'publish_date' => 'required|date',
        'colon_hashtags' => 'nullable|string',
        'email_sent' => 'nullable|boolean',
    ]);


    if ($request->hasFile('media')) {
        if ($post->media_path && Storage::exists('public/' . $post->media_path)) {
            Storage::delete('public/' . $post->media_path);
        }
        $formData['media_path'] = $request->file('media')->store('media', 'public');
    } else {
        $formData['media_path'] = $post->media_path;
    }
    $formData['email_sent'] = $request->has('email_sent');
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


