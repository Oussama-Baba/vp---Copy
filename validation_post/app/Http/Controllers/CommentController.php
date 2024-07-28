<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function index(Request $request)
    {

        $search = $request->input('search');
        $comments = Comment::with('post', 'user')
            ->when($search, function ($query, $search) {
                $query->whereHas('post', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('page_name', 'like', "%{$search}%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhere('comment', 'like', "%{$search}%");
            })
           ->latest()->paginate(5);

        return view('admincontent.table.comment', compact('comments'));
    }

    public function create()
    {
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'post_id' => 'required|exists:posts,id',
        'comment' => 'required|string|max:255',
    ]);

    $comment = Comment::create([
        'post_id' => $validatedData['post_id'],
        'user_id' => auth()->id(), // Assuming user is authenticated
        'comment' => $validatedData['comment'],
    ]);

    // Return JSON response
    return response()->json([
        'user_name' => $comment->user->name,
        'comment' => $comment->comment
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
